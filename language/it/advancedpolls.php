<?php
/**
 *
 * Advanced Polls [Italian]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by Mauron (https://github.com/Mauron)
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Sondaggi avanzati',

	'AP_VOTES_HIDDEN'						=> 'Voti nascosti',
	'AP_POLL_RUN_TILL_APPEND'				=> ', fino ad allora i voti saranno nascosti.',
	'AP_VOTERS'								=> 'Votanti',
	'AP_NONE'								=> 'Nessuno',

	'AP_POLL_CANT_VOTE'						=> 'Non puoi votare questo sondaggio. Motivo',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Non hai lasciato messaggi in questo topic.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Votando questo sondaggio, il tuo voto sarà visibile.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'AP_POLL_DONT_VOTE_SHOW_RESULTS',

	'AP_POLL_VOTES_HIDE'					=> 'Nascondi voti',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Se abilitato, i votanti saranno nascosti fino al termine del sondaggio. Quest\'opzione entra in funzione se viene specificata una durata massima per il sondaggio.',
	'AP_POLL_VOTERS_SHOW'					=> 'Mostra votanti',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Se abilitato, i votanti saranno mostrati agli utenti dotati di apposito permesso. I votanti saranno comunque nascosti se è abilitata la relativa opzione.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limita voto',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Se abilitato, gli utenti potranno votare dopo aver risposto al topic.',
));
