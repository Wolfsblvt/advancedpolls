<?php
/**
 *
 * Advanced Polls
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \wolfsblvt\advancedpolls\core\advancedpolls */
	protected $advancedpolls;

	/** @var \phpbb\path_helper */
	protected $path_helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	 * Constructor of event listener
	 *
	 * @param \wolfsblvt\advancedpolls\core\advancedpolls	$advancedpolls		Advanced Polls
	 * @param \phpbb\path_helper							$path_helper		phpBB path helper
	 * @param \phpbb\template\template						$template			Template object
	 * @param \phpbb\user									$user				User object
	 */
	public function __construct(\wolfsblvt\advancedpolls\core\advancedpolls $advancedpolls, \phpbb\path_helper $path_helper, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->advancedpolls = $advancedpolls;
		$this->path_helper = $path_helper;
		$this->template = $template;
		$this->user = $user;

		$this->ext_root_path = 'ext/wolfsblvt/advancedpolls';
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'								=> 'assign_template_vars',
			'core.submit_post_end'							=> 'save_config_for_polls',				// posting to db
			'core.posting_modify_template_vars'				=> 'config_for_polls_to_template',		// posting to template
			'core.viewtopic_modify_poll_data'				=> 'do_poll_voting_modifications',		// viewtopic to db
			'core.viewtopic_modify_poll_template_data'		=> 'do_poll_template_modifications',	// viewtopic to template
		);
	}

	/**
	 * Saves the advanced config for polls into the topic, from the posting page
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function save_config_for_polls($event)
	{
		if (isset($poll['poll_title']))
		{
			$this->advancedpolls->save_config_for_polls($event['data']['topic_id']);
		}
	}

	/**
	 * Adds the poll config options to the posting template
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function config_for_polls_to_template($event)
	{
		$post_data = $event['post_data'];
		$preview = $event['preview'];

		$post_data = $this->advancedpolls->config_for_polls_to_template($post_data, $preview);

		$event['post_data'] = $post_data;
	}

	/**
	 * Modifies the voting process depending on the advanced poll settings
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function do_poll_voting_modifications($event)
	{
		$topic_data = $event['topic_data'];

		if (isset($topic_data['poll_title']))
		{
			$vote_counts = $event['vote_counts'];
			$cur_voted_id = $event['cur_voted_id'];
			$voted_id = $event['voted_id'];
			$poll_info = $event['poll_info'];
			$s_can_vote = $event['s_can_vote'];
			$viewtopic_url = $event['viewtopic_url'];
			$this->advancedpolls->do_poll_voting_modifications($topic_data, $vote_counts, $cur_voted_id, $voted_id, $poll_info, $s_can_vote, $viewtopic_url);
			$event['vote_counts'] = $vote_counts;
			$event['cur_voted_id'] = $cur_voted_id;
			$event['voted_id'] = $voted_id;
			$event['poll_info'] = $poll_info;
			$event['s_can_vote'] = $s_can_vote;
		}
	}

	/**
	 * Modifys the viewtopic template vars to match the advanced poll settings
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function do_poll_template_modifications($event)
	{
		$topic_data = $event['topic_data'];

		if (isset($topic_data['poll_title']))
		{
			$vote_counts = $event['vote_counts'];
			$poll_info = $event['poll_info'];
			$poll_template_data = $event['poll_template_data'];
			$poll_options_template_data = $event['poll_options_template_data'];
			$this->advancedpolls->do_poll_template_modifications($topic_data, $vote_counts, $poll_info, $poll_template_data, $poll_options_template_data);
			$event['poll_template_data'] = $poll_template_data;
			$event['poll_options_template_data'] = $poll_options_template_data;
		}
	}

	/**
	 * Assigns the global template vars
	 *
	 * @return void
	 */
	public function assign_template_vars()
	{
		$this->template->assign_vars(array(
			'T_EXT_ADVANCEDPOLLS_PATH'				=> $this->path_helper->get_web_root_path() . $this->ext_root_path,
			'T_EXT_ADVANCEDPOLLS_THEME_PATH'		=> $this->path_helper->get_web_root_path() . $this->ext_root_path . '/styles/' . $this->user->style['style_path'] . '/theme',
		));
	}
}
