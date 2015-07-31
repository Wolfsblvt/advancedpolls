/**
 *
 * Advanced Polls - Poll Length Reposition
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

$(document).ready(function () {
	var $poll_length_dl = $('label > #poll_length').closest('dl');
	var $container = $("#ap_poll_length_container");
	var $content = $container.contents();

	$poll_length_dl.prev('dl').remove();
	$poll_length_dl.replaceWith($content);
	$container.remove();
});
