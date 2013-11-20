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
						maxlength : 100,
						minlength : 5,
					},
					branch_Batch : {
						required : true,
					},
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
			$('.text-toggle-Individual_Branch').toggleButtons({
				width : 200,
				label : {
					enabled : $('.text-toggle-Individual_Branch').attr("data-on"),
					disabled : $('.text-toggle-Individual_Branch').attr("data-off")
				},
				style : {
					// Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
					enabled : "warning",
					disabled : "success"
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
			$('.text-toggle-Branch_Batch').toggleButtons({
				width : 200,
				label : {
					enabled : $('.text-toggle-Branch_Batch').attr("data-on"),
					disabled : $('.text-toggle-Branch_Batch').attr("data-off")
				},
				style : {
					// Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
					enabled : "warning",
					disabled : "success"
				}
			});
			$("#individual_Branch").change(function() {
				if ($('#individual_Branch').is(':checked') == true) {
					$("#lst_user_div").attr("style", "display");
				} else {
					$("#lst_user_div").attr("style", "display:none");
				}
			});

			$("#individual_all").change(function() {
				$("#user_name").children().remove();
				$("#branch_name").val("");
				if ($('#individual_all').is(':checked') == true && $("#user_role").data("role_id") != 1) {
					$("#lst_user_div").attr("style", "display");
					$("#user_name").children().remove();

					$.ajax({
						url : "../ajax_manager/branchStaffList",
						dataType : 'json',
						async : true,
						success : function(json) {
							if (json) {
								$.each(json.staff_list, function(i, item) {
									$('#user_name').append("<option value=" + item.userId + ">" + item.userFirstName + ' ' + item.userMiddleName + ' ' + item.userLastName + "</option>");
								});
							}
						}
					});

				} else {
					$("#lst_user_div").attr("style", "display:none");
				}
			});

			$("#individual_Batch").change(function() {
				$("#user_name").children().remove();
				if ($('#individual_Batch').is(':checked') == true) {
					$("#lst_user_div").attr("style", "display");
				} else {
					$("#lst_user_div").attr("style", "display:none");
				}
			});

			$("#branch_Batch").change(function() {
				$("#batch_name").children().remove();
				$("#user_name").children().remove();
				$("#branch_name").val("");
				if ($('#branch_Batch').is(':checked') == true) {
					$("#lst_batch_div").attr("style", "display:none");
				} else {
					$("#lst_batch_div").attr("style", "display");
				}
			});

			$("#user_role").change(function() {
				if ($('#user_role').is(':checked') == true) {
					if ($("#user_role").data("role_id") == 1) {
						$("#lst_batch_div").attr("style", "display");
						$("#check_box_studnet").attr("style", "display");
						$("#check_box_staff").attr("style", "display:none");
						$("#lst_user_div").attr("style", "display:none");
					} else {
						$("#check_box_studnetBatch").attr("style", "display");
						$("#check_box_studnetBatch").attr("style", "display");
						if ($('#individual_Batch').is(':checked') == true)
							$("#check_box_studnet").attr("style", "display");
						else
							$("#lst_batch_div").attr("style", "display");
						$("#check_box_studnet").attr("style", "display:none");
						$("#check_box_staff").attr("style", "display:none");
						$("#lst_batch_div").attr("style", "display");


					}
				} else {
					if ($("#user_role").data("role_id") == 1) {
						$("#check_box_studnet").attr("style", "display:none");
						if ($('#individual_Branch').is(':checked') == true)
							$("#lst_user_div").attr("style", "display");
						$("#check_box_staff").attr("style", "display");
						$("#lst_batch_div").attr("style", "display:none");
					} else {
						$("#check_box_studnetBatch").attr("style", "display:none");
						$("#check_box_staff").attr("style", "display");
						if ($('#individual_all').is(':checked') == true)
							$("#lst_user_div").attr("style", "display");
						else
							$("#lst_user_div").attr("style", "display:none");

						$("#lst_batch_div").attr("style", "display:none");
						$("#check_box_studnet").attr("style", "display:none");
					}
				}
			});
			$(".select2").select2({
				allowClear : false,
			});

			$("#branch_name").change(function() {
				$("#batch_name").children().remove();
				$("#user_name").children().remove();
				$.ajax({
					url : "../ajax_manager/branchDataList",
					dataType : 'json',
					async : true,
					type : 'POST',
					data : {
						csrf_test_name : $("input[name$='csrf_test_name']").val(),
						batchId : $("#branch_name").val()
					},
					success : function(json) {
						if (json) {
							$.each(json.batch_list, function(i, item) {
								$('#batch_name').append("<option value=" + item.batchId + ">" + item.batchStartDate + "</option>");
							});
							$.each(json.staff_list, function(i, item) {
								$('#user_name').append("<option value=" + item.userId + ">" + item.userFirstName + ' ' + item.userMiddleName + ' ' + item.userLastName + "</option>");
							});
						}
					}
				});
			});
			$("#batch_name").change(function() {
				if ($("#user_role").data("role_id") != 1) {
					$("#user_name").children().remove();
					$.ajax({
						url : "../ajax_manager/branchStudentList",
						dataType : 'json',
						async : true,
						type : 'POST',
						data : {
							csrf_test_name : $("input[name$='csrf_test_name']").val(),
							batchCode : $("#batch_name").val()
						},
						success : function(json) {
							if (json) {
								$.each(json.staff_list, function(i, item) {
									$('#user_name').append("<option value=" + item.userId + ">" + item.userFirstName + ' ' + item.userMiddleName + ' ' + item.userLastName + "</option>");
								});
							}
						}
					});
				}
			});

		}
	};
}();
