<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script><!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/select2/select2.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"; ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() . "assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/SendNotificationManage.js"; ?>"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		SendNotification.init_formvalidation(); 
		SendNotification.init_uijquery();
	}); 
</script>