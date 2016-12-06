<?php
/**
 *
 * Advanced Polls [Russian]
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @author Translation by edualla (https://github.com/edualla)
 * @author Translation by FomenkoAndrey (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1294503)
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
	'ADVANCEDPOLLS_EXT_NAME'				=> 'Расширенные опросы',

// Viewtopic
	'AP_VOTES_HIDDEN'						=> 'Голосования скрыты',
	'AP_POLL_RUN_TILL_APPEND'				=> ', до этого момента, все голоса будут скрыты.',
	'AP_VOTERS'								=> 'Проголосовали',
	'AP_NONE'								=> 'Нет голосов',

	'AP_POLL_CANT_VOTE'						=> 'Вы не можете голосовать в этом опросе. Причина',
	'AP_POLL_REASON_NOT_POSTED'				=> 'Вы ещё ни одного сообщения не написали в этой теме.',
	'AP_POLL_VOTES_ARE_VISIBLE'				=> 'Обратите внимание, если вы проголосуете, ваш голос будет виден.',
	'AP_POLL_DONT_VOTE_SHOW_RESULTS'		=> 'Не голосовать, только посмотреть результат.',
	'AP_POLL_RESULTS_ARE_ORDERED'			=> 'Обратите внимание, результаты сортируются по мере уменьшения числа полученных голосов.',
	'AP_POLL_TYPE_MISMATCH'					=> 'Несоответствие данных голосования, внутренняя ошибка.',
	'AP_VOTE_CHANGED'						=> 'У вас нет права для изменения результатов голосования.',
	'AP_TOO_MANY_VOTES'						=> 'Вы пытались установить слишком много голосов.',

	'AP_MAX_VOTES_SELECT'					=> array(
		1	=> 'Вы можете выбрать до <strong>%2$d</strong> результатов из <strong>%1$d</strong> варианта',
		2	=> 'Вы можете выбрать до <strong>%2$d</strong> среди <strong>%1$d</strong> вариантов',
	),
	'AP_GUEST_VOTES'						=> array(
		1	=> '%d голос от гостя',
		2	=> '%d голоса от гостей',
		3	=> '%d голосов от гостей',
	),

// Posting
	'AP_POLL_VOTES_HIDE'					=> 'Скрыть голосования',
	'AP_POLL_VOTES_HIDE_EXPLAIN'			=> 'Если эта опция включена, голосования будут скрыты до тех пор, пока опрос не будет окончен<br />Эта опция работает только тогда, если в этом голосовании установлена дата окончания опроса.',
	'AP_POLL_VOTERS_SHOW'					=> 'Показать список проголосовавших',
	'AP_POLL_VOTERS_SHOW_EXPLAIN'			=> 'Если эта опция включена, пользователи, которые проголосовали, будут отображаться для всех с соответствующими настройками прав.<br />Обратите внимание, что проголосовавшие остаются скрытыми, если выбрано скрытое голосование.',
	'AP_POLL_VOTERS_LIMIT'					=> 'Ограничить голосования',
	'AP_POLL_VOTERS_LIMIT_EXPLAIN'			=> 'Если эта опция включена, голосовать смогут только те пользователи, которые уже ответили в этой теме.',
	'AP_POLL_SHOW_ORDERED'					=> 'Порядок результатов голосования',
	'AP_POLL_SHOW_ORDERED_EXPLAIN'			=> 'Результаты голосования отображаются в порядке убывания количества полученных голосов (наибольшее количество голосов вначале).<br />В противном случае результаты опроса отображаются в порядке их создания.',
	'AP_RUN_POLL'							=> 'Продолжать опрос',
	'AP_RUN_POLL_FOR'						=> 'в течение',
	'AP_RUN_POLL_UNTIL'						=> 'до даты',
	'AP_RUN_POLL_INDEFINITELY'				=> 'бесконечно',
	'AP_POLL_END'							=> 'Окончание голосования',
	'AP_POLL_END_EXPLAIN'					=> 'Укажите дату и время окончания голосования. Если любое из этих полей заполнено, длительность опроса в днях будет переопределена указанными значениями. По умолчанию поля даты пустые, но при указании длительности опроса, они автоматически заполняются датой его окончания; поля времени, также пустые по умолчанию, при этом устанавливаются в 0. Если вы хотите изменить длительность опрос, используя количество дней, вам следует очистить поля даты и времени окончания голосования, затем указать длительность опроса в днях.',

	'AP_YYYY_MM_DD'							=> 'ГГГГ-ММ-ДД',
	'AP_HH_MM'								=> 'ЧЧ:ММ',
	'AP_POLL_END_INVALID'					=> 'Дата/Время указаны некорректно',
	'AP_POLL_TOTAL_LOWER_MAX_VOTES'			=> 'Максимум голосов на один вариант не может быть больше, чем общая сумма голосов, которые распределяются между всеми вариантами',
	'AP_POLL_TOTAL_LOWER_MAX_OPTS'			=> 'Максимум вариантов за которые можно проголосовать не можеть быть больше, чем общая сумма голосов, которые распределяются между всеми вариантами',

	'AP_POLL_MAX_VALUE'						=> 'Максимум голосов',
	'AP_POLL_MAX_VALUE_EXPLAIN'				=> 'Ограничение максимального количества голосов для одного варианта ответа.',
	'AP_POLL_TOTAL_VALUE'					=> 'Всего голосов',
	'AP_POLL_TOTAL_VALUE_EXPLAIN'			=> 'Ограничение общего количества голосов для всех вариантов опроса.',
));
