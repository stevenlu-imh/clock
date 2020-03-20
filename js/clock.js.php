<?php
header("Content-type: application/javascript");
?>
var tz = null;
$.noConflict();
jQuery(document).ready(function($) {
	$('#stop-alarm').hide();
	var intVal, myclock;

	$(window).resize(function(){
		window.location.reload()
	});

	var audioElement = new Audio("");

	//clock plugin constructor
	$('#myclock').thooClock({
		alarmHandColor: '#061925',
		alarmHandTipColor: '#FF8E0D',
		onAlarm:function(){
			document.body.appendChild(audioElement);
			var canPlayType = audioElement.canPlayType("audio/ogg");
			if(canPlayType.match(/maybe|probably/i)) {
				audioElement.src = 'media/alarm1.ogg';
			} else {
				audioElement.src = 'media/alarm1.mp3';
			}
			audioElement.addEventListener('canplay', function() {
				audioElement.loop = true;
				audioElement.play();
			}, false);
			$('#stop-alarm').show();
		},
		offAlarm:function(){
			audioElement.pause();
			clearTimeout(intVal);
			$('#stop-alarm').hide();
		},
		size:$('#myclock').width(),
		dialColor: '#094079',
		dialBackgroundColor: 'transparent',
		minuteHandColor: '#061925',
		hourHandColor: '#061925',
		sweepingMinutes:true,
		sweepingSeconds:true,
		secondHandColor:'red',
		brandText: getAMPM(),
		showNumerals:true
	});
	
	if(tz == null) {
		tz = getTZ();
	}
	$('#time-zone').append(tz);
	
	$('#timepicker').mdtimepicker();
	$('#stop-alarm').click(function(){
		audioElement.pause();
		clearTimeout(intVal);
		$('#stop-alarm').hide();
	});
	$('#alarm-toggle').change(function(){
		if($('#timepicker').val() == null || $('#timepicker').val() == '') {
			alert("Please set a time first");
			$('#alarm-toggle').prop('checked', false);
		} else {
			var alarmTime = '';
			var tarray1 = $('#timepicker').val().split(' ');
			var tarray2 = tarray1[0].split(':');
			if(tarray1[1] == 'PM' && tarray2[0] !== '12') {
				var hr = (parseInt(tarray2[0]) + 12).toString();
				alarmTime = hr+':'+tarray2[1];
			} else {
				alarmTime = tarray1[0];
			}
			if($('#alarm-toggle').is(':checked')) { 
				$.fn.thooClock.setAlarm(alarmTime);
			} else {
				$.fn.thooClock.clearAlarm();
			}
		}
	});
});

