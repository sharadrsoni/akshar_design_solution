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
					branchCode:{
						required : true,
						maxlength:100,
						lettersonly:true,
					},
					branch_name : {
						
						required : true,
						lettersonly:true,
						minlength : 3,
						maxlength:100,
					},
					conatct_no : {
						required : true,
						minlength:10,
						maxlength:10,
						digits:true,
					},
					street_1 : {
						minlength : 4,
						required : true,
						maxlength:100,
					},
					street_2 : {
						minlength : 4,
						maxlength:100,
						required : true,
					},
					stateid : {
						required : true
					},
					cityid : {
						required : true,
					},
					pin_code : {
						required : true,
						minlength:6,
						maxlength:6,
						digits:true,
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
		init_google : function() {
			var marker = null;
			var map = new GMaps({
				div : '#gmap_geocoding',
				lat : -12.043333,
				lng : -77.028333
			});

			GMaps.on('click', map.map, function(event) {
				$("#latitude").val(event.latLng.lat());
				$("#longitude").val(event.latLng.lng());
				if (marker) {
					marker.setMap(null);
				}
				marker = map.addMarker({
					lat : event.latLng.lat(),
					lng : event.latLng.lng()
				});
			});

			var handleAction = function() {
				var text = $.trim($('#gmap_geocoding_address').val());
				GMaps.geocode({
					address : text,
					callback : function(results, status) {
						if (status == 'OK') {
							var latlng = results[0].geometry.location;
							map.setCenter(latlng.lat(), latlng.lng());
							if (marker) {
								marker.setMap(null);
							}
							marker = map.addMarker({
								lat : latlng.lat(),
								lng : latlng.lng()
							});
							$("#latitude").val(latlng.lat());
							$("#longitude").val(latlng.lng());
							App.scrollTo($('#gmap_geocoding'));
						}
					}
				});
			};

			$("#gmap_geocoding_address").keypress(function(e) {
				var keycode = (e.keyCode ? e.keyCode : e.which);
				if (keycode == '13') {
					e.preventDefault();
					handleAction();
				}
			});
		},
		init_uijquery : function() {
			/*$('#tablink2').click(function(e) {
			 e.preventDefault();
			 $(this).tab('show');
			 Branch.init_google();
			 });*/
			$("#loadmap").click(function() {
				Branch.init_google();
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

			$("#tablink2").click(function() {
				$('#branchCode').val(0);
				$('#branch_name').val("");
				$('#conatct_no').val("");
				$('#street_1').val("");
				$('#street_2').val("");
				$("#stateid").select2("val", 0);
				$("#cityid").select2("val", 0);
				$('#pin_code').val("");
				$('#longitude').val("");
				$('#latitude').val("");
				$("#submitBranch").text("Add Branch");
				$('.alert-error', $('#form_branch')).hide();
				$("#form_branch").validate().resetForm();
				$(".error").removeClass("error");
				$(".success").removeClass("success");
			});
		}
	};
}();
function viewbranch(branchCode) {
	$.ajax({
		url : "branch/" + branchCode,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				alert();
				//$("#ViewBatch").attr("style", "display");
				//App.scrollTo($('#ViewBatch'));
				//$('#view_branch_name').text(json.branch[0].branchName);
				//$('#view_conatct_no').text(json.branch[0].branchContactNumber);
				//$('#view_address').html(json.branch[0].branchStreet1 + "<Br/>" + json.branch[0].branchStreet2 + "<Br/>" + json.branch[0].branchCity + ", " + json.branch[0].branchState + "<Br/>" + json.branch[0].branchPincode);
				//$('#viewstreet_2').text();
				// $('#viewstate').text();
				//$('#viewcity').text();
				//$('#viewpin_code').text();
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tabView').addClass("active");
			}
		}
	});
}

function updatebranch(branchCode) {
	$.ajax({
		url : "branch/" + branchCode,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$('#branchCode').val(json.branch.branchCode);
				$('#branchCode').attr("readonly","readonly");
				$('#branch_name').val(json.branch.branchName);
				$('#conatct_no').val(json.branch.branchContactNumber);
				$('#street_1').val(json.branch.branchStreet1);
				$('#street_2').val(json.branch.branchStreet2);
				$("#stateid").select2("val",json.branch.stateId);
				$("#stateid").change();
				$("#cityid").select2("val",json.branch.cityId);
				$('#pin_code').val(json.branch.branchPincode);
				$('#longitude').val(json.branch.branchLongitude);
				$('#latitude').val(json.branch.branchLatitude);
				$('#tablink1').parent().removeClass("active");
				$('#tab1').removeClass("active");
				$('#tab2').addClass("active");
				$("#submitBranch").text("Update Branch");
				map = Branch.init_google();
			}
		}
	});
}

