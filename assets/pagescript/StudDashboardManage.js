var Batch = function() {
	return {
		init_uijquery : function() {
			$("#batch_name").change(function() {
				$.ajax({
					url : "ajax_manager/getbatchstudent/" + $("#batch_name").val(),
					dataType : 'json',
					async : true,
					success : function(json) {
						if (json) {
							$("#viewBatchName").text(json.batch_list[0].batchId);
							$("#viewCourseName").text(json.batch_list[0].courseName);
							$("#viewFacultyName").text(json.batch_list[0].userFirstName + " " + json.batch_list[0].userMiddleName + " " + json.batch_list[0].userLastName);
							arr_date = json.batch_list[0].batchStartDate.split('-');
							$("#viewStartDate").text(arr_date[2] + '-' + arr_date[1] + '-' + arr_date[0]);
							$("#viewDuration").text(json.batch_list[0].batchDuration);
							$('#viewWeekday1').text("");
							$('#viewWeekday2').text("");
							$('#viewWeekday3').text("");
							$('#viewWeekday4').text("");
							$('#viewWeekday5').text("");
							$('#viewWeekday6').text("");
							$('#viewWeekday7').text("");
							$.each(json.weekdays, function(i, item) {
								$('#viewWeekday' + item.batchTimingWeekday).text(item.batchTimingStartTime + " To " + item.batchTimingEndTime);
							});
						}
					}
				});
			});
		}
	};
}();

