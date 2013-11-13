<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script><!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url() ."assets/plugins/jquery-validation/dist/additional-methods.min.js"; ?>"></script><!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/select2/select2.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/jquery.dataTables.js"; ?>"></script><!-- For Tables -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/DT_bootstrap.js"; ?>"></script><!-- For Tables -->
<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/plugins/gmaps/gmaps.js"; ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() . "assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/BranchManage.js"; ?>	"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		Branch.init_table();
		Branch.init_formvalidation();
		Branch.init_uijquery();
	});
	$('#tablink2').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
		map = Branch.init_google();
	})
	$("#loadmap").click(function() {
		map = Branch.init_google();
	}); 
</script>