function getTZ() {
    var tsummer = new Date(Date.UTC(2005, 6, 30, 0, 0, 0, 0));
    var sumOffset = -1 * tsummer.getTimezoneOffset();
    var timeWinter = new Date(Date.UTC(2005, 12, 30, 0, 0, 0, 0));
    var winOffset = -1 * timeWinter.getTimezoneOffset();
    var theTimeZone;

    if (-720 == sumOffset && -720 == winOffset) { theTimeZone = 'Dateline Standard Time'; }
    else if (-660 == sumOffset && -660 == winOffset) { theTimeZone = 'UTC-11'; }
    else if (-660 == sumOffset && -660 == winOffset) { theTimeZone = 'Samoa Standard Time'; }
    else if (-660 == sumOffset && -600 == winOffset) { theTimeZone = 'Hawaiian Standard Time'; }
    else if (-570 == sumOffset && -570 == winOffset) { theTimeZone.value = 'Pacific/Marquesas'; }
    else if (-480 == sumOffset && -540 == winOffset) { theTimeZone = 'Alaskan Standard Time'; }
    else if (-420 == sumOffset && -480 == winOffset) { theTimeZone = 'Pacific Standard Time'; }
    else if (-420 == sumOffset && -420 == winOffset) { theTimeZone = 'US Mountain Standard Time'; }
    else if (-360 == sumOffset && -420 == winOffset) { theTimeZone = 'Mountain Standard Time'; }
    else if (-360 == sumOffset && -360 == winOffset) { theTimeZone = 'Central America Standard Time'; }
    else if (-300 == sumOffset && -360 == winOffset) { theTimeZone = 'Central Standard Time'; }
    else if (-300 == sumOffset && -300 == winOffset) { theTimeZone = 'SA Pacific Standard Time'; }
    else if (-240 == sumOffset && -300 == winOffset) { theTimeZone = 'Eastern Standard Time'; }
    else if (-270 == sumOffset && -270 == winOffset) { theTimeZone = 'Venezuela Standard Time'; }
    else if (-240 == sumOffset && -240 == winOffset) { theTimeZone = 'SA Western Standard Time'; }
    else if (-240 == sumOffset && -180 == winOffset) { theTimeZone = 'Central Brazilian Standard Time'; }
    else if (-180 == sumOffset && -240 == winOffset) { theTimeZone = 'Atlantic Standard Time'; }
    else if (-180 == sumOffset && -180 == winOffset) { theTimeZone = 'Montevideo Standard Time'; }
    else if (-180 == sumOffset && -120 == winOffset) { theTimeZone = 'E. South America Standard Time'; }
    else if (-150 == sumOffset && -210 == winOffset) { theTimeZone = 'Mid-Atlantic Standard Time'; }
    else if (-120 == sumOffset && -180 == winOffset) { theTimeZone = 'America/Godthab'; }
    else if (-120 == sumOffset && -120 == winOffset) { theTimeZone = 'SA Eastern Standard Time'; }
    else if (-60 == sumOffset && -60 == winOffset) { theTimeZone = 'Cape Verde Standard Time'; }
    else if (0 == sumOffset && -60 == winOffset) { theTimeZone = 'Azores Daylight Time'; }
    else if (0 == sumOffset && 0 == winOffset) { theTimeZone = 'Morocco Standard Time'; }
    else if (60 == sumOffset && 0 == winOffset) { theTimeZone = 'GMT Standard Time'; }
    else if (60 == sumOffset && 60 == winOffset) { theTimeZone = 'Africa/Algiers'; }
    else if (60 == sumOffset && 120 == winOffset) { theTimeZone = 'Namibia Standard Time'; }
    else if (120 == sumOffset && 60 == winOffset) { theTimeZone = 'Central European Standard Time'; }
    else if (120 == sumOffset && 120 == winOffset) { theTimeZone = 'South Africa Standard Time'; }
    else if (180 == sumOffset && 120 == winOffset) { theTimeZone = 'GTB Standard Time'; }
    else if (180 == sumOffset && 180 == winOffset) { theTimeZone = 'E. Africa Standard Time'; }
    else if (240 == sumOffset && 180 == winOffset) { theTimeZone = 'Russian Standard Time'; }
    else if (240 == sumOffset && 240 == winOffset) { theTimeZone = 'Arabian Standard Time'; }
    else if (270 == sumOffset && 210 == winOffset) { theTimeZone = 'Iran Standard Time'; }
    else if (270 == sumOffset && 270 == winOffset) { theTimeZone = 'Afghanistan Standard Time'; }
    else if (300 == sumOffset && 240 == winOffset) { theTimeZone = 'Pakistan Standard Time'; }
    else if (300 == sumOffset && 300 == winOffset) { theTimeZone = 'West Asia Standard Time'; }
    else if (330 == sumOffset && 330 == winOffset) { theTimeZone = 'India Standard Time'; }
    else if (345 == sumOffset && 345 == winOffset) { theTimeZone = 'Nepal Standard Time'; }
    else if (360 == sumOffset && 300 == winOffset) { theTimeZone = 'N. Central Asia Standard Time'; }
    else if (360 == sumOffset && 360 == winOffset) { theTimeZone = 'Central Asia Standard Time'; }
    else if (390 == sumOffset && 390 == winOffset) { theTimeZone = 'Myanmar Standard Time'; }
    else if (420 == sumOffset && 360 == winOffset) { theTimeZone = 'North Asia Standard Time'; }
    else if (420 == sumOffset && 420 == winOffset) { theTimeZone = 'SE Asia Standard Time'; }
    else if (480 == sumOffset && 420 == winOffset) { theTimeZone = 'North Asia East Standard Time'; }
    else if (480 == sumOffset && 480 == winOffset) { theTimeZone = 'China Standard Time'; }
    else if (540 == sumOffset && 480 == winOffset) { theTimeZone = 'Yakutsk Standard Time'; }
    else if (540 == sumOffset && 540 == winOffset) { theTimeZone = 'Tokyo Standard Time'; }
    else if (570 == sumOffset && 570 == winOffset) { theTimeZone = 'Cen. Australia Standard Time'; }
    else if (570 == sumOffset && 630 == winOffset) { theTimeZone = 'Australia/Adelaide'; }
    else if (600 == sumOffset && 540 == winOffset) { theTimeZone = 'Asia/Yakutsk'; }
    else if (600 == sumOffset && 600 == winOffset) { theTimeZone = 'E. Australia Standard Time'; }
    else if (600 == sumOffset && 660 == winOffset) { theTimeZone = 'AUS Eastern Standard Time'; }
    else if (630 == sumOffset && 660 == winOffset) { theTimeZone = 'Australia/Lord_Howe'; }
    else if (660 == sumOffset && 600 == winOffset) { theTimeZone = 'Tasmania Standard Time'; }
    else if (660 == sumOffset && 660 == winOffset) { theTimeZone = 'West Pacific Standard Time'; }
    else if (690 == sumOffset && 690 == winOffset) { theTimeZone = 'Central Pacific Standard Time'; }
    else if (720 == sumOffset && 660 == winOffset) { theTimeZone = 'Magadan Standard Time'; }
    else if (720 == sumOffset && 720 == winOffset) { theTimeZone = 'Fiji Standard Time'; }
    else if (720 == sumOffset && 780 == winOffset) { theTimeZone = 'New Zealand Standard Time'; }
    else if (765 == sumOffset && 825 == winOffset) { theTimeZone = 'Pacific/Chatham'; }
    else if (780 == sumOffset && 780 == winOffset) { theTimeZone = 'Tonga Standard Time'; }
    else if (840 == sumOffset && 840 == winOffset) { theTimeZone = 'Pacific/Kiritimati'; }
    else { theTimeZone = 'US/Pacific'; }
    return theTimeZone;
}
function getAMPM() {
	var hrs = new Date().getHours();
    var hrs = (hrs+24-2)%24; 
    var ampm ='am';
    if(hrs==0){
    hrs=12;
    }
    else if(hrs>12)
    {
    hrs=hrs%12;
    ampm='pm';
    }
	return ampm.toUpperCase();
}