/**
 *
 * Advanced Polls - Poll Length Posting aids
 *
 * @copyright (c) 2015 javiexin ( www.exincastillos.es )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Javier Lopez (javiexin)
 */

var ap_poll_start_initial = new Date();
var ap_poll_start  = new Date();
var ap_poll_end    = new Date();
var ap_poll_length = 0; // seconds
var ap_poll_length_scale = 24; // days by default

ap_init_poll_length();

function ap_init_poll_length()
{
	var year = document.getElementById('wolfsblvt_poll_end_year').value;
	if (year != "") ap_poll_end.setFullYear(year);
	var mon = document.getElementById('wolfsblvt_poll_end_mon').value;
	if (mon != "") ap_poll_end.setMonth(mon - 1);
	var mday = document.getElementById('wolfsblvt_poll_end_mday').value;
	if (mday != "") ap_poll_end.setDate(mday);
	var hours = document.getElementById('wolfsblvt_poll_end_hours').value;
	if (hours != "") ap_poll_end.setHours(hours);
	var minutes = document.getElementById('wolfsblvt_poll_end_minutes').value;
	if (minutes != "") ap_poll_end.setMinutes(minutes);
	var length = document.getElementById('poll_length').value;
	if (length > 0) ap_poll_length = length * ap_poll_length_scale * 3600;
	ap_poll_start.setTime(ap_poll_end.getTime() - ap_poll_length * 1000);
	ap_poll_start_initial = ap_poll_start;
	var duration = (length > 0) ? 1 : 0;
	document.getElementById('wolfsblvt_poll_duration').selectedIndex = duration;
	ap_change_duration(document.getElementById('wolfsblvt_poll_duration').value);
}

function ap_change_duration(val)
{
	ap_update_poll_end(val != '');
	document.getElementById('wolfsblvt_poll_length').style.display='none';
	document.getElementById('wolfsblvt_poll_end').style.display='none';
	if (val != '')
	{
		document.getElementById(val).style.display='inline-block';
	}
}

function ap_adjust_length_scale(new_scale)
{
	ap_poll_length_scale = new_scale;
	ap_update_poll_end(true);
}

function adjust_length(val)
{
	ap_poll_length = val * ap_poll_length_scale * 3600;
	ap_poll_end.setTime(ap_poll_start.getTime() + ap_poll_length * 1000);
	ap_update_poll_end(true);
}

function ap_adjust_end(what, val)
{
	if (what == "year")
	{
		ap_poll_end.setFullYear(val);
	}
	else if (what == "mon")
	{
		ap_poll_end.setMonth(val - 1);
	}
	else if (what == "mday")
	{
		ap_poll_end.setDate(val);
	}
	else if (what == "hours")
	{
		ap_poll_end.setHours(val);
	}
	else if (what == "minutes")
	{
		ap_poll_end.setMinutes(val);
	}
	ap_update_poll_end(true);
}

function ap_update_poll_end(fill)
{
	var poll_length_value =  Math.ceil((ap_poll_end.getTime() - ap_poll_start_initial.getTime()) / 1000 / 3600 / ap_poll_length_scale);
	ap_poll_length = poll_length_value * ap_poll_length_scale * 3600;
	ap_poll_start.setTime(ap_poll_end.getTime() - ap_poll_length * 1000);

	if (fill)
	{
		document.getElementById('wolfsblvt_poll_end_label').innerHTML = ap_poll_end.getFullYear() + "/" + (ap_poll_end.getMonth() + 1) + "/" + ap_poll_end.getDate() + "&nbsp;" + ap_poll_end.getHours() + ":" + ap_poll_end.getMinutes();
		document.getElementById('wolfsblvt_poll_end_year').value = ap_poll_end.getFullYear();
		document.getElementById('wolfsblvt_poll_end_mon').value = ap_poll_end.getMonth() + 1;
		document.getElementById('wolfsblvt_poll_end_mday').value = ap_poll_end.getDate();
		document.getElementById('wolfsblvt_poll_end_hours').value = ap_poll_end.getHours();
		document.getElementById('wolfsblvt_poll_end_minutes').value = ap_poll_end.getMinutes();
		document.getElementById('poll_length').value = poll_length_value;
	}
	else
	{
		document.getElementById('wolfsblvt_poll_end_label').innerHTML = "";
		document.getElementById('wolfsblvt_poll_end_year').value = "";
		document.getElementById('wolfsblvt_poll_end_mon').value = "";
		document.getElementById('wolfsblvt_poll_end_mday').value = "";
		document.getElementById('wolfsblvt_poll_end_hours').value = "";
		document.getElementById('wolfsblvt_poll_end_minutes').value = "";
		document.getElementById('poll_length').value = 0;
	}
}
