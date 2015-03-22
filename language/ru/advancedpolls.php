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
//6
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Расширенные опросы',

	'AP_VOTES_HIDDEN'						=> 'Голосования скрыты',
	'AP_POLL_RUN_TILL_APPEND'				=> ' До этого момента, все голоса будут скрыты',
	'AP_VOTERS'								=> 'Пользователи, которые проголосовали',
	'AP_NONE'								=> 'Отсутствует',

	'AP_POLL_CANT_VOTE'						=> 'Вы не можете голосовать в этом опросе. Причина',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Вы ещё ни одного сообщения не написали в этой теме',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Обратите внимание, если вы проголосуете, ваш голос будет виден',

	'AP_POLL_VOTES_HIDE'					=> 'Скрыть голосования',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Если эта опция включена, голосования будут скрыты до тех пор, пока опрос не будет окончен<br />Эта опция работает только тогда, если в этом голосовании установлена дата окончания опроса',
	'AP_POLL_VOTERS_SHOW'					=> 'Показать список пользователей, которые проголосовали',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Если эта опция включена, пользователи, которые проголосовали, будут отображаться для всех с соответствующими правами в опциях<br />Обратите внимание, что это остаётся скрытым, если голосования должны быть скрыты',
	'AP_POLL_VOTERS_LIMIT'					=> 'Ограничить голосования',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Если эта опция включена, только те пользователи смогут голосовать, которые уже ответили в этой теме',
));
