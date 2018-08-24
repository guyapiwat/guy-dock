<link rel="stylesheet" media="all" type="text/css" href="css/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="css/jquery-ui-timepicker-addon.css" />
<!--script type="text/javascript" src="js/jquery-1.10.2.min.js"></script-->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
<script type="text/javascript">
$(function(){
	$(".time").timepicker({
		timeFormat: "HH:mm",
			hourMin: 0,
	hourMax: 23
	});

	var startDateTextBox = $('.date');
	var endDateTextBox = $('.range_example_4_end');

	$.timepicker.dateRange(
		startDateTextBox,
		endDateTextBox,
		{
			minInterval: (1000*60*60*24*4), // 4 days
			maxInterval: (1000*60*60*24*8), // 8 days
			start: {}, // start picker options
			end: {} // end picker options
		}
	);
});
</script>
 