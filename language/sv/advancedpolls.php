<?php
/**
 *
 * Advanced Polls [Swedish]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * Swedish translation by Holger (http://www.maskinisten.net)
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Avancerade omröstningar',

	'AP_VOTES_HIDDEN'						=> 'Omröstningar dolda',
	'AP_POLL_RUN_TILL_APPEND'				=> 'Alla omröstningar döljs fram till denna tidpunkt.',
	'AP_VOTERS'								=> 'Medlemmar som har röstat',
	'AP_NONE'								=> 'Inga',

	'AP_POLL_CANT_VOTE'						=> 'Du kan ej rösta. Orsak',
	'AP_POLL_REASON_NOT_POSTED'				=> 'du har ej skrivit något inlägg i denna tråd.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Beakta att ditt medlemsnamn kommer att visas vid ditt val i resultatet.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Rösta ej, visa resultat',

	'AP_POLL_VOTES_HIDE'					=> 'Dölj omröstningen',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Om denna inställning aktiveras så döljs resultatet tills omröstningen har avslutats.<br />Denna inställning fungerar endast om ett slutdatum har ställts in för omröstningen.',
	'AP_POLL_VOTERS_SHOW'					=> 'Visa medlemmar som har röstat',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Om denna inställning aktiveras så visas medlemsnamnet under motsvarande röst för alla med motsvarande behörighet.<br />Beakta att detta döljs om omröstningen är dold.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Inlägg förutsätts',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Om denna inställning aktiveras så kan endast medlemmar rösta som har skrivit ett inlägg i tråden.',
));
