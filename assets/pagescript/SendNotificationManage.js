var SendNotification = function() {
	return {
		//main function to initiate the module
		init_formvalidation : function() {
			var form1 = $('#form_sendnotification');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					message : {
						required : true,
					},
					user_name : {
						required : function() {
							if ($("#individual_Batch").is(':checked')) {
								return true;
							} else {
								return false;
							}
						}
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
			$('.text-toggle-Userrole').toggleButtons({
				width : 200,
				label : {
					enabled : $('.text-toggle-Userrole').attr("data-on"),
					disabled : $('.text-toggle-Userrole').attr("data-off")
				},
				style : {
					// Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
					enabled : "danger",
					disabled : "info"
				}
			});
			$('.text-toggle-Individual_Batch').toggleButtons({
				width : 200,
				label : {
					enabled : $('.text-toggle-Individual_Batch').attr("data-on"),
					disabled : $('.text-toggle-Individual_Batch').attr("data-off")
				},
				style : {
					// Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
					enabled : "warning",
					disabled : "success"
				}
			});
			$("#individual_Batch").change(function() {
				if ($('#individual_Batch').is(':checked') == true) {
					$("#lst_user_div").attr("style", "display");
				} else {
					$("#lst_user_div").attr("style", "display:none");
				}
			});
			$("#user_role").change(function() {
				if ($('#user_role').is(':checked') == true) {
					$("#lst_batch_div").attr("style", "display");
				} else {
					$("#lst_batch_div").attr("style", "display:none");
				}
			});
			$("#user_name").select2({
				allowClear : false,
				escapeMarkup : function(m) {
					return m;
				}
			});
		}
	};
}();
