var Event = function() {
	var FormValidationEventAttendance = function() {
		// for more info visit the official plugin documentation:
		// http://docs.jquery.com/Plugins/Validation
		var form1 = $('#form_event_attendance');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				event_id:{
					required : true,
				},
				batch_id : {
					required : true,
				},
				name_of_institute : {
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
	var FormValidationEvent = function() {
		var form1 = $('#form_event');
		var error1 = $('.alert-error', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-inline', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			ignore : "",
			rules : {
				event_name : {
					required : true,
					minlength:3,
					maxlength:100,
				},
				event_type_id : {
					required : true,
				},
				start_date : {
					required : true,
				},
				end_date : {
					required : true,
					greaterThan: "#start_date",
				},
				description : {
					required : true,
					minlength:10,
					maxlength:200,
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
					required : true
				},
				pin_code : {
						required : true,
						minlength:6,
						maxlength:6,
						digits:true,
				},
				organize_by : {
					required : true,
					minlength:3,
					maxlength:100,
				},
				faculty_id : {
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
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblEvent table
			$('#tblEvent').dataTable({
				"aoColumns" : [{
					"bSortable" : true
				}, {
					"bSortable" : true
				},{
					"bSortable" : true
				},{
					"bSortable" : true
				},{
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

			jQuery('#tblEvent .group-checkable').change(function() {
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

			jQuery('#tblEvent .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblEvent .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblEvent .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			FormValidationEvent();
			FormValidationEventAttendance();
		},
		init_uijquery : function() {
			$("#start_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});

			$("#start_date_datepicker .add-on").click(function() {
				$("#start_date_datepicker input").datepicker("show");
			});

			$("#end_date_datepicker input").datepicker({
				isRTL : App.isRTL(),
				dateFormat : 'dd-mm-yy'
			});

			$("#end_date_datepicker .add-on").click(function() {
				$("#end_date_datepicker input").datepicker("show");
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
			$("#tablink2").click(function() {
				$('#event_name').val("");
				$('#event_type_id option:nth(0)').attr("selected", "selected");
				$('#start_date').val("");
				$('#end_date').val("");
				$('#description').val("");
				$('#street_1').val("");
				$('#street_2').val("");
				$('#state option:nth(0)').attr("selected", "selected");
				$('#city option:nth(0)').attr("selected", "selected");
				$('#pin_code').val("");
				$('#organize_by').val("");
				$('#faculty_id option:nth(0)').attr("selected", "selected");
				$('#eventId').val("");
			});
			
			$("#batch_id").change(function() {
				$.ajax({
					url : "../ajax_manager/studentlistEvent/" + $("#batch_id").val(),
					dataType : 'json',
					async : true,
					success : function(json) {
						if (json) {
							$('#lst_students').html('');
							$.each(json.student_list, function(i, item) {
							if (item.attendanceIsPresent == null)
									$('#lst_students').append("<tr class='odd gradeX'><td>" + item.userFirstName + " " + item.userMiddleName + " " + item.userLastName + "</td><td><div class='text-toggle-Attendance' data-on='Present' data-off='absent'><input type='checkbox' name='student_ids[]' id='individual_Batch" + i + "' value='" + item.studentId + "' class='toggle' /></div></td></tr>");
								else
									$('#lst_students').append("<tr class='odd gradeX'><td>" + item.userFirstName + " " + item.userMiddleName + " " + item.userLastName + "</td><td><div class='text-toggle-Attendance' data-on='Present' data-off='absent'><input type='checkbox' checked='' name='student_ids[]' id='individual_Batch" + i + "' value='" + item.studentId + "' class='toggle' /></div></td></tr>");
							});
						}

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
				});
			});
			
			
		}
	};
}();
function viewevent(eventid) {
	$.ajax({
		url : "event/" + eventid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {

			}
		}
	});
}

function updateevent(eventid) {
	$.ajax({
		url : "event/" + eventid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#event_name').val(json.event[0].eventName);
				$('#event_type_id').val(json.event[0].eventTypeId);
				$('#start_date').val(json.event[0].eventStartDate);
				$('#end_date').val(json.event[0].eventEndDate);
				$('#description').val(json.event[0].eventDescription);
				$('#street_1').val(json.event[0].eventStreet1);
				$('#street_2').val(json.event[0].eventStreet2);
				$('#state').val(json.event[0].eventState);
				$('#city').val(json.event[0].eventCity);
				$('#pin_code').val(json.event[0].eventPincode);
				$('#organize_by').val(json.event[0].eventOrganizerName);
				$('#faculty_id').val(json.event[0].facultyId);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#eventId').val(json.event[0].eventId);
			}
		}
	});
}
function viewevent(eventId) {
	$.ajax({
		url : "event/" + eventId,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#viewEventName').text(json.event[0].eventName);
				$('#viewEventTypeID').text(json.event[0].eventTypeId);
				$('#viewEventStartDate').text(json.event[0].eventStartDate);
				$('#viewEventEndDate').text(json.event[0].eventEndDate);
				$('#viewEventDescription').text(json.event[0].eventDescription);
				$('#viewAddress').html(json.event[0].eventStreet1+",<br/>"+json.event[0].eventStreet2+",<br/>"+json.event[0].eventCity+","+json.event[0].eventState+"-"+json.event[0].eventPincode);
				$('#viewOrganizerName').text(json.event[0].eventOrganizerName);
				$('#viewFacultyID').text(json.event[0].facultyId);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tabView').addClass("active");
			}
		}
	});
}
