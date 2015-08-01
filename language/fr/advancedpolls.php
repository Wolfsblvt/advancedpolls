<?php
/**
*
* Advanced Polls extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com) & Chouf (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1352822)
*
* @copyright (c) 2015 Clemens Husung (Wolfsblvt) <www.pinkes-forum.de>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Sondages avancés',

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Votes masqués',
	'AP_POLL_RUN_TILL_APPEND'				=> ', tous les votes seront masqués jusqu’à cette date.',
	'AP_VOTERS'								=> 'Votants',
	'AP_NONE'								=> 'Aucun',

	'AP_POLL_CANT_VOTE'						=> 'Vous ne pouvez pas voter à ce sondage. Raison',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Vous n’avez pas participé à ce sujet.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Veuillez noter que si vous votez, votre vote sera visible.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Ne souhaite pas voter, voir les résultats',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'Veuillez noter que les résultats sont triés par ordre décroissant du nombre de votes reçus.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Erreur interne, les données du sondage sont incompatibles.',
	'AP_VOTE_CHANGED'						=> 'Vous n’avez pas l’autorisation de modifier vos votes.',
	'AP_TOO_MANY_VOTES'						=> 'Vous avez tenté de soumettre un nombre trop élevé de votes.',

	'AP_MAX_VOTES_SELECT'					=> array(
		1	=> 'Vous pouvez soumettre jusqu’à <strong>%2$d</strong> votes pour <strong>%1$d</strong> option',
		2	=> 'Vous pouvez soumettre jusqu’à <strong>%2$d</strong> votes parmi <strong>%1$d</strong> options',
	),
	'AP_GUEST_VOTES'						=> array(
		1	=> '%d vote d’invité',
		2	=> '%d votes d’invités',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Masquer les votes',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Si activé, les votes seront masqués jusqu’à la fin du sondage. Cette option fonctionne uniquement si le sondage possède une date d’échéance.',
	'AP_POLL_VOTERS_SHOW'					=> 'Afficher le nom des votants',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Si activé, le noms des votants sera affiché aux utilisateurs ayant la permission adéquate. Le nom des votants ne sera pas affiché si les votes sont masqués.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Restreindre les votes',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Si activé, seuls les participants à ce sujet peuvent voter.',
	'AP_POLL_SHOW_ORDERED'					=> 'Trier les résultats',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'Lorsque les résultats sont affichés, ceux-ci sont triés par ordre décroissant du nombre de votes reçus (le plus de votes en premier). Sinon, l’option de tri par défaut du sondage est utilisée.',
	'AP_RUN_POLL'							=> 'Lancer le sondage',
	'AP_RUN_POLL_FOR'						=> 'pour',
	'AP_RUN_POLL_UNTIL'						=> 'jusqu’à',
	'AP_RUN_POLL_INDEFINITELY'				=> 'indéfiniment',
	'AP_POLL_END'							=> 'Fin du sondage',
	'AP_POLL_END_EXPLAIN'					=> 'Spécifie la date et l’heure de fin du sondage. Si un de ces champs est spécifié, cela remplace la durée du sondage. Les champs laissés vides pour la date sont remplacés par la date de fin par défaut; les champs de l’heure laissés vides sont par défaut à 0. Si vous souhaitez utiliser la durée du sondage, cela nécessite de vider tous les champs.',

	'AP_YYYY_MM_DD'							=> 'AAAA-MM-JJ',
	'AP_HH_MM'								=> 'HH:MM',
	'AP_POLL_END_INVALID'					=> 'La date/heure spécifiée est invalide',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'Le nombre maximum de votes pour une seule option ne peut pas dépasser le nombre total de votes à soumettre à toutes les options',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'Le nombre maximum d’options de vote ne peut pas dépasser le nombre total de votes à soumettre à toutes les options',

	'AP_POLL_MAX_VALUE'						=> 'Nombre maximum de votes',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'Il s’agit du nombre maximum de votes qu’un votant peut soumettre à une seule option.',
	'AP_POLL_TOTAL_VALUE'					=> 'Nombre total de votes',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'Il s’agit du nombre total de votes qu’un votant peut soumettre parmi toutes les options.',
));
