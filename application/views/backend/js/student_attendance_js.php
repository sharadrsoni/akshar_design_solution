<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script><!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"; ?>"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() . "assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/StudentAttendance.js"; ?>"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		StudentAttendance.init_formvalidation();
		StudentAttendance.init_uijquery();
	}); 
</script>