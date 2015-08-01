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
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array<string,string>
	 */
	public static function getSubscribedEvents()
	{
		return array(
			'core.permissions'								=> 'adv_polls_permissions',				// permissions
			'core.user_setup'								=> 'load_language_on_setup',			// language for notifications
			'core.posting_modify_submission_errors'			=> 'check_config_for_polls',			// posting check before saving
			'core.posting_modify_template_vars'				=> 'config_for_polls_to_template',		// posting to template
			'core.submit_post_modify_sql_data'				=> 'save_config_for_polls',				// posting to db
			'core.viewtopic_modify_poll_data'				=> 'do_poll_voting_modifications',		// viewtopic to db
			'core.viewtopic_modify_poll_template_data'		=> 'do_poll_template_modifications',	// viewtopic to template
		);
	}

	/**
	 * Adds the permission to the right permission category
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function adv_polls_permissions($event)
	{
		$permissions = array_merge($event['permissions'], array(
				'f_seevoters'		=> array('lang' => 'ACL_F_SEEVOTERS', 'cat' => 'polls'),
				'm_seevoters'		=> array('lang' => 'ACL_M_SEEVOTERS', 'cat' => 'misc'),
			));
		$event['permissions'] = $permissions;
	}

	/**
	* Load common language files during user setup
	*
	* @param object $event The event object
	* @return void
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'wolfsblvt/advancedpolls',
			'lang_set' => array('advancedpolls', 'advancedpolls_common'),
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Checks the advanced config for polls before saving into the topic, from the posting page
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function check_config_for_polls($event)
	{
		$poll = $event['poll'];

		if ($event['submit'] && isset($poll['poll_title']) && $poll['poll_title'])
		{
			$error = $this->advancedpolls->check_config_for_polls($poll);
			if (count($error))
			{
				$event['error'] = array_merge($event['error'], $error);
			}
			else
			{
				$event['poll'] = $poll;
			}
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
		$page_data = $event['page_data'];
		$preview = $event['preview'];
		$this->advancedpolls->config_for_polls_to_template($post_data, $page_data, $preview);
		$event['page_data'] = $page_data;
	}

	/**
	 * Saves the advanced config for polls into the topic, from the posting page
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function save_config_for_polls($event)
	{
		if (isset($event['poll']['poll_title']))
		{
			$sql_data = $event['sql_data'];
			$this->advancedpolls->save_config_for_polls($sql_data);
			$event['sql_data'] = $sql_data;
		}
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
}
