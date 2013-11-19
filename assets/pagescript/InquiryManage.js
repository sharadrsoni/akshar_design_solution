var Inquiry = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblTarget table
			$('#tblInquiry').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, {
					"bSortable" : false
				}, null, null, {
					"bSortable" : false
				}, {
					"bSortable" : false
				},null],
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

			jQuery('#tblInquiry .group-checkable').change(function() {
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

			jQuery('#tblInquiry .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblInquiry .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblInquiry .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {

			var form1 = $('#form_inquiry');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					first_name : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					middle_name : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					last_name : {
						required : true,
						minlength : 2,
						maxlength:50,
						lettersonly:true,
					},
					date_of_birth : {
						required : true,
						maxDate:true,
					},
					mobile_no : {
						digits:true,
						required : true,
						minlength : 10,
						maxlength:10,
						
					},
					email : {
						email : true,
						required : true,
					},
					qualification : {
						required : true,
						minlength:2,
						maxlength:50,
					},
					street_1 : {
						required : true,
						minlength : 4,
						maxlength:100,
					},
					street_2 : {
						required : true,
						minlength : 4,
						maxlength:100,
					},
					city : {
						required : true,
					},
					state : {
						required : true,
					},
					pin_code : {
						required : true,
					},
					coursecategory : {
						required : true,
					},
					course : {
						required : true,
					},
					date_of_doj : {
						required : true,
						minDate:true,
					},
					name_of_institute : {
						required : true,
						minlength:3,
						maxlength:100,
					},
					occupation_of_guardian : {
						required : true,
						minlength:2,
						maxlength:100,
					},
					reference : {
						required : true,
						minlength:3,
						maxlength:100,
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
				yearRange : "c-60:c",
				dateFormat: 'dd-mm-yy'
			});

			$("#dob_datepicker .add-on").click(function() {
				$("#dob_datepicker input").datepicker("show");
			});
			
			$("#doj_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat: 'dd-mm-yy'
			});

			$("#doj_datepicker .add-on").click(function() {
				$("#doj_datepicker input").datepicker("show");
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
								$("#cityid").append("<option value='"+item.cityId+"'>"+item.cityName+"</option>");
							});
						}
					}
				});
			});
			
			$("#coursecategory").change(function() {
				$('#course').html('');
				$("#course").append("<option>Select...</option>");
				$.ajax({
					url : "../ajax_manager/courseByCourseCategory/" + $("#coursecategory").val(),
					dataType : 'json',
					async : false,
					success : function(json) {
						if (json) {
							$.each(json.city_list, function(i, item) {
								$("#course").append("<option value='"+item.courseCode+"'>"+item.courseName+"</option>");
							});
						}
					}
				});
			});
	
			$("#tablink2").click(function() {
				$('#user_name').val("");
				$('#date_of_birth').val("");
				$('#mobile_no').val("");
				$('#email').val("");
				$('#qualification').val("");
				$('#street_1').val("");
				$('#street_2').val("");
				$('#state option:nth(0)').attr("selected", "selected");
				$('#city option:nth(0)').attr("selected", "selected");
				$('#pin_code').val("");
				$('#coursecategory option:nth(0)').attr("selected", "selected");
				$('#date_of_doj').val("");
		     	$('#name_of_institute').val("");
				$('#occupation_of_guardian').val("");
				$('#reference').val("");
				$('#inquiryId').val("");
				$("#submitInquiry").text("Add Inquiry");
				$('.alert-error', $('#form_inquiry')).hide();
				$("#form_inquiry").validate().resetForm();
  				$(".error").removeClass("error");
  				$(".success").removeClass("success");
			});
		}
	};
}();
function updateinquiry(inquiryid) {
	$.ajax({
		url : "../branch_manager_counsellor/inquiry/" + inquiryid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#first_name').val(json.inquiry[0].inquiryStudentFirstName);
				$('#middle_name').val(json.inquiry[0].inquiryStudentMiddleName);
				$('#last_name').val(json.inquiry[0].inquiryStudentLastName);
				$('#date_of_birth').val(json.inquiry[0].inquiryDOB);
				$('#mobile_no').val(json.inquiry[0].inquiryContactNumber);
				$('#email').val(json.inquiry[0].inquiryEmailAddress);
				$('#qualification').val(json.inquiry[0].inquiryQualification);
				$('#street_1').val(json.inquiry[0].inquiryStreet1);
				$('#street_2').val(json.inquiry[0].inquiryStreet2);
				$('#state').val(json.inquiry[0].inquiryState);
				$('#city').val(json.inquiry[0].inquiryCity);
				$('#pin_code').val(json.inquiry[0].inquiryPostalCode);
				$('#course').val(json.inquiry[0].courseCode);
				$('#date_of_doj').val(json.inquiry[0].inquiryExpectedDOJ);
				$('#occupation_of_student').val(json.inquiry[0].inquiryStudentOccupation);
				$('#name_of_institute').val(json.inquiry[0].inquiryInstituteName);
				$('#occupation_of_guardian').val(json.inquiry[0].inquiryGuardianOccupation);
				$('#reference').val(json.inquiry[0].inquiryReferenceName);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#inquiryId').val(json.inquiry[0].inquiryId);
				$("#submitInquiry").text("Update Inquiry");
			}
		}
	});
}
function viewinquiry(inquiryId) {
	$.ajax({
		url : "../branch_manager_counsellor/inquiry/" + inquiryId,
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

