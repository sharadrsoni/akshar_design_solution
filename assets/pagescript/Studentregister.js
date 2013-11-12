var StudentRegistration = function() {
	var FormValidationStudentRegistration = function() {
		// for more info visit the official plugin documentation:
		// http://docs.jquery.com/Plugins/Validation
		var form1 = $('#form_student_register1');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				firstname : {
					required : true
				},
				lastname : {
					required : true
				},
				middlename : {
					required : true
				},
				email : {
					required : true
				},
				contact_number : {
					required : true
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
	var FormValidationCourseRegistration = function() {
		// for more info visit the official plugin documentation:
		// http://docs.jquery.com/Plugins/Validation
		var form1 = $('#form_student_register2');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				studentid : {
					required : true
				},
				courseid : {
					required : true
				},
				batchid : {
					required : true
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
			FormValidationStudentRegistration();
			FormValidationCourseRegistration();
		},
		init_uijquery : function() {
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
								$('#batchid').append("<option value=" + item.batchId + ">" + item.batchStartDate + "</option>");
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
								$('#lst_Courses').append("<tr><td class='hidden-480'>"+item.courseName+"</td><td class='hidden-480'>"+item.batchId+"</td><td><a href='branch_manager/delete_course_register/"+item.studentBatchId+"' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
							});
						}
					}
				});
			});
		}
	};
}();

