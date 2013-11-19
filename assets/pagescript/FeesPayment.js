var StudentFees = function() {
	var formvalidation1 = function() {
		var form1 = $('#form_fees_payment');
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
				payment_date : {
					required : true
				},
				course_amount:{
					required:true,
				},
				cheque_number : {
					required : function() {
						if ($("#paymemt_mode").is(':checked')) {
							return true;
						} else {
							return false;
						}
					},
					digits:true,
					
				},
				cheque_issue_date : {
					required : function() {
						if ($("#paymemt_mode").is(':checked')) {
							return true;
						} else {
							return false;
						}
					},
					maxDate:true,
				},
				bankname : {
					required : function() {
						if ($("#paymemt_mode").is(':checked')) {
							return true;
						} else {
							return false;
						}
					},
					minlength:3,
					maxlength:100,
					lettersonly:true,
				},
				branchname : {
					required : function() {
						if ($("#paymemt_mode").is(':checked')) {
							return true;
						} else {
							return false;
						}
					},
					minlength:3,
					maxlength:100,
				},
				ifrc_code : {
					required : function() {
						if ($("#paymemt_mode").is(':checked')) {
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
	};

	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblEvent table
			$('#tblfeespyament').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null, {
					"bSortable" : false
				}, null, null],
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

			jQuery('#tblfeespyament .group-checkable').change(function() {
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

			jQuery('#tblfeespyament .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblfeespyament .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblEvent .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			formvalidation1();
		},
		init_uijquery : function() {
			$("#payment_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});

			$("#payment_date_datepicker .add-on").click(function() {
				$("#payment_date_datepicker input").datepicker("show");
			});

			$("#cheque_issue_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});

			$("#cheque_issue_datepicker .add-on").click(function() {
				$("#cheque_issue_datepicker input").datepicker("show");
			});

			$("#paymemt_mode").change(function() {
				if ($('#paymemt_mode').is(':checked') == true) {
					$("#cheque_details").attr("style", "display");
				} else {
					$("#cheque_details").attr("style", "display:none");
				}
			});
			
			$("#add_payment_details").click(function() {
				if ($('#course').val() != "" && $('#course').val() != "null") {
					if ($('#course_amount').val() != "") {
						if (parseInt($("#total_amount").val()) + parseInt($(course_amount).val()) <= parseInt($("#remianing_amount").text())) {
							$("#lst_Payment_Details").append("<tr class='odd gradeX'><td>" + $('#course option:selected').text() + "<input type='hidden' name='payment_studentBatchId[]' value='" + $('#course').val() + "'/><td id='camount'>" + $('#course_amount').val() + "<input type='hidden' name='payment_details[]' value='" + $('#course_amount').val() + "'/><td><a onclick='removepaymentdetails(this)' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
							$("#total_amount").val(parseInt($("#total_amount").val()) + parseInt($(course_amount).val()));
						} else {
							alert("You can not enter amount more than remaining amount");
						}
					} else {
						$('#course_amount').closest('.help-inline').removeClass('ok');
						$('#course_amount').closest('.control-group').removeClass('success').addClass('error');
					}
				} else {
					$('#course').closest('.help-inline').removeClass('ok');
					$('#course').closest('.control-group').removeClass('success').addClass('error');
				}
				$('#course option:nth(0)').attr("selected", "selected");
				$('#course_amount').val('');
			});
			
			$("#studentid").change(function() {
				$("#course").children().remove();
				$('#course').append("<option value=\"\">Select...</option>");
				$.ajax({
					url : "../ajax_manager/studentBatch/" + $("#studentid").val(),
					dataType : 'json',
					async : true,
					success : function(json) {
						if (json) {
							$.each(json.batch_list, function(i, item) {
								$('#course').append("<option value=" + item.studentBatchId + ">" + item.courseName + "</option>");
							});
						}
					}
				});
			});
			
			
		}
	};
}();
function removepaymentdetails(e) {
	$("#total_amount").val(parseInt($("#total_amount").val()) - parseInt($(e).parent().parent().find("#camount").text()));
	$(e).parent().parent().remove();
}
