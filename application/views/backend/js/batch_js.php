<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script><!-- For Validation -->
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script><!-- For Tables -->
	<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script><!-- For Tables -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/pagescript/app.js"></script>
	<script src="assets/pagescript/BatchManage.js"></script>
	<script>
		jQuery(document).ready(function() {
			App.init();
			EventTable.init();
			EventValidation.init();
			EventUIJQueryUI.init();
		});
	</script>