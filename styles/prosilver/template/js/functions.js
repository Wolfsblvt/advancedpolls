/**
 *
 * Advanced Polls
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

// namespacing
$.wolfsblvt = $.extend({}, $.wolfsblvt, {

	/// <field name="cookie_advancedsearchbox_name" type="string">The Cookie Name for advanced searchbox pin setting.</field>
	advancedpoll_json_data: wolfsblvt_ap_json_data,

	override_callback_advancedpolls_vote_poll_hidden: function (res) {
		/// <summary>
		///		Overrides the ajax callback function for poll votes
		/// </summary>
		/// <param name="res" type="object">(object) The results of the poll.</param>

		if (typeof res.success !== 'undefined') {
			var poll = $('.topic_poll');
			var panel = poll.find('.panel');
			var resultsVisible = poll.find('dl:first-child .resultbar').is(':visible');

			// Define functions we need inside of that function here
			var updatePanelHeight = function (height) {
				height = (typeof height === 'undefined') ? panel.find('.inner').outerHeight() : height;
				panel.css('min-height', height);
			};
			var resizePanel = function (time) {
				var panelHeight = panel.height();
				var innerHeight = panel.find('.inner').outerHeight();

				if (panelHeight !== innerHeight) {
					panel.css({ 'min-height': '', 'height': panelHeight })
						.animate({ height: innerHeight }, time, function () {
							panel.css({ 'min-height': innerHeight, 'height': '' });
						});
				}
			};

			// Set min-height to prevent the page from jumping when the content changes
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
			poll.find('.poll_total_vote_cnt').html("??");

			// Update each option
			poll.find('[data-poll-option-id]').each(function () {
				var $this = $(this);
				var optionId = $this.attr('data-poll-option-id');
				var voted = (typeof res.user_votes[optionId] !== 'undefined');
				var altText;

				altText = $this.attr('data-alt-text');
				if (voted) {
					$this.attr('title', $.trim(altText));
				} else {
					$this.attr('title', '');
				};

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
		}
	},
	extend_callback_advancedpolls_vote_poll_show_voters: function (res) {
		/// <summary>
		///		Extends the ajax callback function to show poll voters
		/// </summary>
		/// <param name="res" type="object">(object) The results of the poll.</param>

		if (typeof res.success !== 'undefined') {
			var poll = $('.topic_poll');
			var scoring = (typeof res.scoring !== 'undefined');
			var spanname = 'name="' + $.wolfsblvt.advancedpoll_json_data.username_clean + '"';
			var spanval_begin = "<span " + spanname + ">" + $.wolfsblvt.advancedpoll_json_data.username_string;
			var spanval_end = "</span>";

			console.log("running the extended callback code");

			// Update each option
			poll.find('[data-poll-option-id]').each(function () {
				var $this = $(this);
				var $votersbox_voters = $this.next(".poll_voters_box").find(".poll_voters");
				var optionId = $this.attr('data-poll-option-id');
				var voted = (typeof res.user_votes[optionId] !== 'undefined');
				var spanval = spanval_begin + ((scoring) ? "(" + res.user_vote_counts[optionId] + ")" : "") + spanval_end;

				var $voter_user = $votersbox_voters.children("span[" + spanname + "]");

				if (voted) {
					if ($voter_user.length === 0) {
						if (res.vote_counts[optionId] > ((scoring) ? res.user_vote_counts[optionId] : 1)) {
							// If there are more voters than just the current user, add seperator after last element
							$votersbox_voters.children(":last-child").after($.wolfsblvt.advancedpoll_json_data.l_seperator);
						}
						else {
							// Remove the "No voters" notice
							$votersbox_voters.children('span[name="none"]').hide(500, function () { $(this).remove(); });
						}
						$(spanval).hide().appendTo($votersbox_voters).show(500);
					}
					else {
						if (scoring) {
							$(spanval).hide().replaceAll($voter_user).show(500);
						}
					}
				}
				else {
					if ($voter_user.length > 0) {
						var callback = function () {
							if (res.vote_counts[optionId] > 0) {
								if (this.nextSibling !== null) {
									this.nextSibling.remove();
								}
								else {
									if (this.previousSibling !== null) {
										this.previousSibling.remove();
									}
								}
							}
							else {
								var $none_voter = $('<span name="none">' + $.wolfsblvt.advancedpoll_json_data.l_none + "</span>").hide();
								$none_voter.appendTo($votersbox_voters).show(500);
							}
							$(this).remove();
						};
						$voter_user.hide(500, callback);
					}
				}
			});
		}
	},
});