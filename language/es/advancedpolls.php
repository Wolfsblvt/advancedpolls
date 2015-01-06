<?php
/**
 * 
 * Advanced Polls [Spanish]
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Encuestas Avanzadas',

	'AP_VOTES_HIDDEN'						=> 'Votos ocultos',
	'AP_POLL_RUN_TILL_APPEND'				=> ', hasta entonces todos los votos estarán ocultos.',
	'AP_VOTERS'								=> 'Votantes',
	'AP_NONE'								=> 'Ninguno',

	'AP_POLL_CANT_VOTE'						=> 'Usted no puede votar en esta encuesta. Razón',
	'AP_POLL_REASON_NOT_POSTED'				=> 'No ha escrito en este tema.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Tenga en cuenta que si vota, su voto será visible.',

	'AP_POLL_VOTES_HIDE'					=> 'Ocultar votos',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Si esta habilitado, los votos estarán ocultos hasta que la encuesta termine. Esta opción sólo funciona si la encuesta tiene un final determinado.',
	'AP_POLL_VOTERS_SHOW'					=> 'Mostrar votantes de la encuesta',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Si esta habilitado, los votantes serán mostrados a aquellas personas que tengan el permiso oportuno. Tenga en cuenta que los votantes estarán ocultos si los votos están ocultos.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Limite de votos',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Si esta habilitado, los usuarios habilitados sólo pueden votar si ya han escrito en este tema.',
));
