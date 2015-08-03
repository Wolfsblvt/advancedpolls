<?php
/**
 *
 * Advanced Polls
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\core;

class advancedpolls
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\event\dispatcher_interface */
	protected $dispatcher;

	/** @var array */
	protected $cur_voted_val;

	/**
	 * Constructor
	 *
	 * @param \phpbb\db\driver\driver_interface		$db				Database
	 * @param \phpbb\config\config					$config			Config helper
	 * @param \phpbb\template\template				$template		Template object
	 * @param \phpbb\user							$user			User object
	 * @param \phpbb\auth\auth						$auth			Auth object
	 * @param \phpbb\request\request				$request		Request object
	 * @param \phpbb\event\dispatcher_interface		$dispatcher		The dispatcher object
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\request\request $request, \phpbb\event\dispatcher_interface $dispatcher)
	{
		$this->db = $db;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->auth = $auth;
		$this->request = $request;
		$this->dispatcher = $dispatcher;

		$this->cur_voted_val = array();
	}

	/**
	 * Checks the selected poll options
	 *
	 * @param array	$poll		The array of poll data, modified here
	 * @return array 			Array with processed language strings with errors, if any
	 */
	public function check_config_for_polls(&$poll)
	{
		// Check for poll scoring options to be consistent
		if ($this->config['wolfsblvt.advancedpolls.activate_poll_scoring'])
		{
			$poll_max_value = $this->request->variable('wolfsblvt_poll_max_value', 1);
			$poll_total_value = $this->request->variable('wolfsblvt_poll_total_value', 1);

			if ($poll_max_value > $poll_total_value)
			{
				return array($this->user->lang['AP_POLL_TOTAL_LOWER_MAX_VOTES']);
			}
			if ($poll_max_value === 1 && (int) $poll['poll_max_options'] > 1)
			{
				$poll_total_value = (int) $poll['poll_max_options'];
				$this->request->overwrite('wolfsblvt_poll_total_value', (int) $poll['poll_max_options']);
			}
			if ((int) $poll['poll_max_options'] > $poll_total_value)
			{
				return array($this->user->lang['AP_POLL_TOTAL_LOWER_MAX_OPTS']);
			}
		}

		// Check for poll end specs
		if ($this->config['wolfsblvt.advancedpolls.activate_poll_end'])
		{
			// Poll data from the form
			$current_time = time();
			$poll_length_scale = $this->request->variable('wolfsblvt_poll_length_scale', 24);
			$poll_start = $poll['poll_start'] ?: $current_time;
			$poll_length = $poll['poll_length'] ? $poll['poll_length'] * $poll_length_scale * 3600 : 0;
			$poll_end = $poll_start + $poll_length;
			$poll_end_ary = array_map('intval', explode('-', $this->user->format_date($poll_end ?: $current_time, 'Y-n-j-G-i')));
			$poll['poll_length'] = ceil($poll['poll_length'] * $poll_length_scale / 24);
			$poll['poll_start'] = $poll_end - $poll['poll_length'] * 86400;

			// Gather the options we should set, default to selected poll_end, order is critical here
			$opts = array('year', 'mon', 'mday', 'hours', 'minutes');
			$new_poll_end_ary = array();
			foreach ($opts as $key => $opt)
			{
				$new_poll_end_ary[$opt] = $this->request->variable('wolfsblvt_poll_end_' . $opt, -1);
				$new_poll_end_ary[$opt] = (($new_poll_end_ary[$opt] > 0) || (($new_poll_end_ary[$opt] == 0) && in_array($opt, array('hours', 'minutes')))) ? $new_poll_end_ary[$opt] : $poll_end_ary[$key];
			}

			// Check that the input date is valid
			if (!checkdate($new_poll_end_ary['mon'], $new_poll_end_ary['mday'], $new_poll_end_ary['year']) || $new_poll_end_ary['hours'] > 23 || $new_poll_end_ary['minutes'] > 59)
			{
				return array($this->user->lang['AP_POLL_END_INVALID']);
			}

			// Calculate poll_start and poll_length based on poll_end, if specified in the form
			$new_poll_end = $this->user->get_timestamp_from_format('Y-n-j-G-i', sprintf('%d-%d-%d-%d-%d', $new_poll_end_ary['year'], $new_poll_end_ary['mon'], $new_poll_end_ary['mday'], $new_poll_end_ary['hours'], $new_poll_end_ary['minutes']));

			$new_poll_length = 0;
			if (abs($new_poll_end - $poll_end) > 60)
			{
				if ($new_poll_end > $current_time)
				{
					$new_poll_length = ceil(($new_poll_end - $current_time) / 86400);
				}
				else if ($poll_end > $current_time)
				{
					$new_poll_length = ceil(($new_poll_end - min($poll_start, $new_poll_end - 60)) / 86400);
				}
			}

			if ($new_poll_length > 0)
			{
				$poll['poll_length'] = $new_poll_length;
				$poll['poll_start'] = $new_poll_end - $new_poll_length * 86400;
			}
		}
		return array();
	}

	/**
	 * Saves the selected poll options to the topic
	 *
	 * @param array	$sql_data	The array of data to be inserted in the database, modified here
	 * @return void
	 */
	public function save_config_for_polls(&$sql_data)
	{
		$options = $this->get_possible_options();

		// Gather the options we should set
		foreach ($options as $option => $default_val)
		{
			if (strpos($option, 'wolfsblvt_poll_end_') !== false)
			{
				continue; // already processed
			}
			else
			{
				$sql_data[TOPICS_TABLE]['sql'][$option] = $this->request->variable($option, $default_val);
			}
		}

		// Check if this change affects the next run for notifications
		if ($this->config['wolfsblvt.advancedpolls.activate_notifications'])
		{
			$hidden_poll = (isset($sql_data[TOPICS_TABLE]['sql']['wolfsblvt_poll_votes_hide']) && $sql_data[TOPICS_TABLE]['sql']['wolfsblvt_poll_votes_hide']) ? true : false;
			if ($hidden_poll && $sql_data[TOPICS_TABLE]['sql']['poll_start'] > 0 && $sql_data[TOPICS_TABLE]['sql']['poll_length'] > 0)
			{
				$last_run = $this->config['wolfsblvt.advancedpolls.pollend_last_gc'];
				$next_run_delay = $this->config['wolfsblvt.advancedpolls.pollend_gc'];
				$poll_end = $sql_data[TOPICS_TABLE]['sql']['poll_start'] + $sql_data[TOPICS_TABLE]['sql']['poll_length'];
				if ($poll_end > $last_run && (!$next_run_delay || $last_run > $poll_end - $next_run_delay))
				{
					$this->config->set('wolfsblvt.advancedpolls.pollend_gc', $poll_end - $last_run);
				}
			}
		}
	}

	/**
	 * Adds the enabled poll options to the posting template
	 *
	 * @param array	$post_data		The array of post data
	 * @param array	$page_data		The array of template data, will be modified here
	 * @param bool	$preview		Whether or not the post is being previewed
	 * @return void
	 */
	public function config_for_polls_to_template($post_data, &$page_data, $preview = false)
	{
		// Check stuff for official poll setting "can change vote
		if (empty($post_data['poll_title']) || (!isset($post_data['poll_vote_change']) && !$this->request->is_set('poll_vote_change')))
		{
			$page_data['VOTE_CHANGE_CHECKED'] = ($this->config['wolfsblvt.advancedpolls.default_poll_votes_change']) ? ' checked="checked"' : '';
		}
		if (isset($page_data['S_POLL_VOTE_CHANGE']) && $page_data['S_POLL_VOTE_CHANGE'])
		{
			$page_data['S_POLL_VOTE_CHANGE'] = false;
			$page_data['S_AP_POLL_VOTE_CHANGE'] = true;
		}

		$options = $this->get_possible_options();

		if ($post_data['poll_length'])
		{
			$poll_end = $post_data['poll_start'] + $post_data['poll_length'] * 86400;
			$poll_end_ary = array_map('intval', explode('-', $this->user->format_date($poll_end, 'Y-n-j-G-i')));

			// Present the options we should set, order is critical here
			$opts = array('year', 'mon', 'mday', 'hours', 'minutes');
			foreach ($opts as $key => $opt)
			{
				if (isset($options['wolfsblvt_poll_end_' . $opt]))
				{
					$options['wolfsblvt_poll_end_' . $opt] = $poll_end_ary[$key];
				}
			}
		}

		foreach ($options as $option => $default_val)
		{
			if ($preview || $this->request->is_set($option))
			{
				$value_to_take = $this->request->variable($option, $default_val);
			}
			else if (!empty($post_data['poll_title']) && isset($post_data[$option]))
			{
				$value_to_take = is_bool($default_val) ? (($post_data[$option] == 1) ? true : false) : (int) $post_data[$option];
			}
			else
			{
				$value_to_take = is_bool($default_val) ? (($this->config[str_replace('wolfsblvt_', 'wolfsblvt.advancedpolls.default_', $option)] == 1) ? true : false) : $default_val;
			}

			if ($option == 'wolfsblvt_poll_max_value')
			{
				$page_data['WOLFSBLVT_POLL_SCORING'] = true;
			}

			if ($option == 'wolfsblvt_poll_end_year')
			{
				$page_data['WOLFSBLVT_POLL_END'] = true;
			}

			if (is_bool($value_to_take))
			{
				$page_data[strtoupper($option)] = true;
				$page_data[strtoupper($option) . '_CHECKED'] = ($value_to_take) ? ' checked="checked"' : '';
			}
			else if ($value_to_take < 0)
			{
				$page_data[strtoupper($option)] = '';
			}
			else
			{
				$page_data[strtoupper($option)] = $value_to_take;
			}

			if ($preview && ($option == 'wolfsblvt_poll_max_value') && ($value_to_take > 1))
			{
				$page_data['AP_IS_SCORING'] = true;

				$option_eval_opts_txt = '<option value="0"></option>';
				for ($i = 1; $i <= $value_to_take; $i++)
				{
					$option_eval_opts_txt .= '<option value="' . $i . '">' . $i . '</option>';
				}
				$block_vars = array(
					'AP_POLL_OPTION_VALUE'	=> 0,
					'AP_POLL_OPTION_OPTS'	=> $option_eval_opts_txt,
				);
				for ($i = 0, $count = count($post_data['poll_options']); $i < $count; $i++)
				{
					$this->template->alter_block_array('poll_option', $block_vars, $i, 'change');
				}
			}
		}
		return;
	}

	/**
	 * Perform all poll related modifications
	 *
	 * @param array	$topic_data						The array of topic data
	 * @param array $vote_counts					Array with the vote counts for every poll option, updated here
	 * @param array $cur_voted_id					Array of current votes, stored in the database, updated here
	 * @param array $voted_id						Array of votes, submitted in the form, updated here
	 * @param array $poll_info						Array with poll options and details, updated here
	 * @param bool $s_can_vote						May the user vote in this poll?  May be modified here
	 * @param string $viewtopic_url					URL with the return topic
	 * @return void
	 */
	public function do_poll_voting_modifications($topic_data, &$vote_counts, &$cur_voted_id, &$voted_id, &$poll_info, &$s_can_vote, $viewtopic_url)
	{
		$options = $this->get_possible_options(true);
		$options = array_keys($options);

		$poll_options = array_keys($vote_counts);
		$poll_options_count = count($poll_options);

		// Get votes data
		$sql = 'SELECT *
				FROM ' . POLL_VOTES_TABLE . '
				WHERE poll_option_id > 0
					AND topic_id = ' . $topic_data['topic_id'];
		$result = $this->db->sql_query($sql);

		$option_voters = array_fill_keys($poll_options, array());
		$cur_voted_val = array();
		$cur_total_val = 0;
		while ($row = $this->db->sql_fetchrow($result))
		{
			$option_voters[$row['poll_option_id']][(int) $row['vote_user_id']] = (int) $row['wolfsblvt_poll_option_value'];
			if ($this->user->data['is_registered'] && ($this->user->data['user_id'] == $row['vote_user_id']))
			{
				$cur_voted_val[(int) $row['poll_option_id']] = (int) $row['wolfsblvt_poll_option_value'];
				$cur_total_val += (int) $row['wolfsblvt_poll_option_value'];
			}
		}
		$this->db->sql_freeresult($result);

		for ($i = 0; $i < $poll_options_count; $i++)
		{
			$poll_info[$i]['option_voters'] = $option_voters[$poll_info[$i]['poll_option_id']];
		}

		if (!$this->user->data['is_registered'])
		{
			// Cookie based guest tracking ... I don't like this but hum ho
			// it's oft requested. This relies on "nice" users who don't feel
			// the need to delete cookies to mess with results.
			if ($this->request->is_set($this->config['cookie_name'] . '_poll_votes_' . $topic_data['topic_id'], \phpbb\request\request_interface::COOKIE))
			{
				$cur_voted_votes = explode(',', $this->request->variable($this->config['cookie_name'] . '_poll_votes_' . $topic_data['topic_id'], '', true, \phpbb\request\request_interface::COOKIE));
				$cur_voted_votes = array_map('intval', $cur_voted_votes);
				$cur_voted_val = array_combine($cur_voted_id, $cur_voted_votes);
				$cur_total_val = array_sum($cur_voted_votes);
			}
		}

		$voted_val = array();

		$scoring = $this->request->variable('scoring', false);
		$update = $this->request->variable('update', false);

		if ($scoring)
		{
			$voted_val	= $this->request->variable('vote_id', array(0 => 0));
			$voted_val	= array_diff($voted_val, array(0));
			$voted_id	= array_keys($voted_val);
			$voted_id	= (sizeof($voted_id) > 1) ? array_unique($voted_id) : $voted_id;
		}

		if (!in_array('wolfsblvt_no_vote', $options) && in_array(0, $cur_voted_id))
		{
			$sql = 'DELETE FROM ' . POLL_VOTES_TABLE . '
				WHERE topic_id = ' . (int) $topic_data['topic_id'] . '
					AND poll_option_id = ' . 0 . '
					AND vote_user_id = ' . (int) $this->user->data['user_id'];
			$this->db->sql_query($sql);
			$cur_voted_id = array_keys($cur_voted_val);
		}

		$s_incremental = in_array('wolfsblvt_incremental_votes', $options);
		$s_is_scoring = (in_array('wolfsblvt_poll_max_value', $options) && $topic_data['wolfsblvt_poll_max_value'] > 1) ? true : false;

		$s_vote_incomplete = $s_incremental ? ($s_is_scoring ? $cur_total_val < $topic_data['wolfsblvt_poll_total_value'] : sizeof($cur_voted_id) < $topic_data['poll_max_options']) : !sizeof($cur_voted_id);

		$s_can_change_vote = ($this->auth->acl_get('f_votechg', $topic_data['forum_id']) && $topic_data['poll_vote_change']) ? true : false;

		$s_can_vote = ($s_can_vote || (
				$this->auth->acl_get('f_vote', $topic_data['forum_id']) &&
				(($topic_data['poll_length'] != 0 && $topic_data['poll_start'] + $topic_data['poll_length'] > time()) || $topic_data['poll_length'] == 0) &&
				($topic_data['topic_status'] != ITEM_LOCKED || in_array('wolfsblvt_closed_voting', $options)) &&
				$topic_data['forum_status'] != ITEM_LOCKED &&
				($s_vote_incomplete || $s_can_change_vote)
			)) ? true : false;

		if ($update && $s_can_vote)
		{
			if (!sizeof($voted_id) || sizeof($voted_id) > $topic_data['poll_max_options'] ||
				$scoring !== $s_is_scoring || (!$s_can_change_vote && sizeof(array_diff($cur_voted_id, $voted_id))) || !check_form_key('posting'))
			{
				meta_refresh(5, $viewtopic_url);
				if (!sizeof($voted_id))
				{
					$message = 'NO_VOTE_OPTION';
				}
				else if (sizeof($voted_id) > $topic_data['poll_max_options'])
				{
					$message = 'TOO_MANY_VOTE_OPTIONS';
				}
				else if ($scoring !== $s_is_scoring)
				{
					$message = 'AP_POLL_TYPE_MISMATCH';
				}
				else if (!$s_can_change_vote && sizeof(array_diff($cur_voted_id, $voted_id)))
				{
					$message = 'AP_VOTE_CHANGED';
				}
				else
				{
					$message = 'FORM_INVALID';
				}

				$message = $this->user->lang[$message] . '<br /><br />' . sprintf($this->user->lang['RETURN_TOPIC'], '<a href="' . $viewtopic_url . '">', '</a>');
				trigger_error($message);
			}

			if ($this->user->data['is_registered'] && in_array(0, $cur_voted_id))
			{
				$sql = 'DELETE FROM ' . POLL_VOTES_TABLE . '
					WHERE topic_id = ' . (int) $topic_data['topic_id'] . '
						AND poll_option_id = ' . 0 . '
						AND vote_user_id = ' . (int) $this->user->data['user_id'];
				$this->db->sql_query($sql);
				$cur_voted_id = array_keys($cur_voted_val);
			}
		}

		if ($update && $s_can_vote && $s_is_scoring)
		{
			$voted_total_val = 0;
			$vote_changed = false;
			foreach ($voted_id as $option)
			{
				$voted_total_val += $voted_val[$option];
				if (isset($cur_voted_val[$option]) && $cur_voted_val[$option] > $voted_val[$option])
				{
					$vote_changed = true;
				}
			}

			if ($voted_total_val > $topic_data['wolfsblvt_poll_total_value'] || (!$s_can_change_vote && $vote_changed))
			{
				meta_refresh(5, $viewtopic_url);

				$message = '';
				if (!$s_can_change_vote && $vote_changed)
				{
					$message = 'AP_VOTE_CHANGED';
				}
				else if ($voted_total_val > $topic_data['wolfsblvt_poll_total_value'])
				{
					$message = 'AP_TOO_MANY_VOTES';
				}

				$message = $this->user->lang[$message] . '<br /><br />' . sprintf($this->user->lang['RETURN_TOPIC'], '<a href="' . $viewtopic_url . '">', '</a>');
				trigger_error($message);
			}

			foreach ($cur_voted_id as $option)
			{
				if (!in_array($option, $voted_id) || (($cur_voted_val[$option] != $voted_val[$option])))
				{
					$sql = 'UPDATE ' . POLL_OPTIONS_TABLE . '
						SET poll_option_total = poll_option_total - ' . (int) $cur_voted_val[$option] . '
						WHERE poll_option_id = ' . (int) $option . '
							AND topic_id = ' . (int) $topic_data['topic_id'];
					$this->db->sql_query($sql);

					$vote_counts[$option] -= (int) $cur_voted_val[$option];

					if ($this->user->data['is_registered'])
					{
						$sql = 'DELETE FROM ' . POLL_VOTES_TABLE . '
							WHERE topic_id = ' . (int) $topic_data['topic_id'] . '
								AND poll_option_id = ' . (int) $option . '
								AND vote_user_id = ' . (int) $this->user->data['user_id'];
						$this->db->sql_query($sql);
					}
				}
			}

			foreach ($voted_id as $option)
			{
				if (in_array($option, $cur_voted_id) && ($cur_voted_val[$option] == $voted_val[$option]))
				{
					continue;
				}

				$sql = 'UPDATE ' . POLL_OPTIONS_TABLE . '
					SET poll_option_total = poll_option_total + ' . (int) $voted_val[$option] . '
					WHERE poll_option_id = ' . (int) $option . '
						AND topic_id = ' . (int) $topic_data['topic_id'];
				$this->db->sql_query($sql);

				$vote_counts[$option] += (int) $voted_val[$option];

				if ($this->user->data['is_registered'])
				{
					$sql_ary = array(
						'topic_id'			=> (int) $topic_data['topic_id'],
						'poll_option_id'	=> (int) $option,
						'wolfsblvt_poll_option_value'	=> (int) $voted_val[$option],
						'vote_user_id'		=> (int) $this->user->data['user_id'],
						'vote_user_ip'		=> (string) $this->user->ip,
					);

					$sql = 'INSERT INTO ' . POLL_VOTES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $sql_ary);
					$this->db->sql_query($sql);
				}
			}

			if ($this->user->data['user_id'] == ANONYMOUS && !$this->user->data['is_bot'])
			{
				$this->user->set_cookie('poll_' . $topic_data['topic_id'], implode(',', array_keys($voted_val)), time() + 31536000);
				$this->user->set_cookie('poll_votes_' . $topic_data['topic_id'], implode(',', array_values($voted_val)), time() + 31536000);
			}

			$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET poll_last_vote = ' . time() . '
				WHERE topic_id = ' . $topic_data['topic_id'];
			$this->db->sql_query($sql);

			$message = $this->user->lang['VOTE_SUBMITTED'] . '<br /><br />' . sprintf($this->user->lang['RETURN_TOPIC'], '<a href="' . $viewtopic_url . '">', '</a>');

			if ($this->request->is_ajax())
			{
				// Filter out invalid options
				$valid_user_votes = array_intersect(array_keys($vote_counts), $voted_id);
				$s_vote_incomplete = $s_incremental ?
						($s_is_scoring ? $voted_total_val < $topic_data['wolfsblvt_poll_total_value'] : sizeof($valid_user_votes) < $topic_data['poll_max_options']) : !sizeof($valid_user_votes);

				$data = array(
					'NO_VOTES'			=> $this->user->lang['NO_VOTES'],
					'success'			=> true,
					'scoring'			=> true,
					'user_votes'		=> array_flip($valid_user_votes),
					'user_vote_counts'	=> $voted_val,
					'vote_counts'		=> $vote_counts,
					'total_votes'		=> array_sum($vote_counts),
					'can_vote'			=> $s_vote_incomplete || $s_can_change_vote,
				);
				$json_response = new \phpbb\json_response();
				$json_response->send($data);
			}

			meta_refresh(5, $viewtopic_url);
			trigger_error($message);
		}

		// If we have ajax call here with no_vote, we exit save it here and return json_response
		if (in_array('wolfsblvt_no_vote', $options) && $this->request->is_ajax() && $this->request->is_set('no_vote'))
		{
			if ($this->user->data['is_registered'])
			{
				$sql_ary = array(
					'topic_id'			=> (int) $topic_data['topic_id'],
					'poll_option_id'	=> (int) 0,
					'wolfsblvt_poll_option_value'	=> (int) 0,
					'vote_user_id'		=> (int) $this->user->data['user_id'],
					'vote_user_ip'		=> (string) $this->user->ip,
				);

				$sql = 'INSERT INTO ' . POLL_VOTES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $sql_ary);
				$this->db->sql_query($sql);

				$json_response = new \phpbb\json_response;
				$json_response->send(array('success' => true));
			}
		}

		$this->cur_voted_val = $cur_voted_val;

		return;
	}

	/**
	 * Perform all poll related template modifications for viewtopic
	 *
	 * @param array	$topic_data						The array of topic data
	 * @param array $vote_counts					Array with the vote counts for every poll option
	 * @param array $poll_info						Array with the poll options and information
	 * @param array $poll_template_data				Array with the poll template data, passed by reference (return value)
	 * @param array $poll_options_template_data		Array with the poll options template data, passed by reference (return value)
	 * @return void
	 */
	public function do_poll_template_modifications($topic_data, $vote_counts, $poll_info, &$poll_template_data, &$poll_options_template_data)
	{
		$javascript_vars = array(
			'wolfsblvt_poll_votes_hide_topic'		=> false,
			'wolfsblvt_poll_voters_show_topic'		=> false,
			'wolfsblvt_poll_voters_limit_topic'		=> false,
			'wolfsblvt_poll_show_ordered'			=> false,
			'wolfsblvt_poll_scoring'				=> false,
			'wolfsblvt_poll_no_vote'				=> false,
			'can_change_vote'						=> ($this->auth->acl_get('f_votechg', $topic_data['forum_id']) && $topic_data['poll_vote_change']) ? true : false,
			'username_clean'						=> $this->user->data['username_clean'],
			'username_string'						=> get_username_string('full', $this->user->data['user_id'], $this->user->data['username'], $this->user->data['user_colour']),
			'l_seperator'							=> $this->user->lang['COMMA_SEPARATOR'],
			'l_none'								=> $this->user->lang['AP_NONE'],
		);

		$options = $this->get_possible_options(true);
		$options = array_keys($options);

		$poll_options = array_keys($vote_counts);
		$poll_options_count = count($poll_options);

		$poll_end = ($topic_data['poll_start'] + $topic_data['poll_length']);

		$poll_votes_hidden = $poll_scoring = false;

		$view = $this->request->variable('view', '');
		$poll_force_display_results = (($view === 'infopoll') && $this->auth->acl_get('m_seevoters', $topic_data['forum_id'])) ? true : false;

		if (!$poll_force_display_results && $topic_data['wolfsblvt_poll_votes_hide'] == 1 && in_array('wolfsblvt_poll_votes_hide', $options) && $topic_data['poll_length'] > 0 && $poll_end > time())
		{
			$javascript_vars['wolfsblvt_poll_votes_hide_topic'] = true;

			// Overwrite options to hide values
			for ($i = 0; $i < $poll_options_count; $i++)
			{
				$poll_options_template_data[$i]['POLL_OPTION_RESULT'] = '??';
				$poll_options_template_data[$i]['POLL_OPTION_PERCENT'] = '??%';
				$poll_options_template_data[$i]['POLL_OPTION_PERCENT_REL'] = sprintf('%.1d%%', round(100 * (1 / $poll_options_count)));
				$poll_options_template_data[$i]['POLL_OPTION_PCT'] = round(100 * (1 / $poll_options_count));
				$poll_options_template_data[$i]['POLL_OPTION_WIDTH'] = round(250 * (1 / $poll_options_count));
				$poll_options_template_data[$i]['POLL_OPTION_MOST_VOTES'] = false;
			}

			// Overwrite language vars to explain the hide
			$poll_template_data = array_merge($poll_template_data, array(
				'L_NO_VOTES'			=> $this->user->lang['AP_VOTES_HIDDEN'],
				'AP_POLL_HIDE_VOTES'	=> true,
				'TOTAL_VOTES'			=> '??',
			));
			$poll_template_data['L_POLL_LENGTH'] .= $this->user->lang['AP_POLL_RUN_TILL_APPEND'];

			$poll_votes_hidden = true;
		}

		if (in_array('wolfsblvt_poll_max_value', $options))
		{
			$poll_template_data['WOLFSBLVT_POLL_SCORING'] = true;
			if ($topic_data['wolfsblvt_poll_max_value'] > 1)
			{
				$javascript_vars['wolfsblvt_poll_scoring'] = true;
				for ($j = 0; $j < $poll_options_count; $j++)
				{
					$option_eval_opts_txt = '<option value="0"></option>';
					$sel = isset($this->cur_voted_val[(int) $poll_info[$j]['poll_option_id']]) ? $this->cur_voted_val[(int) $poll_info[$j]['poll_option_id']] : 0;
					$poll_options_template_data[$j]['AP_POLL_OPTION_VALUE'] = $sel;
					for ($i = 1; $i <= $topic_data['wolfsblvt_poll_max_value']; $i++)
					{
						$option_eval_opts_txt .= '<option value="' . $i . ((($i == $sel) && !$poll_force_display_results) ? '" selected="selected">' : '">') . $i . '</option>';
					}
					$poll_options_template_data[$j]['AP_POLL_OPTION_OPTS'] = $option_eval_opts_txt;
				}
				$poll_template_data['L_MAX_VOTES'] = $this->user->lang('AP_MAX_VOTES_SELECT', (int) $topic_data['poll_max_options'], (int) $topic_data['wolfsblvt_poll_total_value']);
				$poll_template_data['AP_IS_SCORING'] = true;

				$scoring_hidden_fields = build_hidden_fields(array('scoring' => (int) 1));
				$poll_template_data['S_HIDDEN_FIELDS'] = (isset($poll_template_data['S_HIDDEN_FIELDS']) ? $poll_template_data['S_HIDDEN_FIELDS'] : '') . $scoring_hidden_fields;

				$poll_scoring = true;
			}
		}

		$poll_votes_are_visible = ($topic_data['wolfsblvt_poll_voters_show'] == 1 && in_array('wolfsblvt_poll_voters_show', $options)) ? true : false;

		if ($poll_force_display_results || ($poll_votes_are_visible && !$poll_votes_hidden && $this->auth->acl_get('f_seevoters', $topic_data['forum_id'])))
		{
			$javascript_vars['wolfsblvt_poll_voters_show_topic'] = true;

			$user_cache = array();
			for ($i = 0; $i < $poll_options_count; $i++)
			{
				foreach ($poll_info[$i]['option_voters'] as $vote_user_id => $poll_option_value)
				{
					$user_cache[$vote_user_id] = null;
				}
			}

			// We need to get the user data so that we can print out their username
			if (!empty($user_cache))
			{
				$sql = 'SELECT user_id, username, username_clean, user_colour
						FROM ' . USERS_TABLE . '
						WHERE ' . $this->db->sql_in_set('user_id', array_keys($user_cache));
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$user_cache[$row['user_id']] = $row;
					$user_cache[$row['user_id']]['total_user_votes'] = 0;
				}
				$this->db->sql_freeresult($result);
			}

			$poll_total_vote_value = $poll_total_guest_votes = 0;
			for ($i = 0; $i < $poll_options_count; $i++)
			{
				$voter_list = array();
				$total_vote_value = 0;
				foreach ($poll_info[$i]['option_voters'] as $voter_id => $vote_value)
				{
					$username = get_username_string('full', $voter_id, $user_cache[$voter_id]['username'], $user_cache[$voter_id]['user_colour']);

					$voter_list[] = '<span name="' . $user_cache[$voter_id]['username_clean'] . '">' . $username . ($poll_scoring ? ('(' . $vote_value . ')') : '') . '</span>';
					$total_vote_value += ($poll_scoring ? $vote_value : 1);
					$user_cache[$voter_id]['total_user_votes'] += ($poll_scoring ? $vote_value : 1);
				}
				$poll_options_template_data[$i]['AP_VOTERS'] = !empty($voter_list) && $poll_scoring && $poll_force_display_results ? (' (' . count($voter_list) . ')') : '';
				$poll_options_template_data[$i]['POLL_OPTION_VOTED'] = $poll_options_template_data[$i]['POLL_OPTION_VOTED'] && !$poll_force_display_results;

				if ($poll_info[$i]['poll_option_total'] > $total_vote_value)
				{
					$guest_votes = $poll_info[$i]['poll_option_total'] - $total_vote_value;
					$voter_list[] = '<span name="guestvotes">' . $this->user->lang('AP_GUEST_VOTES', $guest_votes) . '</span>';
					$poll_total_guest_votes += $guest_votes;
				}
				$poll_options_template_data[$i]['AP_VOTER_LIST'] = !empty($voter_list) ? implode($this->user->lang['COMMA_SEPARATOR'], $voter_list) : false;

				$poll_total_vote_value += $poll_info[$i]['poll_option_total'];
			}

			if ($poll_force_display_results)
			{
				$poll_template_data['S_DISPLAY_RESULTS'] = true;
				$voter_list = array();
				$poll_multivalue = $poll_scoring || $topic_data['poll_max_options'] > 1;
				foreach ($user_cache as $voter_id => $voter_data)
				{
					$username = get_username_string('full', $voter_id, $voter_data['username'], $voter_data['user_colour']);
					$voter_list[] = '<span name="' . $voter_data['username_clean'] . '">' . $username . ($poll_multivalue ? ('(' . $voter_data['total_user_votes'] . ')') : '') . '</span>';
				}
				$poll_voters_count = !empty($voter_list) && $poll_multivalue ? (' (' . count($voter_list) . ')') : '';
				$poll_template_data['TOTAL_VOTES'] .= '</span><br/><br/>' . $this->user->lang['AP_VOTERS'] . $poll_voters_count . $this->user->lang['COLON'] . ' <span class="poll_voters">';
				if ($poll_total_guest_votes > 0)
				{
					$voter_list[] = '<span name="guestvotes">' . $this->user->lang('AP_GUEST_VOTES', $poll_total_guest_votes) . '</span>';
				}
				$poll_template_data['TOTAL_VOTES'] .= !empty($voter_list) ? implode($this->user->lang['COMMA_SEPARATOR'], $voter_list) : ('<span name="none">' . $this->user->lang['AP_NONE'] . '</span>');
				$poll_template_data['S_CAN_VOTE'] = false;
			}

			$poll_template_data['AP_POLL_SHOW_VOTERS'] = true;
		}

		if ($topic_data['wolfsblvt_poll_voters_limit'] == 1 && in_array('wolfsblvt_poll_voters_limit', $options) && $poll_template_data['S_CAN_VOTE'])
		{
			$javascript_vars['wolfsblvt_poll_voters_limit_topic'] = true;

			$not_be_able_to_vote = false;
			$reason = '';

			// Check if user has posted in this thread
			$sql = 'SELECT post_id
					FROM ' . POSTS_TABLE . '
					WHERE poster_id = ' . $this->user->data['user_id'] . '
						AND topic_id = ' . $topic_data['topic_id'];
			$result = $this->db->sql_query_limit($sql, 1);
			$has_posted = ($this->db->sql_fetchrow($result)) ? true : false;
			$this->db->sql_freeresult($result);

			if (!$has_posted)
			{
				$not_be_able_to_vote = true;
				$reason = $this->user->lang['AP_POLL_REASON_NOT_POSTED'];
			}

			/**
			 * Event to modify the limit poll modification
			 *
			 * @event wolfsblvt.advancedpolls.modify_poll_limit
			 * @var	bool	not_be_able_to_vote			Bool if the user should be able to vote.
			 * @var bool	has_posted					Bool if the user already has posted in this topic
			 * @var string	reason						The reason why the user can't vote. Should be translated already.
			 * @var	array	topic_data					The topic data array
			 * @since 1.0.0
			 */
			$vars = array('not_be_able_to_vote', 'has_posted', 'reason', 'topic_data');
			extract($this->dispatcher->trigger_event('wolfsblvt.advancedpolls.modify_poll_limit', compact($vars)));

			if ($not_be_able_to_vote)
			{
				$poll_template_data['S_CAN_VOTE'] = false;

				$vote_error = $this->user->lang['AP_POLL_CANT_VOTE'] . $this->user->lang['COLON'] . ' ' . $reason;
				$poll_template_data['L_POLL_LENGTH'] = '<span class="poll_vote_notice">' . $vote_error . '</span>';
			}
			$poll_template_data['L_AP_POLL_LIMIT_VOTES_REASON'] = $reason ?: false;

			$poll_template_data['AP_POLL_LIMIT_VOTES'] = true;
		}

		if ($poll_votes_are_visible && $poll_template_data['S_CAN_VOTE'])
		{
			$message = $this->user->lang['AP_POLL_VOTES_ARE_VISIBLE'];
			$poll_template_data['L_POLL_LENGTH'] .= '<span class="poll_vote_notice">' . $message . '</span>';
		}

		if ($topic_data['wolfsblvt_poll_show_ordered'] == 1 && in_array('wolfsblvt_poll_show_ordered', $options) && !$poll_votes_hidden && $poll_template_data['S_DISPLAY_RESULTS'])
		{
			$javascript_vars['wolfsblvt_poll_show_ordered'] = true;

			$message = $this->user->lang['AP_POLL_RESULTS_ARE_ORDERED'];
			$poll_template_data['L_POLL_LENGTH'] .= '<span class="poll_vote_notice">' . $message . '</span>';
			usort($poll_options_template_data, array($this, 'order_by_votes'));
		}

		// Add the "don't want to vote possibility
		if (in_array('wolfsblvt_no_vote', $options))
		{
			$javascript_vars['wolfsblvt_poll_no_vote'] = true;

			$poll_template_data['L_VIEW_RESULTS'] = $this->user->lang['AP_POLL_DONT_VOTE_SHOW_RESULTS'];
		}

		// Add the button to see poll results, if you have permissions
		if ($this->auth->acl_get('m_seevoters', $topic_data['forum_id']))
		{
			$poll_template_data['U_AP_POLL_INFO'] = $poll_template_data['S_POLL_ACTION'] . '&amp;view=infopoll';
		}

		// Okay, lets push some of this information to the template
		$poll_template_data['AP_JSON_DATA'] = 'var wolfsblvt_ap_json_data = ' . json_encode($javascript_vars) . ';';

		return;
	}

	/**
	 * Internal function to implement ordering of votes: decreasing by number of votes received, increasing by poll option id when same number of votes
	 *
	 * @param array	$a		Array of post option data
	 * @param array	$b		Array of post option data
	 * @return int 			Greater than 0 if a < b, 0 if a = b, less than 0 if a > b
	 */
	protected function order_by_votes($a, $b)
	{
		return (((int) $b['POLL_OPTION_RESULT'] - (int) $a['POLL_OPTION_RESULT']) ?: ((int) $a['POLL_OPTION_ID'] - (int) $b['POLL_OPTION_ID']));
	}

	/**
	 * Internal function to get the possible options for polls, if they aren't deactivated in ACP
	 *
	 * @param bool $all		Get all options, or only those options configurable per poll
	 * @return array		Array of Advanced Polls options enabled in the ACP
	 */
	protected function get_possible_options($all = false)
	{
		// options configurable per poll
		$options = array(
			'wolfsblvt_poll_votes_hide',
			'wolfsblvt_poll_voters_show',
			'wolfsblvt_poll_voters_limit',
			'wolfsblvt_poll_show_ordered',
			'wolfsblvt_poll_scoring',
			'wolfsblvt_poll_end',
		);
		// options configurable globally (ACP only)
		$extra = array(
			'wolfsblvt_incremental_votes',
			'wolfsblvt_closed_voting',
			'wolfsblvt_no_vote',
		);

		if ($all)
		{
			$options = array_merge($options, $extra);
		}

		$valid_options = array();
		foreach ($options as $option)
		{
			$config_name = str_replace('wolfsblvt_', 'wolfsblvt.advancedpolls.activate_', $option);

			if ($this->config[$config_name] == 1)
			{
				if ($option == 'wolfsblvt_poll_scoring')
				{
					$valid_options['wolfsblvt_poll_max_value'] = 1;
					$valid_options['wolfsblvt_poll_total_value'] = 1;
				}
				else if ($option == 'wolfsblvt_poll_end')
				{
					$valid_options['wolfsblvt_poll_end_year'] = -1;
					$valid_options['wolfsblvt_poll_end_mon'] = -1;
					$valid_options['wolfsblvt_poll_end_mday'] = -1;
					$valid_options['wolfsblvt_poll_end_hours'] = -1;
					$valid_options['wolfsblvt_poll_end_minutes'] = -1;
				}
				else
				{
					$valid_options[$option] = false;
				}
			}
		}

		return $valid_options;
	}
}
