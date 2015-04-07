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
	'AP_TITLE_ACP'					=> 'סקרים מתקדמים',
	'AP_SETTINGS_ACP'				=> 'הגדרות',

	'AP_TITLE'						=> 'סקרים מתקדמים',
	'AP_TITLE_EXPLAIN'				=> 'מקדם את מערכת הסקרים של phpBB עם אפשרויות חדשות כגון הסתרת הצבעות עד סוף הסקר, הצגת שמות המצביעים ועוד.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">עוד תוספות מאת Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'הגדרות סקרים מתקדמים',

	'AP_ACT_VOTES_HIDE'				=> 'הפעלת הסתרת מצביעים',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'מפעיל את האפשרות לבחר להסתיר את ההצבעות עד תום הסקר.',
	'AP_ACT_VOTERS_SHOW'			=> 'הפעל הצגת מצביעים',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'מפעיל את האפשרות לבחור ששמות המצביעים יוצגו בתוצאה שהם בחרו.',
	'AP_ACT_VOTERS_LIMIT'			=> 'הפעל הגבלת מצביעים',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'מפעיל את האפשרות לבחור שרק מי שפרסם הודעה בנושא יכול להצביע בסקר.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'ברירת המחדר עבור הסתרת מצביעים',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'ברירת המחדל עבור הצגת מצביעים',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'ברירת המחדל עבור הגבלת מצביעים',
	'AP_DEFAULT_VOTES_CHANGE'		=> 'ברירת המחדל עבור שינוי הצבעות',

));
