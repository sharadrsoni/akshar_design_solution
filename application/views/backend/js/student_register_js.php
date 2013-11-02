<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/additional-methods.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/select2/select2.min.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js"; ?>" type="text/javascript" ></script>

<script src="<?php echo base_url() . "assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/Studentregister.js"; ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		// initiate layout and plugins
		App.init();
		StudentRegistration.init_formvalidation();
	}); 
</script>