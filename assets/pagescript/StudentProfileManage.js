var StudentProfile = function() {
	var formValidatorEditProfile = function() {
		var form1 = $('#form_studet_profile');
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
				},
				middle_name : {
					required : true,
				},
				last_name : {
					required : true,
				},
				date_of_birth : {
					required : true,
				},
				mobile_no : {
					required : true,
					minlength : 10,
					number : true
				},
				email : {
					email : true,
					required : true,
				},
				qualification : {
					required : true,
				},
				street_1 : {
					required : true,
				},
				street_2 : {
					required : false,
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
				name_of_institute : {
					required : true,
				},
				guardian_name : {
					required : true,
				},
				occupation_of_guardian : {
					required : true,
				},
				reference : {
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
	};
	var formValidatorChangeAvtar = function() {
		var form1 = $('#form_change_avtar');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				student_avtar : {
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
	};
	var formValidatorChangePassword = function() {
		var form1 = $('#form_change_password');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				current_password : {
					required : true,
				},
				new_password : {
					required : true,
				},
				re_new_password : {
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
	};
	var formValidatorChangeResume = function() {
		var form1 = $('#form_student_resume');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				student_resume : {
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
	};
	return {
		//main function to initiate the module
		init_formvalidation : function() {
			formValidatorEditProfile();
			formValidatorChangeAvtar();
			formValidatorChangePassword();
			formValidatorChangeResume();
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

		}
	};
}();
