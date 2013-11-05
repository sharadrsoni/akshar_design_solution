<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/jquery.dataTables.js"; ?>"></script><!-- For Tables -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/DT_bootstrap.js"; ?>"></script><!-- For Tables -->
<script src="<?php echo base_url() . "assets/plugins/jquery-knob/js/jquery.knob.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() . "assets/pagescript/TestResultManage.js"; ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		App.init();
		UISliders.init_table();
		UISliders.initKnowElements();
	}); 
</script>
