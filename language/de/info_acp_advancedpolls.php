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
	'AP_SETTINGS_ACP'				=> 'Einstellungen',

	'AP_TITLE'						=> 'Advanced Polls',
	'AP_TITLE_EXPLAIN'				=> 'Erweitert das Umfragen-System von phpBB mit neuen Funktionen, wie das Verbergen der Abstimmungen bis zum Ende der Umfrage, dem Anzeigen der Benutzer, die abgestimmt haben, dem Limitieren des Abstimmens und mehr.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Mehr Erweiterungen von Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Advanced Polls Einstellungen',

	'AP_ACT_VOTES_HIDE'				=> 'Aktiviere Verbergen der Abstimmungen',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Aktiviert die Option zum Auswählen, dass Abstimmungen bis zum Ende der Umfrage verborgen werden.',
	'AP_ACT_VOTERS_SHOW'			=> 'Aktiviere Anzeigen von Benutzern, die abgestimmt haben',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Aktiviert die Option zum Auswählen, dass Benutzer, die abgestimmt haben, für jede Abstimmungs-Option angezeigt werden.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Aktiviere Einschränkung der Abstimmung',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Aktiviert die Option zum Auswählen, dass nur Benutzer abstimmen können, die bereits in diesem Thema geantwortet haben.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'Standardmäßig ausgewählter Wert für "Verbergen der Abstimmungen"',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Standardmäßig ausgewählter Wert für "Anzeigen von Benutzern, die abgestimmt haben"',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Standardmäßig ausgewählter Wert für "Einschränkung der Abstimmung"',
));
