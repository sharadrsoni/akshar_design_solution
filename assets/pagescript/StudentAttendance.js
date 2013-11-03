var StudentAttendance = function() {
	return {
		//main function to initiate the module
		init_formvalidation : function() {
			var form1 = $('#form_attendance');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					batch_id : {
						required : true,
					},
					Attendance_date : {
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
					error1.hide();
				}
			});
		},
		init_uijquery : function() {
			$("#Attendance_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});
			$("#Attendance_date_datepicker .add-on").click(function() {
				$("#Attendance_date_datepicker input").datepicker("show");
			});
			$('.text-toggle-Attendance').toggleButtons({
				width : 200,
				label : {
					enabled : $('.text-toggle-Attendance').attr("data-on"),
					disabled : $('.text-toggle-Attendance').attr("data-off")
				},
				style : {
					// Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
					enabled : "info",
					disabled : "danger"
				}
			});
			
		}
	};
}();
