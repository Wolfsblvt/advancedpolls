<?php
/**
 *
 * Advanced Polls [Hebrew]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by koraldon (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=336119)
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'סקרים מתקדמים',

	'AP_VOTES_HIDDEN'						=> 'הצבעות נסתרות',
	'AP_POLL_RUN_TILL_APPEND'				=> ', עד אז  כל ההצבעות נסתרות.',
	'AP_VOTERS'								=> 'מצביעים',
	'AP_NONE'								=> 'אין',

	'AP_POLL_CANT_VOTE'						=> 'אתה לא יכול להשתתף בסקר זה. סיבה-',
	'AP_POLL_REASON_NOT_POSTED'				=> 'לא כתבת הודעה בנושא זה',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'שים לב שההצבעה שלך גלויה.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'הצג תוצאות מבלי להצביע',

	'AP_POLL_VOTES_HIDE'					=> 'הסתר הצבעות',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'אם מופעל ההצבעות נסתרות עד סיום הסקר. אפשרות זו עובדת רק אם לסקר יש מועד סיום.',
	'AP_POLL_VOTERS_SHOW'					=> 'הצג מצביעים',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'אם מופעל בעלי הרשאות יוכלו לראות מי הצביע. שים לב שמצביעים עדיין יהיו נסתרים אם האפשרות מופעלות.',
	'AP_POLL_VOTERS_LIMIT'					=> 'הגבל הצבעות',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'אם מופעל רק מי שכתב הודעה בנושא זה יכול להצביע.',
));
