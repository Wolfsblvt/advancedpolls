<?php
/**
 *
 * Advanced Polls [Spanish]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by Raul [ThE KuKa] (https://github.com/phpbb-es)
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
	'AP_SETTINGS_ACP'				=> 'Configuración',

	'AP_TITLE'						=> 'Encuestas Avanzadas',
	'AP_TITLE_EXPLAIN'				=> 'Mejora el sistema de encuestas nativo de phpBB con nuevas posibilidades como ocultar votos hasta el final, mostrar los votantes de la encuesta, limitar los posibles votantes y más.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Más Extensiones de Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Configuración de Encuestas Avanzadas',
	'AP_GLOBAL_SETTINGS'			=> 'Configuración Global de Encuestas Avanzadas (aplicables a todas las encuestas)',
	'AP_PER_POLL_SETTINGS'			=> 'Configuración Por Encuesta de Encuestas Avanzadas (seleccionables por encuesta, con los valores por defecto indicados aquí)',

	'AP_ACT_VOTES_HIDE'				=> 'Activar votos ocultos',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Activa la opción de que los votos de la encuesta estén ocultos hasta que termine la encuesta.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activar mostrar votantes',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Activa la opción de que se muestren los votantes de cada opción de la encuesta.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activar limitar votos',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Activa la opción de limitar los votantes para una encuesta a los usuarios que ya han escrito en ese tema.',
	'AP_ACT_POLL_NO_VOTE'			=> 'Activar no votar',
	'AP_ACT_POLL_NO_VOTE_EXPLAIN'	=> 'Cambia el enlace "Mostrar resultados" por un enlace "No quiero votar", que no permite votar después de ver los resultados a menos que "Cambiar el voto" esté seleccionado.',
	'AP_ACT_SHOW_ORDERED'			=> 'Activar ordenación',
	'AP_ACT_SHOW_ORDERED_EXPLAIN'	=> 'Activa la opción de mostrar los resultados por orden descendente de votos recibidos (el más votado primero).',
	'AP_ACT_POLL_SCORING'			=> 'Activar encuestas puntuables',
	'AP_ACT_POLL_SCORING_EXPLAIN'	=> 'Activa la posibilidad de asignar diferentes puntuaciones a las opciones de la encuesta.',
	'AP_ACT_INCREMENTAL_VOTES'		=> 'Activar voto incremental',
	'AP_ACT_INCREMENTAL_VOTES_EXPLAIN'	=> 'Activa la posibilidad de votar incrementalmente, mientras no se hayan emitido todos los votos disponibles.',
	'AP_ACT_CLOSED_VOTING'			=> 'Activar voto en temas cerrados',
	'AP_ACT_CLOSED_VOTING_EXPLAIN'	=> 'Activa la posibilidad de votar en encuestas abiertas incluse cuando el tema correspondiente está cerrado.',
	'AP_ACT_POLL_END'				=> 'Activar final de encuesta',
	'AP_ACT_POLL_END_EXPLAIN'		=> 'Permite especificar cuando termina una encuesta en fecha y hora, en lugar de especificar tan solo una duración a partir del inicio de la encuesta.',
	'AP_ACT_POLL_NOTIFICATIONS'				=> 'Activar notificaciones de encuestas',
	'AP_ACT_POLL_NOTIFICATIONS_EXPLAIN'		=> 'Activa el envío de notificaciones a todos los votantes en encuestas ocultas cuando la encuenta ha finalizado, y por tanto los resultados son visibles.',

	'AP_DEFAULT_VOTES_CHANGE'		=> 'Valor por defecto para cambiar el voto',
	'AP_DEFAULT_VOTES_HIDE'			=> 'Valor por defecto para votos ocultos',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Valor por defecto para mostrar votantes',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Valor por defecto para limitar votos',
	'AP_DEFAULT_SHOW_ORDERED'		=> 'Valor por defecto para ordenación',
));
