var CourseCategory = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblcity table
			$('#tblCourseCategory').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null,null],
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

			jQuery('#tblCourseCategory .group-checkable').change(function() {
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

			jQuery('#tblCourseCategory .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblCourseCategory .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblcity .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_coursecategory');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					coursecategory_name: {
                        minlength: 5,
                        required: true,
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
			$("#tablink2").click(function() {
				$('#coursecategory_name').val("");
				$('#coursecategoryId').val("");
				$('.alert-error', $('#form_coursecategory')).hide();
				$("#form_coursecategory").validate().resetForm();
  				$(".error").removeClass("error");
  				$(".success").removeClass("success");
			});
		}
	};
}();
function updatecoursecategory(oursecategoryid) {
	$.ajax({
		url : "coursecategory/" + oursecategoryid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#coursecategory_name').val(json.coursecategory[0].courseCategoryName);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#coursecategoryId').val(json.coursecategory[0].courseCategoryId);
			}
		}
	});
}