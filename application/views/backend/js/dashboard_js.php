<script src="<?php echo base_url() ."assets/plugins/flot/jquery.flot.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/flot/jquery.flot.resize.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/jquery.pulsate.min.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/bootstrap-daterangepicker/date.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/bootstrap-daterangepicker/daterangepicker.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/gritter/js/jquery.gritter.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."assets/plugins/jquery.sparkline.min.js"; ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() ."assets/pagescript/app.js"; ?>" type="text/javascript"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		// initlayout and core plugins
		Dashboard.initCalendar();
		// init index page's custom scripts
		Dashboard.initCharts();
		// init index page's custom scripts
		

	}); 
</script>

<script>
	var Dashboard = function() {

	return {
		initCalendar : function() {
			if (!jQuery().fullCalendar) {
				return;
			}

			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

			var h = {};

			if ($('#calendar').width() <= 400) {
				$('#calendar').addClass("mobile");
				h = {
					left : 'title, prev, next',
					center : '',
					right : 'today,month,agendaWeek,agendaDay'
				};
			} else {
				$('#calendar').removeClass("mobile");
				if (App.isRTL()) {
					h = {
						right : 'title',
						center : '',
						left : 'prev,next,today,month,agendaWeek,agendaDay'
					};
				} else {
					h = {
						left : 'title',
						center : '',
						right : 'prev,next,today,month,agendaWeek,agendaDay'
					};
				}
			}

			$('#calendar').fullCalendar('destroy');
			// destroy the calendar
			$('#calendar').fullCalendar({//re-initialize the calendar
				disableDragging : false,
				header : h,
				editable : true,
				events : [
				<?php
					foreach ($events as $key) {
						echo "{title : '".$key->eventName."',start : new Date(y+".$key->SY.", m+".$key->SM.", d+".$key->SD."),end : new Date(y+".$key->EY.", m+".$key->EM.", d+".$key->ED."),backgroundColor : App.getLayoutColorCode('yellow'),},";
					}
				?>
				
				
				]
			});
		},

		initCharts : function() {
			if (!jQuery.plot) {
				return;
			}

			
			
			var pageviews = [
					<?php
					foreach ($chart1 as $key) {
						echo "[" . $key -> day . "," . $key -> count . "],";
					}
					?>
			];
			
			var visitors = [
			<?php
					foreach ($chart2 as $key) {
						echo "[" . $key -> day . "," . $key -> count . "],";
					}
					?>

			];

			if ($('#site_statistics').size() != 0) {

				$('#site_statistics_loading').hide();
				$('#site_statistics_content').show();
				var plot_statistics = $.plot($("#site_statistics"), [{
					data : pageviews,
					label : "Students Registered"
				}, {
					data : visitors,
					label : "Students Inquiry"
				}], {
					series : {
						lines : {
							show : true,
							lineWidth : 2,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.05
								}, {
									opacity : 0.01
								}]
							}
						},
						points : {
							show : true
						},
						shadowSize : 2
					},
					grid : {
						hoverable : true,
						clickable : true,
						tickColor : "#eee",
						borderWidth : 0
					},
					colors : ["#d12610", "#37b7f3", "#52e136"],
					xaxis : {
						ticks : 11,
						tickDecimals : 0
					},
					yaxis : {
						ticks : 11,
						tickDecimals : 0
					}
				});

				/*var previousPoint = null;
				$("#site_statistics").bind("plothover", function(event, pos, item) {
					$("#x").text(pos.x.toFixed(2));
					$("#y").text(pos.y.toFixed(2));
					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;

							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2), y = item.datapoint[1].toFixed(2);

							showTooltip('24 Jan 2013', item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
						}
					} else {
						$("#tooltip").remove();
						previousPoint = null;
					}
				});*/
			}
			
			if ($('#site_activities').size() != 0) {

				$('#site_activities').hide();
				$('#site_activities').show();
				var plot_statistics = $.plot($("#site_activities"), [{
					data : [<?php
					foreach ($chart3 as $key) {
						echo "[" . $key -> day . "," . $key -> amount . "],";
					}
					?>],
					label : "daily Payment"
				}], {
					series : {
						lines : {
							show : true,
							lineWidth : 2,
							fill : false,
							fillColor : {
								colors : [{
									opacity : 0.0
								}, {
									opacity : 0.01
								}]
							}
						},
						points : {
							show : true
						},
						shadowSize : 2
					},
					grid : {
						hoverable : true,
						clickable : true,
						tickColor : "#eee",
						borderWidth : 0
					},
					colors : ["#d12610", "#37b7f3", "#52e136"],
					xaxis : {
						ticks : 11,
						tickDecimals :0
					},
					yaxis : {
						ticks : 11,
						tickDecimals : 0
					}
				});

			}

			
		},
	};

}(); 
	
</script>