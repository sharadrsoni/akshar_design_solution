<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script><!-- For Validation -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script><!-- For Tables -->
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script><!-- For Tables -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/pagescript/app.js"></script>
<script src="assets/pagescript/CourseCategoryManage.js"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		CourseCategoryTable.init();
		CourseCategoryValidation.init();
	}); 
</script>