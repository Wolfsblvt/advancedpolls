<?php
/**
 * 
 * Advanced Polls [Russia]
 * 
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by edualla (https://github.com/edualla)
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
	'AP_TITLE_ACP'					=> 'Расширенные опросы',
	'AP_SETTINGS_ACP'				=> 'Настройки',

	'AP_TITLE'						=> 'Расширенные опросы',
	'AP_TITLE_EXPLAIN'				=> 'Расширяет систему опросов PHPBB с новыми функциями, такими как не скрытие голосований до конца опроса, просмотр пользователей, которые проголосовали, ограничение голосования и мн. др.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Больше расширений  Wolfsblvt</a>]',
	
	'AP_SETTINGS'					=> 'Настройки расширенных опросов',

	'AP_ACT_VOTES_HIDE'				=> 'Включить скрытие голосований',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Включает опцию для выбора, чтобы голосования до конца опроса будут скрыты',
	'AP_ACT_VOTERS_SHOW'			=> 'Включить просмотр пользователей, которые проголосовали',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Включает опцию для выбора, чтобы пользователи, которые проголосовали, отображались для каждой опции голосования',
	'AP_ACT_VOTERS_LIMIT'			=> 'Включить ограничение голосования',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Включает опцию для выбора, чтобы только те пользователи могли голосовать, которые уже ответили в этой теме',

	'AP_DEFAULT_VOTES_HIDE'			=> 'По умолчанию выбрано значение для "Скрытие голосований"',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'По умолчанию выбрано значение для «Просмотр пользователей, которые проголосовали"',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'По умолчанию выбрано значение для "Ограничение голосования"',
));
