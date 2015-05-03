/**
 *
 * Advanced Polls - Scoring Polls
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

$(document).ready(function () {
	var $poll = $('#preview fieldset.polls');
	var $container = $("#ap_poll_preview_hidden_container");
	var $content = $container.contents();

	$poll.children().remove();
	$poll.append($content);
	$container.remove();
});
