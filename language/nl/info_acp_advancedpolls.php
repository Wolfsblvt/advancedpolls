<?php
/**
 *
 * Advanced Polls [Dutch]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by Beun12 (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1466206)
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
	'AP_TITLE_ACP'					=> 'Geavanceerde Peilingen',
	'AP_SETTINGS_ACP'				=> 'Instellingen',

	'AP_TITLE'						=> 'Geavanceerde Peilingen',
	'AP_TITLE_EXPLAIN'				=> 'Uitbreiding van de in phpBB aanwezige peiling systeem met oa.stemmen verbergen tot einde peiling, stemmers tonen, berperken van de stemmers en meer.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Meer extensies van Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Geavanceerde instellingen peilingen',

	'AP_ACT_VOTES_HIDE'				=> 'Activeer verbergen stemmen',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Activeren van deze optie verbergt de stemmen op peiling tot deze ten einde is.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activeer tonen van stemmers',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Activeren van deze optie toont de stemmers in elke optie van de peiling.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activeer beperking stemmers',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Door activering van deze optie kunnen alleen gebruikers stemmen die in dat bewuste onderwerp geschreven hebben.',

	'AP_DEFAULT_VOTES_CHANGE'		=> 'Selecteer standaard bij wijzing peiling',
	'AP_DEFAULT_VOTES_HIDE'			=> 'Selecteer als standaard voor verbergen van stemmen',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Selecteer als standaard voor het tonen van stemmers',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Selecteer als standaard voor beperking stemmers',
));
