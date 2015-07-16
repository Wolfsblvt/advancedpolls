<?php
/**
 *
 * Advanced Polls [English]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'AP_TITLE_ACP'					=> 'Advanced Polls',
	'AP_SETTINGS_ACP'				=> 'Settings',

	'AP_TITLE'						=> 'Advanced Polls',
	'AP_TITLE_EXPLAIN'				=> 'Advances the core poll system of phpBB with new features like hiding votes till end, showing poll voters, limiting the votes and more.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">More extensions of Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Advanced Polls Settings',
	'AP_GLOBAL_SETTINGS'			=> 'Advanced Polls Global Settings (apply to all polls)',
	'AP_PER_POLL_SETTINGS'			=> 'Advanced Polls Per Poll Settings (selectable per poll, with default value set here)',

	'AP_ACT_VOTES_HIDE'				=> 'Activate hide votes',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Activates the option to choose that poll votes are hidden until the poll ends.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activate show voters',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Activates the option to choose that poll voters are displayed for each poll option.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activate limit voters',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Activates the option to choose to limit voter for a poll to users that have already posted in this topic.',
	'AP_ACT_POLL_NO_VOTE'			=> 'Activate no vote',
	'AP_ACT_POLL_NO_VOTE_EXPLAIN'	=> 'Changes the standard “View results” link by a “Don’t vote, view results” link, that will not allow voting after viewing the results unless "Change votes" is selected.',
	'AP_ACT_SHOW_ORDERED'			=> 'Activate show ordered',
	'AP_ACT_SHOW_ORDERED_EXPLAIN'	=> 'Activates the option to choose to show the results by descending order of votes received (highest voted first).',
	'AP_ACT_POLL_SCORING'			=> 'Activate scoring polls',
	'AP_ACT_POLL_SCORING_EXPLAIN'	=> 'Activates the possibility to assign different scores to the poll options.',
	'AP_ACT_INCREMENTAL_VOTES'		=> 'Activate incremental voting',
	'AP_ACT_INCREMENTAL_VOTES_EXPLAIN'	=> 'Activates the possibility to vote incrementally, while you have not exhausted your available voting capabilities.',
	'AP_ACT_CLOSED_VOTING'			=> 'Activate closed voting',
	'AP_ACT_CLOSED_VOTING_EXPLAIN'	=> 'Activates the possibility to vote on an open poll even if the corresponding topic is locked.',
	'AP_ACT_POLL_END'				=> 'Activate poll end',
	'AP_ACT_POLL_END_EXPLAIN'		=> 'Allows specifying when a poll ends by date/time, instead of just specifying a poll duration since poll start.',
	'AP_ACT_POLL_NOTIFICATIONS'				=> 'Activate poll notifications',
	'AP_ACT_POLL_NOTIFICATIONS_EXPLAIN'		=> 'Activates sending notifications to all voters of a hidden poll when then poll has finished, and hence results are visible.',

	'AP_DEFAULT_VOTES_CHANGE'		=> 'Selected default for change vote',
	'AP_DEFAULT_VOTES_HIDE'			=> 'Selected default for hide votes',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Selected default for show voters',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Selected default for limit voters',
	'AP_DEFAULT_SHOW_ORDERED'		=> 'Selected default for show ordered',
));
