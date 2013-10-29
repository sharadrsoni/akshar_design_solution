var CourseCategoryTable = function () {
    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            // begin tblCourseCategory table
            $('#tblCourseCategory').dataTable({
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  { "bSortable": false }
                ],
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#tblCourseCategory .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                });
                jQuery.uniform.update(set);
            });

            jQuery('#tblCourseCategory .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#tblCourseCategory .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            //jQuery('#tblCourseCategory .dataTables_length select').select2(); // initialize select2 dropdown
        }
    };
}();

var CourseCategoryValidation = function() {
	var handleValidation1 = function() {
		// for more info visit the official plugin documentation:
		// http://docs.jquery.com/Plugins/Validation
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
				error1.hide();
			}
		});
	};
	return {
		//main function to initiate the module
		init : function() {

			handleValidation1();

		}
	};
}();