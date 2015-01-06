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
	 * @param \wolfsblvt\advancedpolls\core\advancedpolls	$advancedpolls		Online Time
	 * @param \phpbb\path_helper					$path_helper	phpBB path helper
	 * @param \phpbb\template\template				$template		Template object
	 * @param \phpbb\user							$user			User object
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
			'core.submit_post_end'							=> 'save_config_for_polls',
			'core.posting_modify_template_vars'				=> 'config_for_polls_to_template',
			'core.viewtopic_get_post_data'					=> 'do_poll_modification',
		);
	}

	/**
	 * Saves the advanced config for polls
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function save_config_for_polls($event)
	{
		$poll = $event['poll'];

		if (isset($poll['poll_title']))
		{
			$this->advancedpolls->save_config_for_polls($event['data']['topic_id'], $poll);
		}
	}

	/**
	 * Adds the config options to the template
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function config_for_polls_to_template($event)
	{
		$post_data = $event['post_data'];
		$this->advancedpolls->config_for_polls_to_template($post_data);
	}

	/**
	 * Modifys the template vars to match the advanced poll settings
	 *
	 * @param object $event The event object
	 * @return void
	 */
	public function do_poll_modification($event)
	{
		$topic_data = $event['topic_data'];

		if (isset($topic_data['poll_title']))
		{
			$this->advancedpolls->do_poll_modification($topic_data);
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
