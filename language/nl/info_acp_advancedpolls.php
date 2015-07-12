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
	'AP_TITLE_EXPLAIN'				=> 'Uitbreiding van de in phpBB aanwezige Peiling systeem met oa.stemmen verbergen tot einde peiling, stemmers tonen, berperken van de stemmers en meer.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Meer extensies van Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Geavanceerde instellingen Peilingen',
	'AP_GLOBAL_SETTINGS'			=> 'Globale instellingen geavanceerde peilingen (geld voor alle peilingen)',
	'AP_PER_POLL_SETTINGS'			=> 'Instellingen per peiling (per peiling te selecteren, standaard waarden)',

	'AP_ACT_VOTES_HIDE'				=> 'Activeer stemmen verbergen',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Activeren van deze optie verbergt de stemmen op Peilingen tot deze ten einde is.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activeer het tonen van de stemmers',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Activeren van deze optie toont de stemmers in elke optie van de Peiling.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activeer beperking stemmers',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Door activering van deze optie kunnen alleen gebruikers stemmen die in het bewuste onderwerp geschreven hebben.',
	'AP_ACT_POLL_NO_VOTE'			=> 'Activeer niet stemmen',
	'AP_ACT_POLL_NO_VOTE_EXPLAIN'	=> 'Wijzigd de standaard "Toon stemmen" link door een "Niet stemmen" link, dit staat niet toe om na het bebijken van de resultaten alsnog te kunnen stemmen tenzij "Stem wijzigen" is geselecteerd.',
	'AP_ACT_SHOW_ORDERED'			=> 'Activeer toon volgorde',
	'AP_ACT_SHOW_ORDERED_EXPLAIN'	=> 'Activeer deze optie om de resultaten op aflopende volgorde van het aantal stemmen te tonen (hoogste aantal stemmen eerst).',
	'AP_ACT_POLL_SCORING'			=> 'Activeer peiling score',
	'AP_ACT_POLL_SCORING_EXPLAIN'	=> 'Activeer de mogelijkheid om verschillende scores aan een peilings opties toe te voegen.',
	'AP_ACT_INCREMENTAL_VOTES'		=> 'Activeer incrementele stemmen',
	'AP_ACT_INCREMENTAL_VOTES_EXPLAIN'	=> 'Activeer de mogelijkheid om een incrementele stem uit te brengen, terwijl u niet uw beschikbare stemmen vermogens heeft uitgeput.',
	'AP_ACT_CLOSED_VOTING'			=> 'Activeer gesloten stemmen',
	'AP_ACT_CLOSED_VOTING_EXPLAIN'	=> 'Activeer de mogelijkheid in een open peiling te stemmen terwijl het bijbehorende onderwerp gesloten is.',
	'AP_ACT_POLL_END'				 => 'Activeer einde van een peiling',
	'AP_ACT_POLL_END_EXPLAIN'		=> 'Staat het toe om een peiling op een bepaalde datum/tijd te sluiten in plaats van een tijdsduur vanaf dat de peiling gestart is.',
	'AP_ACT_POLL_NOTIFICATIONS'		=> 'Activeer berichtgeving over een peiling',
	'AP_ACT_POLL_NOTIFICATIONS_EXPLAIN'	=> 'Activeerd het versturen van een bericht naar alle stemmers van een normale of verborgen peiling wanneer deze afgelopen is en de resultaten zichtbaar zijn.',

	'AP_DEFAULT_VOTES_CHANGE'		=> 'Selecteer standaard waarde voor het wijzigen van stemmen',
	'AP_DEFAULT_VOTES_HIDE'			=> 'Selecteer standaard waarde voor het verbergen van stemmen',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Selecteer standaard waarde voor het tonen van stemmers',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Selecteer standaard waarde voor het beperking van stemmers',
	'AP_DEFAULT_SHOW_ORDERED'		=> 'Standaard waarden voor het tonen van de volgorde',
));
