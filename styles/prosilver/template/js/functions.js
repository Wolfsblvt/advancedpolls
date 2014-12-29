/**
 * 
 * Advanced Polls
 * 
 * @copyright (c) 2014 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

// namespacing
$.wolfsblvt = $.extend({}, $.wolfsblvt, {

	/// <field name="cookie_advancedsearchbox_name" type="string">The Cookie Name for advanced searchbox pin setting.</field>
	advancedpoll_json_data: wolfsblvt_ap_json_data,

	override_callback_advancedpolls_vote_poll_hidden: function (res) {
		/// <summary>
		///     Overrides the ajax callback function for poll votes
		/// </summary>
		/// <param name="res" type="object">(object) The results of the poll.</param>

		if (typeof res.success !== 'undefined') {
			var poll = $('.topic_poll');
			var panel = poll.find('.panel');
			var resultsVisible = poll.find('dl:first-child .resultbar').is(':visible');
			var mostVotes = 0;

			// Set min-height to prevent the page from jumping when the content changes
			var updatePanelHeight = function (height) {
				var height = (typeof height === 'undefined') ? panel.find('.inner').outerHeight() : height;
				panel.css('min-height', height);
			};
			updatePanelHeight();

			// Remove the View results link
			if (!resultsVisible) {
				poll.find('.poll_view_results').hide(500);
			}

			if (!res.can_vote) {
				poll.find('.polls, .poll_max_votes, .poll_vote, .poll_option_select').fadeOut(500, function () {
					poll.find('.resultbar, .poll_option_percent, .poll_total_votes').show();
				});
			} else {
				// If the user can still vote, simply slide down the results
				poll.find('.resultbar, .poll_option_percent, .poll_total_votes').show(500);
			}

			// Get the votes count of the highest poll option
			// no

			// Update the total votes count
			poll.find('.poll_total_vote_cnt').html(res.total_votes);

			// Update each option
			poll.find('[data-poll-option-id]').each(function () {
				var $this = $(this);
				var optionId = $this.attr('data-poll-option-id');
				var voted = (typeof res.user_votes[optionId] !== 'undefined');

				$this.toggleClass('voted', voted);
			});

			if (!res.can_vote) {
				poll.find('.polls').delay(400).fadeIn(500);
			}

			// Display "Your vote has been cast." message. Disappears after 5 seconds.
			var confirmationDelay = (res.can_vote) ? 300 : 900;
			poll.find('.vote-submitted').delay(confirmationDelay).slideDown(200, function () {
				if (resultsVisible) {
					updatePanelHeight();
				}

				$(this).delay(5000).fadeOut(500, function () {
					resizePanel(300);
				});
			});

			// Remove the gap resulting from removing options
			setTimeout(function () {
				resizePanel(500);
			}, 1500);

			var resizePanel = function (time) {
				var panelHeight = panel.height();
				var innerHeight = panel.find('.inner').outerHeight();

				if (panelHeight != innerHeight) {
					panel.css({ 'min-height': '', 'height': panelHeight })
						.animate({ height: innerHeight }, time, function () {
							panel.css({ 'min-height': innerHeight, 'height': '' });
						});
				}
			};
		}
	},
	extend_callback_advancedpolls_vote_poll_show_voters: function (res) {
		/// <summary>
		///     Extends the ajax callback function to show poll voters
		/// </summary>
		/// <param name="res" type="object">(object) The results of the poll.</param>

		if (typeof res.success !== 'undefined') {
			var poll = $('.topic_poll');

			console.log("running the extended callback code");

			// Update each option
			poll.find('[data-poll-option-id]').each(function () {
				var $this = $(this);
				var $votersbox_voters = $this.next(".poll_voters_box").find(".poll_voters");
				var optionId = $this.attr('data-poll-option-id');
				var voted = (typeof res.user_votes[optionId] !== 'undefined');

				var spanname = 'name="' + $.wolfsblvt.advancedpoll_json_data.username_clean + '"';

				if (voted) {
					if ($votersbox_voters.children("span[" + spanname + "]").length == 0) {
						if (res.vote_counts[optionId] > 1) {
							// If there are mor voters than just the current user, add seperator after last element
							$votersbox_voters.children(":last-child").append($.wolfsblvt.advancedpoll_json_data.l_seperator);
						}
						else {
							// Remove the "No voters" notice
							$votersbox_voters.children('span[name="none"]').hide(500, function () { $(this).remove(); });
						}
						var $new_voter = $("<span " + spanname + ">" + $.wolfsblvt.advancedpoll_json_data.username_string + "</span>").hide();
						$new_voter.appendTo($votersbox_voters).show(500);
					}
				}
				else {
					$voter_user = $votersbox_voters.children("span[" + spanname + "]");
					if ($voter_user.length > 0) {
						var callback = function () {
							$(this).remove();
							if ($voter_user.is(":last-child") && res.vote_counts[optionId] > 0) {
								var last = $votersbox_voters.children(":last-child");
								last.html(last.html().replace(new RegExp($.wolfsblvt.advancedpoll_json_data.l_seperator + "$"), ""));
							}
							else {
								var $none_voter = $('<span name="none">' + $.wolfsblvt.advancedpoll_json_data.l_none + "</span>").hide();
								$none_voter.appendTo($votersbox_voters).show(500);
							}
						};
						$votersbox_voters.children("span[" + spanname + "]").hide(500, callback);
					}
				}
			});
		}
	},
});