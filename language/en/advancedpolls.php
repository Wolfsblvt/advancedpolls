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

	'AP_VOTES_HIDDEN'						=> 'Votes hidden',
	'AP_POLL_RUN_TILL_APPEND'				=> ', until then all votes are hidden.',
	'AP_VOTERS'								=> 'Voters',
	'AP_NONE'								=> 'None',

	'AP_POLL_CANT_VOTE'						=> 'You can\'t vote on this poll. Reason',
	'AP_POLL_REASON_NOT_POSTED'				=> 'You haven\'t posted in this topic.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Please note that if you vote, your vote will be visible.',

	'AP_POLL_VOTES_HIDE'					=> 'Hide votes',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'If enabled votes will be hidden until the poll ends. This option only works if the poll has a specified end.',
	'AP_POLL_VOTERS_SHOW'					=> 'Show poll voters',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'If enabled voters will be shown to those people who have the permission. Note that voters still will be hidden if votes are hidden.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limit votes',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'If enabled users can only vote if they have posted in this topic already.',
));
