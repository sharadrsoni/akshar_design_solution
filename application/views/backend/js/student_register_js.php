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
		$("#courseid").change(function() {
			$("#batchid").children().remove();
			$('#batchid').html("<option value=\"\">Select...</option>");
			$.ajax({
				url : "../ajax_manager/batch/" + $("#courseid").val(),
				dataType : 'json',
				async : true,
				success : function(json) {
					if (json) {
						$.each(json.batch_list, function(i, item) {
							$('#batchid').append("<option value=" + item.batchId +  ">" + item.batchStartDate + "</option>");
						});
					}
				}
			});
		});

		$("#studentid").change(function() {
			$.ajax({
				url : "../ajax_manager/studentBatch/" + $("#studentid").val(),
				dataType : 'json',
				async : true,
				success : function(json) {
					if (json) {
						$.each(json.batch_list, function(i, item) {
							$('#lst_Courses').append("<tr class='odd gradeX'><td>" + $("#weekday option[value='"+item.batchTimingWeekday+"']").text()+ "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingWeekday + "'/></td><td class='hidden-480'>" + item.batchTimingStartTime + "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingStartTime + "'/></td><td class='hidden-480'>" + item.batchTimingEndTime + "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingEndTime + "'/></td><td><a onclick='removebatchtime(this)' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
						});
					}
				}
			});
		});


	}); 
</script>