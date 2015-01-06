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
	'AP_TITLE_ACP'					=> 'Avancerade omröstningar',
	'AP_SETTINGS_ACP'				=> 'Inställningar',

	'AP_TITLE'						=> 'Avancerade omröstningar',
	'AP_TITLE_EXPLAIN'				=> 'Utökar omröstningssystemet i phpBB med nya funktioner, du kan t.ex. dölja omröstningesresultatet tills omröstningen har avslutats, visa vem som röstat, osv.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Fler tillägg av Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Inställningar för Avancerade omröstningar',

	'AP_ACT_VOTES_HIDE'				=> 'Aktivera döljning av resultat',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Aktiverar inställningen som döljer omröstningens resultat tills omröstningen har avslutats.',
	'AP_ACT_VOTERS_SHOW'			=> 'Aktivera visning av medlemmar som har röstat',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Aktiverar inställningen som visar vem som har röstat och vad rösten har lagts på.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Aktivera förutsättning av inlägg för omröstning',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Aktiverar inställningen som gör att man endast kan rösta om man har skrivit ett inlägg i omröstningstråden.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'Standardmäßig ausgewählter Wer für "Verbergen der Abstimmungen"',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Standardmäßig ausgewählter Wer für "Anzeigen von Benutzern, die abgestimmt haben"',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Standardmäßig ausgewählter Wer für "Einschränkung der Abstimmung"',
));
