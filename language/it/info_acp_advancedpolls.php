<?php
/**
 * 
 * Advanced Polls [Italian]
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
	'AP_TITLE_ACP'					=> 'Sondaggi avanzati',
	'AP_SETTINGS_ACP'				=> 'Impostazioni',

	'AP_TITLE'						=> 'Sondaggi avanzati',
	'AP_TITLE_EXPLAIN'				=> 'Estende la funzione base dei sondaggi phpBB con nuove impostazioni come nascondere i voti fino al termine di un sondaggio, mostrare i votanti, limitare il voto e molto altro.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Altre estensioni da Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Impostazioni sondaggi avanzati',

	'AP_ACT_VOTES_HIDE'				=> 'Attiva voti nascosti',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Attiva l\'opzione per nascondere il numero di voti fino al termine del sondaggio.',
	'AP_ACT_VOTERS_SHOW'			=> 'Attiva votanti visibili',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Attiva l\'opzione per mostrare i votanti per ogni risposta del sondaggio.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Attiva limite per votanti',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Attiva l\'opzione per limitare il voto a chi abbia prima risposto al topic.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'Impostazione predefinita per voti nascosti',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Impostazione predefinita per votanti visibili',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Impostazione predefinita per limite per votanti',
));
