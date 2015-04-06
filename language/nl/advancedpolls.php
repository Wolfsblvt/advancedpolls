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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Geavanceerde Polls',

	'AP_VOTES_HIDDEN'						=> 'Stemmen verbergen',
	'AP_POLL_RUN_TILL_APPEND'				=> ', tot, dan alle stemmen verbegen.',
	'AP_VOTERS'								=> 'Stemmers',
	'AP_NONE'								=> 'Geen',

	'AP_POLL_CANT_VOTE'						=> 'U kunt op deze vraag niet stemmen omdat',
	'AP_POLL_REASON_NOT_POSTED'				=> 'U heeft in dit onderwerp niets geschreven.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Denk eraan dat wanneer u stemt uw stem zichbaar word',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'AP_POLL_DONT_VOTE_SHOW_RESULTS',

	'AP_POLL_VOTES_HIDE'					=> 'Verberg stemmen',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Indien ingeschakeld zullen de stemmen tot het einde van de poll verborgen zijn. Deze optie werkt alleen wanneer de poll een specifieke einde heeft.',
	'AP_POLL_VOTERS_SHOW'					=> 'Toon stemmers van deze poll',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Indien ingeschakeld zullen de stemmers getoont worden aan die personen die deze rechten hebben. Let erop dat de stemmers verborgen blijven wanneer de stemmen niet getoont worden.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Beperk stemmen',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Indien ingeschakeld kunen gebruikers alleen stemmen wanneer in dat onderwerp iets geschreven hebben.',
));
