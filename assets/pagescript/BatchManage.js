var Batch = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblEvent table
			$('#tblBatch').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null, null, null, null],
				"aLengthMenu" : [[5, 15, 20, -1], [5, 15, 20, "All"] // change per page values here
				],
				// set the initial value
				"iDisplayLength" : 5,
				"sDom" : "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
				"sPaginationType" : "bootstrap",
				"oLanguage" : {
					"sLengthMenu" : "_MENU_ records per page",
					"oPaginate" : {
						"sPrevious" : "Prev",
						"sNext" : "Next"
					}
				},
				"aoColumnDefs" : [{
					'bSortable' : false,
					'aTargets' : [0]
				}]
			});

			jQuery('#tblBatch .group-checkable').change(function() {
				var set = jQuery(this).attr("data-set");
				var checked = jQuery(this).is(":checked");
				jQuery(set).each(function() {
					if (checked) {
						$(this).attr("checked", true);
					} else {
						$(this).attr("checked", false);
					}
				});
				jQuery.uniform.update(set);
			});

			jQuery('#tblBatch .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblBatch .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblEvent .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_batch');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					course_id : {
						required : true,
					},
					faculty_id : {
						required : true,
					},
					start_date : {
						required : true,
					},
					strength : {
						required : true,
					}
				},

				invalidHandler : function(event, validator) {//display error alert on form submit
					success1.hide();
					error1.show();
					App.scrollTo(error1, -200);
				},

				highlight : function(element) {// hightlight error inputs
					$(element).closest('.help-inline').removeClass('ok');
					// display OK icon
					$(element).closest('.control-group').removeClass('success').addClass('error');
					// set error class to the control group
				},

				unhighlight : function(element) {// revert the change done by hightlight
					$(element).closest('.control-group').removeClass('error');
					// set error class to the control group
				},

				success : function(label) {
					label.addClass('valid').addClass('help-inline ok')// mark the current input as valid and display OK icon
					.closest('.control-group').removeClass('error').addClass('success');
					// set success class to the control group
				},

				submitHandler : function(form) {
					success1.show();
					form.submit();
					error1.hide();
				}
			});
		},
		init_uijquery : function() {
			$("#start_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});
			$("#start_date_datepicker .add-on").click(function() {
				$("#start_date_datepicker input").datepicker("show");
			});

			$('#start_time_picker').datetimepicker({
				pickDate : false
			});

			$('#end_time_picker').datetimepicker({
				pickDate : false
			});

			$('#btn_add_batch_timing').click(function() {
				if ($('#weekday').val() != "" && $('#weekday').val() != "null") {
					if ($('#start_time').val() != "") {
						if ($('#end_time').val() != "") {
							$('#lst_batch_timing').append("<tr class='odd gradeX'><td>" + $('#weekday option:selected').text() + "<input type='hidden' name='batch_timing[]' value='" + $('#weekday').val() + "'/></td><td class='hidden-480'>" + $('#start_time').val() + "<input type='hidden' name='batch_timing[]' value='" + $('#start_time').val() + "'/></td><td class='hidden-480'>" + $('#end_time').val() + "<input type='hidden' name='batch_timing[]' value='" + $('#end_time').val() + "'/></td><td><a onclick='removebatchtime(this)' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
							$("#flagbtalter").val("1");
						} else {
							$('#end_time').closest('.help-inline').removeClass('ok');
							$('#end_time').closest('.control-group').removeClass('success').addClass('error');
						}
					} else {
						$('#start_time').closest('.help-inline').removeClass('ok');
						$('#start_time').closest('.control-group').removeClass('success').addClass('error');
					}
				} else {
					$('#weekday').closest('.help-inline').removeClass('ok');
					$('#weekday').closest('.control-group').removeClass('success').addClass('error');
				}
			});

			$("#tablink2").click(function() {
				$('#course_id option:nth(0)').attr("selected", "selected");
				$('#faculty_id option:nth(0)').attr("selected", "selected");
				$("#start_date").val("");
				$("#duration").val("");
				$("#strength").val("");
				$('#lst_batch_timing').html("");
				$("#batchId").val("");
				$("#flagbtalter").val("");
			});
		}
	};
}();

function removebatchtime(e) {
	$(e).parent().parent().remove();
	$("#flagbtalter").val("1");
}

function viewbatch(batchid) {
	$.ajax({
		url : "batch/" + batchid,
		dataType : 'json',
		//data : "director=" + argdirector,
		async : true,
		success : function(json) {
			if (json) {
				$("#").val();
			}
		}
	});
}

function updatebatch(batchid) {
	$.ajax({
		url : "batch/" + batchid,
		dataType : 'json',
		//data : "director=" + argdirector,
		async : true,
		success : function(json) {
			if (json) {
				$("#course_id").val(json.batch_list[0].courseCode);
				$("#faculty_id").val(json.batch_list[0].facultyId);
				$("#start_date").val(json.batch_list[0].batchStartDate);
				$("#duration").val(json.batch_list[0].batchDuration);
				$("#strength").val(json.batch_list[0].batchStrength);
				$('#lst_batch_timing').html("");
				$.each(json.weekdays, function(i, item) {
					$('#lst_batch_timing').append("<tr class='odd gradeX'><td>" + $("#weekday option[value='"+item.batchTimingWeekday+"']").text()+ "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingWeekday + "'/></td><td class='hidden-480'>" + item.batchTimingStartTime + "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingStartTime + "'/></td><td class='hidden-480'>" + item.batchTimingEndTime + "<input type='hidden' name='batch_timing[]' value='" + item.batchTimingEndTime + "'/></td><td><a onclick='removebatchtime(this)' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
				});
				$("#tablink1").parent().removeClass("active");
				$("#tab1").removeClass("active");
				$("#tab2").addClass("active");
				$("#batchId").val(batchid);
			}
		}
	});
}
function viewbatch(batchId) {
	$.ajax({
		url : "batch/" + batchId,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				alert();
				//$("#ViewBatch").attr("style", "display");
				//App.scrollTo($('#ViewBatch'));
				//$('#view_branch_name').text(json.branch[0].branchName);
				//$('#view_conatct_no').text(json.branch[0].branchContactNumber);
				//$('#view_address').html(json.branch[0].branchStreet1 + "<Br/>" + json.branch[0].branchStreet2 + "<Br/>" + json.branch[0].branchCity + ", " + json.branch[0].branchState + "<Br/>" + json.branch[0].branchPincode);
				//$('#viewstreet_2').text();
				// $('#viewstate').text();
				//$('#viewcity').text();
				//$('#viewpin_code').text();
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tabView').addClass("active");
			}
		}
	});
}

