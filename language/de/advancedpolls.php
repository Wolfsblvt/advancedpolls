<?php
/**
 * 
 * Advanced Polls [Deutsch]
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
//6
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

	'AP_VOTES_HIDDEN'						=> 'Abstimmungen verborgen',
	'AP_POLL_RUN_TILL_APPEND'				=> ' Bis zu diesem Zeitpunkt werden alle Abstimmungen verborgen.',
	'AP_VOTERS'								=> 'Benutzer, die abgestimmt haben',
	'AP_NONE'								=> 'Keine',

	'AP_POLL_CANT_VOTE'						=> 'Du kannst bei dieser Umfrage nicht abstimmen. Grund',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Du hast noch keinen Beitrag in diesem Thema geschrieben.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Bitte beachte, dass wenn du abstimmst, wird deine Stimme sichtbar sein.',

	'AP_POLL_VOTES_HIDE'					=> 'Verberge Abstimmungen',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Wenn diese Option aktiviert ist, werden Abstimmungen verborgen, bis die Umfrage beendet ist.<br />Diese Option funktioniert nur, wenn ein End-Datum für diese Umfrage setzt ist.',
	'AP_POLL_VOTERS_SHOW'					=> 'Zeige Benutzer, die abgestimmt haben',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Wenn diese Option aktiviert ist, werden Benutzer, die abgestimmt haben, für alle mit den entsprechenden Berechtigungen unter den Optionen angezeigt.<br />Beachte, dass dies verborgen bleibt, falls die Abstimmungen verborgen sein sollten.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Schränke Abstimmung ein',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Wenn diese Option aktiviert ist, werden Benutzer nur abstimmen können, wenn sie bereits in diesem Thema geschrieben haben.',
));
