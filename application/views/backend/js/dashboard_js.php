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
<script src="<?php echo base_url() ."assets/pagescript/DashboardManage.js"; ?>" type="text/javascript"></script>
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