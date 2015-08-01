/**
 *
 * Advanced Polls - Poll Length Posting aids
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

var apPollStartInitial = new Date();
var apPollStart  = new Date();
var apPollEnd    = new Date();
var apPollLength = 0; // seconds
var apPollLengthScale = 24; // days by default

apInitPollLength();

function apInitPollLength()
{
	var year = document.getElementById('wolfsblvt_poll_end_year').value;
	if (year != "") apPollEnd.setFullYear(year);
	var mon = document.getElementById('wolfsblvt_poll_end_mon').value;
	if (mon != "") apPollEnd.setMonth(mon - 1);
	var mday = document.getElementById('wolfsblvt_poll_end_mday').value;
	if (mday != "") apPollEnd.setDate(mday);
	var hours = document.getElementById('wolfsblvt_poll_end_hours').value;
	if (hours != "") apPollEnd.setHours(hours);
	var minutes = document.getElementById('wolfsblvt_poll_end_minutes').value;
	if (minutes != "") apPollEnd.setMinutes(minutes);

	var length = document.getElementById('poll_length').value;
	if (length > 0) apPollLength = length * apPollLengthScale * 3600;

	apPollStart.setTime(apPollEnd.getTime() - apPollLength * 1000);
	apPollStartInitial = apPollStart;

	var duration = (length > 0) ? 1 : 0;
	document.getElementById('wolfsblvt_poll_duration').selectedIndex = duration;
	apChangeDuration(document.getElementById('wolfsblvt_poll_duration').value);
}

function apChangeDuration(val)
{
	apUpdatePollEnd(val != '');
	document.getElementById('wolfsblvt_poll_length').style.display='none';
	document.getElementById('wolfsblvt_poll_end').style.display='none';
	if (val != '') document.getElementById(val).style.display='inline-block';
}

function apAdjustLengthScale(newScale)
{
	apPollLengthScale = newScale;
	apUpdatePollEnd(true);
}

function apAdjustLength(val)
{
	apPollLength = val * apPollLengthScale * 3600;
	apPollEnd.setTime(apPollStart.getTime() + apPollLength * 1000);
	apUpdatePollEnd(true);
}

function apAdjustEnd(what, val)
{
	if (what == "year")	{
		apPollEnd.setFullYear(val);
	} else if (what == "mon") {
		apPollEnd.setMonth(val - 1);
	} else if (what == "mday") {
		apPollEnd.setDate(val);
	} else if (what == "hours") {
		apPollEnd.setHours(val);
	} else if (what == "minutes") {
		apPollEnd.setMinutes(val);
	}
	apUpdatePollEnd(true);
}

function apUpdatePollEnd(fill)
{
	var pollLengthValue =  Math.ceil((apPollEnd.getTime() - apPollStartInitial.getTime()) / 1000 / 3600 / apPollLengthScale);
	apPollLength = pollLengthValue * apPollLengthScale * 3600;
	apPollStart.setTime(apPollEnd.getTime() - apPollLength * 1000);

	if (fill) {
		document.getElementById('wolfsblvt_poll_end_label').innerHTML = apPollEnd.getFullYear() + "/" + (apPollEnd.getMonth() + 1) + "/" + apPollEnd.getDate() + "&nbsp;" + apPollEnd.getHours() + ":" + apPollEnd.getMinutes();
		document.getElementById('wolfsblvt_poll_end_year').value = apPollEnd.getFullYear();
		document.getElementById('wolfsblvt_poll_end_mon').value = apPollEnd.getMonth() + 1;
		document.getElementById('wolfsblvt_poll_end_mday').value = apPollEnd.getDate();
		document.getElementById('wolfsblvt_poll_end_hours').value = apPollEnd.getHours();
		document.getElementById('wolfsblvt_poll_end_minutes').value = apPollEnd.getMinutes();
		document.getElementById('poll_length').value = pollLengthValue;
	} else {
		document.getElementById('wolfsblvt_poll_end_label').innerHTML = "";
		document.getElementById('wolfsblvt_poll_end_year').value = "";
		document.getElementById('wolfsblvt_poll_end_mon').value = "";
		document.getElementById('wolfsblvt_poll_end_mday').value = "";
		document.getElementById('wolfsblvt_poll_end_hours').value = "";
		document.getElementById('wolfsblvt_poll_end_minutes').value = "";
		document.getElementById('poll_length').value = 0;
	}
}
