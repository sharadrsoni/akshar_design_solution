var Target = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblTarget table
			$('#tblTarget').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, {
					"bSortable" : false
				}, null, null, {
					"bSortable" : false
				}, {
					"bSortable" : false
				}],
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

			jQuery('#tblTarget .group-checkable').change(function() {
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

			jQuery('#tblTarget .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblTarget .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblEvent .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_target');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					branch : {
						required : true,
					},
					target_name : {
						required : true,
						minlenght: 4,
						maxlength:100,
					},
					target_type : {
						required : true,
					},
					start_date : {
						required : true,
					},
					end_date : {
						required : true,
					},
					description : {
						required : true,
						minlength: 10,
						maxlength:500,
					}

				},

				invalidHandler : function(target, validator) {//display error alert on form submit
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
				dateFormat: 'dd-mm-yy'
			});

			$("#start_date_datepicker .add-on").click(function() {
				$("#start_date_datepicker input").datepicker("show");
			});

			$("#end_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat: 'dd-mm-yy'
			});

			$("#end_date_datepicker .add-on").click(function() {
				$("#end_date_datepicker input").datepicker("show");
			});
			$("#tablink2").click(function() {
				$('#branch').val("");
				$('#target_name').val("");
				$('#target_type').val("");
				$('#start_date').val("");
				$('#end_date').val("");
				$('#description').val("");
				$('#targetId').val("");
				$("#submitTarget").text("Add Target");
				$('.alert-error', $('#form_target')).hide();
				$("#form_target").validate().resetForm();
  				$(".error").removeClass("error");
  				$(".success").removeClass("success");
			});
		}
	};
}();
function viewtarget(targetid) {
	$.ajax({
		url : "target/" + branchCode,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				
			}
		}
	});
}

function updatetarget(targetid) {
	$.ajax({
		url : "target/" + targetid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#branch').val(json.target[0].branchCode);
				$('#target_name').val(json.target[0].targetSubject);
				$('#target_type').val(json.target[0].targetTypeId);
				$('#start_date').val(json.target[0].targetStartDate);
				$('#end_date').val(json.target[0].targetEndDate);
				$('#description').val(json.target[0].targetDescription);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#targetId').val(json.target[0].targetId);
				$("#submitTarget").text("Update Target");
			}
		}
	});
}