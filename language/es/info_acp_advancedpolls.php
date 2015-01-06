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
	'AP_TITLE_ACP'					=> 'Encuestas Avanzadas',
	'AP_SETTINGS_ACP'				=> 'Ajustes',

	'AP_TITLE'						=> 'Encuestas Avanzadas',
	'AP_TITLE_EXPLAIN'				=> 'Avances en el core del sistema de encuesta de phpBB con nuevas características como ocultar votos hasta el final, mostrando los votantes de la encuesta, lo que limita los votos y más.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Más Extensiones de Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Ajustes de Encuestas Avanzadas',

	'AP_ACT_VOTES_HIDE'				=> 'Activar votos ocultos',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Activa la opción de que los votos de la encuesta estén ocultos hasta que termine la encuesta.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activar mostrar votantes',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Activa la opción de que los votantes de la encuesta seán mostrados para cada opción de encuesta.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activar limite de votos',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Activa la opción de limitar los votantes para una encuesta a los usuarios que ya han escrito en este tema.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'Seleccionado por defecto para ocultar los votos',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Seleccionado por defecto para mostrar votantes',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Seleccionado por defecto para limitar votos',
));
