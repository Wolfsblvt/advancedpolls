<?php
/**
 *
 * Advanced Polls [Spanish]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Initial translation by Raul [ThE KuKa] (https://github.com/phpbb-es)
 * @author Continued translation by javiexin (http://www.exincastillos.es)
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Encuestas Avanzadas',

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Votos ocultos',
	'AP_POLL_RUN_TILL_APPEND'				=> ', hasta entonces todos los votos estarán ocultos.',
	'AP_VOTERS'								=> 'Votantes',
	'AP_NONE'								=> 'Ninguno',

	'AP_POLL_CANT_VOTE'						=> 'Usted no puede votar en esta encuesta. Razón',
	'AP_POLL_REASON_NOT_POSTED'				=> 'No ha escrito en este tema.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Tenga en cuenta que si vota, su voto será visible.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'No voto, ver los resultados',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'Los resultados están ordenados por número decreciente de votos recibidos.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Datos inconsistentes en la encuesta, error interno.',
	'AP_VOTE_CHANGED'						=> 'No tiene permiso para cambiar sus votos ya emitidos.',
	'AP_TOO_MANY_VOTES'						=> 'Ha intentado otorgar demasiados votos.',

	'AP_MAX_VOTES_SELECT'					=> array(
		1	=> 'Puede otorgar hasta <strong>%2$d</strong> votos a <strong>%1$d</strong> opción',
		2	=> 'Puede otorgar hasta <strong>%2$d</strong> votos entre <strong>%1$d</strong> opciones',
	),
	'AP_GUEST_VOTES'						=> array(
		1	=> '%d voto de invitado',
		2	=> '%d votos de invitados',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Ocultar votos',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Si esta habilitado, los votos estarán ocultos hasta que la encuesta termine. Esta opción sólo funciona si la encuesta tiene un final determinado.',
	'AP_POLL_VOTERS_SHOW'					=> 'Mostrar votantes de la encuesta',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Si esta habilitado, los votantes serán mostrados a aquellas personas que tengan el permiso oportuno. Tenga en cuenta que los votantes estarán ocultos si los votos están ocultos.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limite de votos',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Si esta habilitado, los usuarios habilitados sólo pueden votar si ya han escrito en este tema.',
	'AP_POLL_SHOW_ORDERED'					=> 'Ordenar resultados',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'Cuando se muestran los resultados, estos se ordenan por número decreciente de votos recibidos (el más votado primero). En caso contrario, se usa el orden de opciones en la encuesta.',
	'AP_RUN_POLL'							=> 'Realizar encuesta',
	'AP_RUN_POLL_FOR'						=> 'durante',
	'AP_RUN_POLL_UNTIL'						=> 'hasta',
	'AP_RUN_POLL_INDEFINITELY'				=> 'indefinidamente',
	'AP_POLL_END'							=> 'Fin de la encuesta',
	'AP_POLL_END_EXPLAIN'					=> 'Especifica la fecha y hora de finalización de la encuesta. Si se especifica cualquiera de estos campos, no se tiene en cuenta la duración de la encuesta. Los campos de fecha no especificados toman el valor de la fecha de finalización actual; los campos de hora no especificados toman el valor 0. Si se quiere volver a utilizar la duración, tendrá que borrar el contenido de todos estos campos.',

	'AP_YYYY_MM_DD'							=> 'AAAA-MM-DD',
	'AP_HH_MM'								=> 'HH:MM',
	'AP_POLL_END_INVALID'					=> 'La fecha/hora especificada no es válida',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'El número máximo de votos a una opción no puede ser superior al total de votos a repartir entre las opciones posibles',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'El número máximo de opciones a las que se puede votar no puede ser superior al total de votos a repartir entre las opciones posibles',

	'AP_POLL_MAX_VALUE'						=> 'Votos máximos',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'Este es el número máximo de votos que un votante puede otorgar a una misma opción.',
	'AP_POLL_TOTAL_VALUE'					=> 'Votos totales',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'Este es el número total de votos que un votante puede otorgar, repartidos entre las opciones posibles.',
));
