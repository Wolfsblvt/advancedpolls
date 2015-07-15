/**
 *
 * Advanced Polls - Poll Length Scale
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

$(document).ready(function () {
	var $poll_length = $('#poll_length');
	var $container = $("#ap_poll_length_scale_container");
	var $content = $container.contents();

	$poll_length.parent().contents().last().replaceWith($content);
	$poll_length.unwrap();
	$container.remove();
});
