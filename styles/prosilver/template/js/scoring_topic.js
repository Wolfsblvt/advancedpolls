/**
 *
 * Advanced Polls - Scoring Polls
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

$(document).ready(function () {
	var $poll = $('.topic_poll');

	$poll.find('[data-poll-option-id]').each(function () {
		var $this = $(this);
		var optionId = $this.attr('data-poll-option-id');
		var $container = $poll.find('#poll_option_hidden_container_' + optionId);
		$this.find('dd.poll_option_select').remove();
		$this.children(':first-child').after($container.contents());
		$container.remove();
	});
});
