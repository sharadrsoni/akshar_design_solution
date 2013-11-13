var Staff = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblStaff table
			$('#tblStaff').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null, null,null,null],
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

			jQuery('#tblStaff .group-checkable').change(function() {
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
			jQuery('#tblStaff .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblStaff .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblStaff .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_staff');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					first_name : {
						required : true
					},
					middle_name : {
						required : true
					},
					last_name : {
						required : true
					},
					contact_number : {
						minlength : 10,
						required : true
					},
					email : {
						required : true,
					},
					dob : {
						required : true,
					},
					qualification : {
						required : true,
					},
					date_of_joining : {
						required : true,
					},
					street_1 : {
						required : true,
					},
					street_2 : {
						required : true,
					},
					city : {
						required : true,
					},
					state : {
						required : true
					},
					pin_code : {
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
					form1.submit();
					error1.hide();
				}
			});
		},
		init_uijquery : function() {
			$("#dob_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat: 'dd-mm-yy'
				
			});

			$("#dob_datepicker .add-on").click(function() {
				$("#dob_datepicker input").datepicker("show");
			});
			
			$("#tablink2").click(function() {
				$('#brnachId option:nth(0)').attr("selected", "selected");
				$('#userroleId option:nth(0)').attr("selected", "selected");
				$('#first_name').val("");
				$('#middle_name').val("");
				$('#last_name').val("");
				$('#contact_number').val("");
				$('#email').val("");
				$('#date_of_birth').val("");
				$('#qualification').val("");
				$('#street_1').val("");
				$('#street_2').val("");
				$('#state option:nth(0)').attr("selected", "selected");
				$('#city option:nth(0)').attr("selected", "selected");
				$('#pin_code').val("");
				$('#staffId').val("");
				$("#submitStaff").text("Add Staff User");
				$('.alert-error', $('#form_branch')).hide();
				$("#form_branch").validate().resetForm();
				$(".error").removeClass("error");
				$(".success").removeClass("success");
			});
		/*$("#doj_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat: 'dd-mm-yy'
			});

			$("#doj_datepicker .add-on").click(function() {
				$("#doj_datepicker input").datepicker("show");
			});*/
		}
	};
}();
function updatestaff(staffid) {
	$.ajax({
		url : "staff/" + staffid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#branchId').val(json.staff[0].branchId);
				$('#userroleId').val(json.staff[0].roleId);
				$('#first_name').val(json.staff[0].userFirstName);
				$('#middle_name').val(json.staff[0].userMiddleName);
				$('#last_name').val(json.staff[0].userLastName);
				$('#contact_number').val(json.staff[0].userContactNumber);
				$('#email').val(json.staff[0].userEmailAddress);
				$('#date_of_birth').val(json.staff[0].userDOB);
				$('#qualification').val(json.staff[0].userQualification);
				$('#street_1').val(json.staff[0].userStreet1);
				$('#street_2').val(json.staff[0].userStreet2);
				$('#state').val(json.staff[0].userState);
				$('#city').val(json.staff[0].userCity);
				$('#pin_code').val(json.staff[0].userPostalCode);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#staffId').val(json.staff[0].userId);
				$("#submitStaff").text("Update Staff User");
			}
		}
	});
}