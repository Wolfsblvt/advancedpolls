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

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Voti nascosti',
	'AP_POLL_RUN_TILL_APPEND'				=> ', fino ad allora i voti saranno nascosti.',
	'AP_VOTERS'								=> 'Votanti',
	'AP_NONE'								=> 'Nessuno',

	'AP_POLL_CANT_VOTE'						=> 'Non puoi votare questo sondaggio. Motivo',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Non hai lasciato messaggi in questo topic.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Votando questo sondaggio, il tuo voto sarà visibile.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Mi astengo, mostra risultati',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'I risultati sono ordinati per numero di voti ricevuti in ordine decrescente.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Dati sondaggio inconsistenti, errore interno.',
	'AP_VOTE_CHANGED'						=> 'Non hai i permessi per cambiare i voti espressi.',
	'AP_TOO_MANY_VOTES'						=> 'Stai cercando di esprimere troppi voti.',

	'AP_MAX_VOTES_SELECT'					=> array(
		1	=> 'Puoi esprimere fino a <strong>%2$d</strong> voti per <strong>%1$d</strong> opzioni',
		2	=> 'Puoi esprimere fino a <strong>%2$d</strong> voti fra <strong>%1$d</strong> opzioni',
	),
	'AP_GUEST_VOTES'						=> array(
		1	=> '%d voto da un ospite',
		2	=> '%d voti da ospiti',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Nascondi voti',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Se abilitato, i votanti saranno nascosti fino al termine del sondaggio. Quest’opzione entra in funzione se viene specificata una durata massima per il sondaggio.',
	'AP_POLL_VOTERS_SHOW'					=> 'Mostra votanti',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Se abilitato, i votanti saranno mostrati agli utenti dotati di apposito permesso. I votanti saranno comunque nascosti se è abilitata la relativa opzione.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limita voto',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Se abilitato, gli utenti potranno votare dopo aver risposto al topic.',
	'AP_POLL_SHOW_ORDERED'					=> 'Mostra risultati ordinati',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'Quando vengono mostrati i risultati, le opzioni appariranno in ordine decrescente per numero di voti ricevuti (la più votata per prima); altrimenti, sarà mostrato l’ordine specificato per le opzioni.',
	'AP_POLL_END'							=> 'Termine del sondaggio',
	'AP_POLL_END_EXPLAIN'					=> 'Specifica data e ora per il termine del sondaggio. Se specificate, queste opzioni prevarranno sulla durata specificata per il sondaggio; per usare la durata in giorni, vuotare questi campi.',

	'AP_YYYY_MM_DD'							=> 'AAAA-MM-GG',
	'AP_HH_MM'								=> 'HH:MM',
	'AP_POLL_END_INVALID'					=> 'La data e/o l’ora indicata non è valida',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'Il numero di voti per singola opzione non può essere maggiore del numero di voti totali per tutte le opzioni',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'Il numero massimo di opzioni da votare non può essere superiore al numero di voti totali per tutte le opzioni',

	'AP_POLL_MAX_VALUE'						=> 'Voti massimi',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'Il numero di voti massimi esprimibili da ogni votante per singola opzione.',
	'AP_POLL_TOTAL_VALUE'					=> 'Voti totali',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'Il numero di voti totali esprimibili da ogni votante per tutte le opzioni.',
));
