var Batch = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblEvent table
			$('#tblBatch').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null, null, null, null],
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

			jQuery('#tblBatch .group-checkable').change(function() {
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

			jQuery('#tblBatch .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblBatch .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblEvent .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_batch');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					course_id : {
						required : true,
					},
					faculty_id : {
						required : true,
					},
					start_date : {
						required : true,
					},
					strength : {
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
		},
		init_uijquery : function() {
			$("#start_date_datepicker input").datepicker({
				isRTL : App.isRTL()
			});
			$("#start_date_datepicker .add-on").click(function() {
				$("#start_date_datepicker input").datepicker("show");
			});
			if (!jQuery().clockface) {
				return;
			}

			$('.clockface_1').clockface();

			$('#clockface_2').clockface({
				format : 'HH:mm',
				trigger : 'manual'
			});

			$('#clockface_2_toggle').click(function(e) {
				e.stopPropagation();
				$('#clockface_2').clockface('toggle');
			});

			$('#clockface_2_modal').clockface({
				format : 'HH:mm',
				trigger : 'manual'
			});

			$('#clockface_2_modal_toggle').click(function(e) {
				e.stopPropagation();
				$('#clockface_2_modal').clockface('toggle');
			});

			$('.clockface_3').clockface({
				format : 'H:mm'
			}).clockface('show', '14:30');
			$('#btn_add_batch_timing').click(function() {
				if ($('#weekday').val() != "" && $('#weekday').val() != "Select..." && $('#start_time').val() != "" && $('#end_time').val() != "") {
					$('#lst_batch_timing').append("<tr class='odd gradeX'><td>" + $('#weekday option:selected').text() + "<input type='hidden' name='batch_timing[]' value='" + $('#weekday').val() + "'/></td><td class='hidden-480'>" + $('#start_time').val() + "<input type='hidden' name='batch_timing[]' value='" + $('#start_time').val() + "'/></td><td class='hidden-480'>" + $('#end_time').val() + "<input type='hidden' name='batch_timing[]' value='" + $('#end_time').val() + "'/></td><td><a onclick='removebatchtime(this)' class='btn red icn-only'><i class='icon-remove icon-white'></i></a></td></tr>");
				}
			});
		}
	};
}();

function removebatchtime(e) {
	$(e).parent().parent().remove();
}