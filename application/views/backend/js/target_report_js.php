<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script><!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/select2/select2.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/jquery.dataTables.js"; ?>"></script><!-- For Tables -->
<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/DT_bootstrap.js"; ?>"></script><!-- For Tables -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script><!-- For Validation -->
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script><!-- For Tables -->
	<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script><!-- For Tables -->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url() ."assets/pagescript/app.js"; ?>"></script>
<script src="<?php echo base_url() ."assets/pagescript/TargetReport.js"; ?>"></script>
		<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TargetReport.init_table();
		   TargetReport.init_formvalidation();
		   TargetReport.init_uijquery();
		   jQuery("#view").hide();
		});
		 jQuery(".view").click(function(){
                        
                        var $id=$(this).attr('id');
                        alert($id);
                        jQuery("#view").show();
             
                  
                
                });
	</script>
