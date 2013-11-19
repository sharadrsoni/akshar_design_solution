var Course= function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblcity table
			$('#tblCourse').dataTable({
				"aoColumns" : [
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": false }
                ],
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

			jQuery('#tblCourse .group-checkable').change(function() {
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

			jQuery('#tblCourse .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblCourse .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblcity .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_course');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
                	courseCategory_id: {
                        required: true,
                    },
                    course_name: {
                        required: true,
                        alphanumeric:true,
                        maxlength:100,
                        minlength:2,
                    },
					courseCode: {
                        required: true,
                        alphanumeric:true,
                        maxlength:8,
                        minlength:2,
                    },
					course_duration: {
                        required: true,
                        number:true,
                        min:0,	
                    },
					material_id: {
                        required: true,
                     },
					total_books: {
                        required: true,
                        number:true,
                        min:0,
  
                    },
                    description:{
                    	 required: true,
                    	 minlength:5,
                    },
					opening_stock: {
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
				$('#course_name').val("");
				$('#courseCategory_id').val("");
				$('#courseCode').val("");
				$('#course_duration').val("");
				$('#total_books').val("");
				$('#description').val("");
				$("#submitCourse").text("Add Course");
				$('.alert-error', $('#form_course')).hide();
				$("#form_course").validate().resetForm();
				$(".error").removeClass("error");
				$(".success").removeClass("success");
			});
		}
	};
}();
function updateCourse(couseid) {
	$.ajax({
		url : "course/" + couseid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#courseCode').val(json.course.courseCode);
				$('#courseCode').attr("readonly","readonly");
				$('#course_name').val(json.course.courseName);
				$('#courseCategory_id').val(json.course.courseCategoryId);
				$('#course_duration').val(json.course.courseDuration);
				$('#total_books').val(json.course.courseMaterialTotalBooks);
				$('#description').val(json.course.courseDescription);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$("#submitCourse").text("Update Course");
			}
		}
	});
}
function viewcourse(courseCode) {
	$.ajax({
		url : "course/" + courseCode,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#viewCourseCode').text(json.course.courseCode);
				$('#viewCourseName').text(json.course.courseName);
				$('#viewCategory').html(json.course.courseCategoryName);
				$('#viewCourseDuration').text(json.course.courseDuration);
				$('#viewTotalBook').text(json.course.courseMaterialTotalBooks);
				$('#viewDescription').text(json.course.courseDescription);
				$('#ViewCourseImage').attr("src",json.course.coursePhotograph);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tabView').addClass("active");
			}
		}
	});
}