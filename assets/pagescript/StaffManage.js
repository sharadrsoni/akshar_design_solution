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
					"bSortable" : true
				}, {
					"bSortable" : true
				}, {
					"bSortable" : true
				}, {
					"bSortable" : true
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
					branchCode : {
						required : true
					},
					userroleId : {
						required : true
					},
					first_name : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					middle_name : {
					
						
						maxlength:50,
						lettersonly:true,
					},
					last_name : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					contact_number : {
						minlength : 10,
						maxlength:10,
						digits:true,
						required : true
					},
					email : {
						required : true,
						email:true,
						maxlength:50,
					},
					date_of_birth : {
						required : true,
						maxDate:true,
					},
					qualification : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					street_1 : {
						required : true,
						minlength : 4,
						maxlength:100,
					},
					street_2 : {
						
						minlength : 4,
						maxlength:100,
					},
					cityid : {
						required : true,
						
						
					},
					stateid : {
						required : true
					},
					pin_code : {
						required : true,
						minlength:6,
						maxlength:6,
						digits:true,
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

			$("#dob_datepicker input").datepicker({
				isRTL : App.isRTL(),
				changeMonth : true,
				changeYear : true,
				yearRange : "1920:2000",
				defaultDate: '1-1-2000',
				dateFormat: 'dd-mm-yy'
			});

			$("#dob_datepicker .add-on").click(function() {
				$("#dob_datepicker input").datepicker("show");
			});

			$(".select2").select2({
				allowClear : true,
			});

			$("#stateid").change(function() {
				$('#cityid').html('');
				$("#cityid").append("<option>Select...</option>");
				$.ajax({
					url : "../ajax_manager/citylist/" + $("#stateid").val(),
					dataType : 'json',
					async : false,
					success : function(json) {
						if (json) {
							$.each(json.city_list, function(i, item) {
								$("#cityid").append("<option value='" + item.cityId + "'>" + item.cityName + "</option>");
							});
						}
					}
				});
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
				$("#stateid").select2("val", 0);
				$("#stateid").change();
				$("#cityid").select2("val", 0);
				$('#pin_code').val("");
				$('#staffId').val("");
				$("#submitStaff").text("Add Staff User");
				$('.alert-error', $('#form_staff')).hide();
				$("#form_staff").validate().resetForm();
				$(".error").removeClass("error");
				$(".success").removeClass("success");
				$(".note").attr("style", "display");
			});

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
				$('#branchCode').val(json.staff.branchCode);
				$('#userroleId').val(json.staff.roleId);
				$('#branchCode option:not(:selected)').attr('disabled', true);
				$('#userroleId option:not(:selected)').attr('disabled', true);
				$('#first_name').val(json.staff.userFirstName);
				$('#middle_name').val(json.staff.userMiddleName);
				$('#last_name').val(json.staff.userLastName);
				$('#contact_number').val(json.staff.userContactNumber);
				$('#email').val(json.staff.userEmailAddress);
			    arr_date = json.staff.userDOB.split('-');
				$('#date_of_birth').val(arr_date[2] + '-' + arr_date[1] + '-' + arr_date[0]);
				$('#qualification').val(json.staff.userQualification);
				$('#street_1').val(json.staff.userStreet1);
				$('#street_2').val(json.staff.userStreet2);
				$("#stateid").select2("val", json.staff.stateId);
				$("#stateid").change();
				$("#cityid").select2("val", json.staff.cityId);
				$('#pin_code').val(json.staff.userPostalCode);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#staffId').val(json.staff.userId);
				$("#submitStaff").text("Update Staff User");
				$(".note").attr("style", "display:none");
			}
		}
	});
}

function viewstaff(userId) {
	$.ajax({
		url : "staff/" + userId,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#viewUserID').text(json.staff.userId);
				$('#viewBranchName').text(json.staff.branchName);
				$('#viewUserName').text(json.staff.userFirstName + " " + json.staff.userMiddleName + " " + json.staff.userLastName);
				$('#viewUserContactNO').text(json.staff.userContactNumber);
				$('#viewUserAddress').html(json.staff.userStreet1 + "<Br/>" + json.staff.userStreet2 + "<Br/>" + json.staff.cityId + ", " + json.staff.stateId + "<Br/>" + json.staff.userPostalCode);
				$('#viewUserEmail').html(json.staff.userEmailAddress);
				arr_date = json.staff.userDOB.split('-');
				$('#viewUserDOB').html(arr_date[2] + '-' + arr_date[1] + '-' + arr_date[0]);
				arr_date = json.staff.userJoiningDate.split('-');
				$('#viewUserDOJ').html(arr_date[2] + '-' + arr_date[1] + '-' + arr_date[0]);
				$('#ViewProfielImage').attr("src",json.staff.userPhotograph);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tabView').addClass("active");
			}
		}
	});
}