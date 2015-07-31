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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Advanced Polls',

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Votes hidden',
	'AP_POLL_RUN_TILL_APPEND'				=> ', until then all votes are hidden.',
	'AP_VOTERS'								=> 'Voters',
	'AP_NONE'								=> 'None',

	'AP_POLL_CANT_VOTE'						=> 'You can’t vote on this poll. Reason',
	'AP_POLL_REASON_NOT_POSTED'				=> 'You haven’t posted in this topic.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Please note that if you vote, your vote will be visible.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Don’t vote, view results',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'Please note that results are sorted by decreasing number of votes received.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Inconsistent poll data, internal error.',
	'AP_VOTE_CHANGED'						=> 'You do not have permissions to change your casted votes.',
	'AP_TOO_MANY_VOTES'						=> 'You have tried to assign too many votes.',

	'AP_MAX_VOTES_SELECT'					=> array(
		1	=> 'You may give up to <strong>%2$d</strong> votes to <strong>%1$d</strong> option',
		2	=> 'You may give up to <strong>%2$d</strong> votes amongst <strong>%1$d</strong> options',
	),
	'AP_GUEST_VOTES'						=> array(
		1	=> '%d vote from guest',
		2	=> '%d votes from guests',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Hide votes',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'If enabled votes will be hidden until the poll ends. This option only works if the poll has a specified end.',
	'AP_POLL_VOTERS_SHOW'					=> 'Show poll voters',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'If enabled voters will be shown to those people who have the permission. Note that voters still will be hidden if votes are hidden.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limit votes',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'If enabled users can only vote if they have posted in this topic already.',
	'AP_POLL_SHOW_ORDERED'					=> 'Show results ordered',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'When results are shown, these are ordered by descending number of votes received (highest voted first). Otherwise, poll option order is used.',
	'AP_RUN_POLL'							=> 'Run poll',
	'AP_RUN_POLL_FOR'						=> 'for',
	'AP_RUN_POLL_UNTIL'						=> 'until',
	'AP_RUN_POLL_INDEFINITELY'				=> 'indefinitely',
	'AP_POLL_END'							=> 'Poll end',
	'AP_POLL_END_EXPLAIN'					=> 'Specify the date and time when the poll ends. If any of these fields is specified, it overrides the Poll Length. Date fields left empty default to the current Poll End date; hour fields left empty default to 0. If you want to revert back to using Poll Length, you will need to clean all these fields.',

	'AP_YYYY_MM_DD'							=> 'YYYY-MM-DD',
	'AP_HH_MM'								=> 'HH:MM',
	'AP_POLL_END_INVALID'					=> 'Specified date/time is invalid',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'The maximum votes for a single option cannot be more than the total votes to distribute amongs all options',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'The maximum options to vote cannot be more than the total votes to distribute amongs all options',

	'AP_POLL_MAX_VALUE'						=> 'Maximum votes',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'This is the maximum number of votes that a voter might give to a single option.',
	'AP_POLL_TOTAL_VALUE'					=> 'Total votes',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'This is the total number of votes that a voter might distribute amongst all options.',
));
