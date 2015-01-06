<?php
/**
 * 
 * Advanced Polls [French]
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
	'AP_TITLE_ACP'					=> 'Advanced Polls',
	'AP_SETTINGS_ACP'				=> 'Paramètres',

	'AP_TITLE'						=> 'Advanced Polls',
	'AP_TITLE_EXPLAIN'				=> 'Advances the core poll system of phpBB with new features like hiding votes till end, showing poll voters, limiting the votes and more.',
	'AP_COPYRIGHT'					=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">More extensions of Wolfsblvt</a>]',

	'AP_SETTINGS'					=> 'Paramètres Advanced Polls ',

	'AP_ACT_VOTES_HIDE'				=> 'Activer le masquage des votes',
	'AP_ACT_VOTES_HIDE_EXPLAIN'		=> 'Active l\'option permettant de masquer les votes jusqu\'à ce que le sondage se termine.',
	'AP_ACT_VOTERS_SHOW'			=> 'Activer l\'affichage du nom des votants',
	'AP_ACT_VOTERS_SHOW_EXPLAIN'	=> 'Active l\'option permettant d\'afficher le nom des votants pour chaque option (choix) du sondage.',
	'AP_ACT_VOTERS_LIMIT'			=> 'Activer la limitation de possibilité de vote',
	'AP_ACT_VOTERS_LIMIT_EXPLAIN'	=> 'Active l\'option permettant de limiter la possibilité de voter uniquement aux utilisateurs ayants participé au moins une fois au sujet.',

	'AP_DEFAULT_VOTES_HIDE'			=> 'Paramètre par défaut pour le masquage des votes',
	'AP_DEFAULT_VOTERS_SHOW'		=> 'Paramètre par défaut pour l\'affichage du nom des votants',
	'AP_DEFAULT_VOTERS_LIMIT'		=> 'Paramètre par défaut pour la limitation de possibilité de vote',
));
