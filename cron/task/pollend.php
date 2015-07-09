<?php
/**
 *
 * Advanced Polls Cron Task
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

namespace wolfsblvt\advancedpolls\cron\task;

class pollend extends \phpbb\cron\task\base
{
	protected $config;
	protected $db;
	protected $log;
	protected $user;
	protected $notification_manager;

	protected $last_run, $this_run, $next_run;

	/**
	* Constructor.
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\log\log $log, \phpbb\user $user, \phpbb\notification\manager $notification_manager)
	{
		$this->set_name('wolfsblvt.advancedpolls.pollend');

		$this->config = $config;
		$this->db = $db;
		$this->log = $log;
		$this->user = $user;
		$this->notification_manager = $notification_manager;
	}

	/**
	* Runs this cron task.
	*
	* @return null
	*/
	public function run()
	{
		$this->last_run = (int) $this->config['wolfsblvt.advancedpolls.pollend_last_gc'];
		$this->this_run = $this->last_run + (int) $this->config['wolfsblvt.advancedpolls.pollend_gc'];
		$this->next_run = (int) 0;

		// Grab all polls finished since the last execution of this task that were hidden
		$sql = 'SELECT topic_id, forum_id, topic_poster, topic_title, poll_title, poll_start + poll_length as poll_end
			FROM ' . TOPICS_TABLE . '
			WHERE poll_start > 0 AND poll_length > 0
			AND wolfsblvt_poll_votes_hide = 1
			AND poll_start + poll_length > ' . $this->last_run . '
			ORDER BY poll_start + poll_length ASC';
		$result = $this->db->sql_query($sql);

		$topics = array();
		$this->this_run = time();
		while ($row = $this->db->sql_fetchrow($result))
		{
			if ((int) $row['poll_end'] > $this->this_run)
			{
				$this->next_run = (int) $row['poll_end'];
				break;
			}
			$topics[] = $row;
		}
		$this->db->sql_freeresult($result);

		// Send notifications for each poll that requires it
		foreach ($topics as $topic_data)
		{
			$this->notification_manager->add_notifications('wolfsblvt.advancedpolls.notification.type.pollended', $topic_data);
		}

		// Setup the next run of this task
		$this->config->set('wolfsblvt.advancedpolls.pollend_last_gc', $this->this_run);
		$this->config->set('wolfsblvt.advancedpolls.pollend_gc', ($this->next_run) ? $this->next_run - $this->this_run : 0);
	}

	/**
	* Returns whether this cron task can run, given current board configuration.
	*
	* @return bool
	*/
	public function is_runnable()
	{
		return (bool) $this->config['wolfsblvt.advancedpolls.activate_notifications'] && $this->config['wolfsblvt.advancedpolls.pollend_gc'];
	}

	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* @return bool
	*/
	public function should_run()
	{
		return (bool) ($this->config['wolfsblvt.advancedpolls.pollend_last_gc'] < time() - $this->config['wolfsblvt.advancedpolls.pollend_gc']);
	}
}
