/**
 * 
 * Advanced Polls
 * 
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

$(document).ready(function () {
	// If the event does not exist, we have problems.
	// So the html for the poll options is added hidden in the footer and we need to move it now.

	var $container = $("#ap_poll_hidden_container");

	if ($container.length > 0) {
		var $content = $container.children("tbody").contents();

		var $option_ontop = $('[name="poll_length"]').parent().parent();

		// append it to the options panel
		$content.insertAfter($option_ontop);
	}
});