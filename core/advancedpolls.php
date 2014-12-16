<?php
/**
 * 
 * Advanced Polls
 * 
 * @copyright (c) 2014 Wolfsblvt ( www.pinkes-forum.de )
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

	/**
	 * Constructor
	 *
	 * @param \phpbb\db\driver\driver_interface		$db				Database
	 * @param \phpbb\config\config					$config			Config helper
	 * @param \phpbb\template\template				$template		Template object
	 * @param \phpbb\user							$user			User object
	 * @param \phpbb\auth\auth						$auth			Auth object
	 * @param \phpbb\request\request				$request		Request object
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\request\request $request)
	{
		$this->db = $db;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->auth = $auth;
		$this->request = $request;

		// Add language vars
		$this->user->add_lang_ext('wolfsblvt/advancedpolls', 'advancedpolls');
	}

	/**
	 * Adds the online time to user profile if it can be displayed
	 * 
	 * @param int	$topic_id	The topic id.
	 * @param array	$poll		The array of poll data for this topic
	 * @return void
	 */
	public function save_config_for_polls($topic_id, $poll)
	{
		$options = $this->get_possible_options();

		// Gether the options we should set
		$topic_sql = array();
		foreach ($options as $option)
		{
			if ($this->request->is_set($option))
			{
				$topic_sql[$option] = $this->request->variable($option, false);
			}
		}

		if(empty($topic_sql))
			return;

		$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET ' . $this->db->sql_build_array('UPDATE', $topic_sql) . "
				WHERE topic_id = $topic_id";
		$this->db->sql_query($sql);
	}

	/**
	 * Add the possible options to the template
	 * 
	 * @param array	$post_data		The array of post data
	 * @return void
	 */
	public function config_for_polls_to_template($post_data)
	{
		$options = $this->get_possible_options();
		
		foreach ($options as $option)
		{			
			$this->template->assign_vars(array(
				strtoupper($option)					=> true,
				strtoupper($option) . '_CHECKED'	=> ($post_data[$option] == 1) ? ' checked="checked"' : '',
			));
		}
	}

	/**
	 * Add the possible options to the template
	 * 
	 * @param array	$post_data		The array of post data
	 * @return void
	 */
	public function do_poll_modification($topic_data)
	{
		$options = $this->get_possible_options();
		
		foreach ($options as $option)
		{
			switch ($option)
			{
				case 'wolfsblvt_poll_votes_hide':
					if ($topic_data[$option] == 1)
					{
						$this->template->alter_block_array('poll_option',  array(
							'POLL_OPTION_RESULT' 		=> '??',
							'POLL_OPTION_PERCENT' 		=> '??%',
							'POLL_OPTION_PERCENT_REL' 	=> '??%',
							'POLL_OPTION_PCT'			=> 100,
							'POLL_OPTION_WIDTH'     	=> 250,
							'POLL_OPTION_MOST_VOTES'	=> false,
						), false, 'change');
					}
					break;
			}
		}
	}

	/**
	 * Internal function to get the possible options for polls, if they aren't deactivated in ACP
	 * 
	 * @return void
	 */
	protected function get_possible_options()
	{
		$options = array(
			'wolfsblvt_poll_votes_hide',
			'wolfsblvt_poll_voters_show',
			'wolfsblvt_poll_voters_limit',
		);

		$valid_options = array();
		foreach ($options as $option)
		{
			$config_name = str_replace('wolfsblvt_', 'wolfsblvt.advancedpolls.activate_', $option);

			if ($this->config[$config_name] == 1)
			{
				$valid_options[] = $option;
			}
		}

		return $valid_options;
	}
}
