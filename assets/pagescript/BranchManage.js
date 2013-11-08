var Branch = function() {
	return {
		//main function to initiate the module
		init_table : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin tblBranch table
			$('#tblBranch').dataTable({
				"aoColumns" : [{
					"bSortable" : false
				}, null, {
					"bSortable" : false
				}, null],
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

			jQuery('#tblBranch .group-checkable').change(function() {
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

			jQuery('#tblBranch .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#tblBranch .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown
			//jQuery('#tblBranch .dataTables_length select').select2(); // initialize select2 dropdown
		},
		init_formvalidation : function() {
			var form1 = $('#form_branch');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					branch_name : {
						minlength : 5,
						required : true
					},
					conatct_no:{
						required : true,
					},
					street_1 : {
						required : true,
					},
					street_2 : {
						required : true,
					},
					city : {
						required : true,
					},
					state : {
						required : true
					},
					pin_code : {
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
		init_google : function() {
			var map = new GMaps({
				div : '#gmap_geocoding',
				lat : -12.043333,
				lng : -77.028333
			});

			var handleAction = function() {
				var text = $.trim($('#gmap_geocoding_address').val());
				GMaps.geocode({
					address : text,
					callback : function(results, status) {
						if (status == 'OK') {
							var latlng = results[0].geometry.location;
							map.setCenter(latlng.lat(), latlng.lng());
							map.addMarker({
								lat : latlng.lat(),
								lng : latlng.lng()
							});
							App.scrollTo($('#gmap_geocoding'));
						}
					}
				});
			};
			$('#gmap_geocoding_btn').click(function(e) {
				e.preventDefault();
				handleAction();
			});

			$("#gmap_geocoding_address").keypress(function(e) {
				var keycode = (e.keyCode ? e.keyCode : e.which);
				if (keycode == '13') {
					e.preventDefault();
					handleAction();
				}
			});
		},
		init_uijquery : function() {
			$("#tablink2").click(function() {
				$('#branch_name').val("");
				$('#conatct_no').val("");
				$('#street_1').val("");
				$('#street_2').val("");
				$('#state option:nth(0)').attr("selected", "selected");
				$('#city option:nth(0)').attr("selected", "selected");
				$('#pin_code').val("");
				$('#longitude').val("");
				$('#latitude').val("");
				$('#branchId').val("");
			});
		}
	};
}();
function viewbranch(branchid) {
	$.ajax({
		url : "branch/" + branchid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				
			}
		}
	});
}

function updatebranch(branchid) {
	$.ajax({
		url : "branch/" + branchid,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#branch_name').val(json.branch[0].branchName);
				$('#conatct_no').val(json.branch[0].branchContactNumber);
				$('#street_1').val(json.branch[0].branchStreet1);
				$('#street_2').val(json.branch[0].branchStreet2);
				$('#state').val(json.branch[0].branchState);
				$('#city').val(json.branch[0].branchCity);
				$('#pin_code').val(json.branch[0].branchPincode);
				//$('#longitude').val(json.branch[0].longitude);
				//$('#latitude').val(json.branch[0].latitude);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$('#branchId').val(json.branch[0].branchId);
			}
		}
	});
}


