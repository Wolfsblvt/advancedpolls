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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Geavanceerde Peilingen',

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Stemmen verbergen',
	'AP_POLL_RUN_TILL_APPEND'				=> ', tot, dan alle stemmen verbegen.',
	'AP_VOTERS'								=> 'Stemmers',
	'AP_NONE'								=> 'Geen',

	'AP_POLL_CANT_VOTE'						=> 'U kunt op deze vraag niet stemmen omdat',
	'AP_POLL_REASON_NOT_POSTED'				=> 'U heeft in dit onderwerp niets geschreven.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Denk eraan dat wanneer u stemt uw stem zichbaar word',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Resultaten tonen zonder te stemmen',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'Let op dat de resultaten in aflopende volgorde worden weergegeven op basis van de ontvangen stemmen.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Inconsistente peiling gegevens, interne fout.',
	'AP_VOTE_CHANGED'						=> 'U hoeft geen rechten om uw uitgebrachte stemmen te veranderen.',
	'AP_TOO_MANY_VOTES'						=> 'U heeft geprobeerd om te veel te stemmem.',

	'AP_MAX_VOTES_SELECT'	=> array(
		1	=> 'U mag tot <strong>%2$d</strong> opties kiezen bij <strong>%1$d</strong> stemmen',
		2	=> 'U mag tot <strong>%2$d</strong> optis kiezen onder <strong>%1$d</strong> stemmen',
	),
	'AP_GUEST_VOTES'	=> array(
		1	=> '%d stem van een gast',
		2	=> '%d stemmen van gasten',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Verberg stemmen',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Indien ingeschakeld zullen de stemmen tot het einde van de peiling verborgen zijn. Deze optie werkt alleen wanneer de peiling een specifieke einde heeft.',
	'AP_POLL_VOTERS_SHOW'					=> 'Toon stemmers van deze peiling',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Indien ingeschakeld zullen de stemmers getoont worden aan die personen die deze rechten hebben. Let erop dat de stemmers verborgen blijven wanneer de stemmen niet getoont worden.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Beperk stemmen',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Indien ingeschakeld kunnen gebruikers alleen stemmen wanneer ze in dat onderwerp iets geschreven hebben.',
	'AP_POLL_SHOW_ORDERED'					=> 'Toon resultaten op volgorde',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'Indien resultaten weergegeven worden zijn deze op aflopende volgorde op basis van het aantal ontvangen stemmen (Meest gestemde eerst). Of anders op basis van peiling opties.',
	'AP_POLL_END'							=> 'Einde van de peiling',
	'AP_POLL_END_EXPLAIN'					=> 'Geef de datum op wanneer de peiling eindigd. Indien opgegeven overschrijft deze de lengte van de peiling. Als u dit niet wenst te gebruiken dient deze velden leeg te laten/maken.',

	'AP_YYYY_MM_DD'							=> 'JJJJ-MM-DD',
	'AP_HH_MM'								=> 'UU:MM',
	'AP_POLL_END_INVALID'					=> 'Opgegeven datum of tijd is ongeldig',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'De maximale aantal stemmen voor een enkele optie kan nooit meer zijn dan het maximale aantal stemmen over alle opties',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'De maximale opties om te stemmen mag niet meer dan de totale stemmen die onder alle opties te verdelen zijn',

	'AP_POLL_MAX_VALUE'						=> 'Maximale aantal stemmen',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'Dit is het maximale aantal stemmen dat een gebruiker per optie mag geven.',
	'AP_POLL_TOTAL_VALUE'					=> 'Totale stemmen',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'Dit is het totale aantal stemmen dat een gebruiker voor alle opties mag vergeven.',
));
