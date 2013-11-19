var SearchManage = function() {
	return {
		init_uijquery : function() {
			$("#searchUser").keyup(function() {
				$("#searchData").html("");
				$("#tblSearch").attr("style", "display:none");
				if ($('#searchUser').val() != '') {
					$.ajax({
						url : "../ajax_manager/search/" + $("#searchUser").val(),
						dataType : 'json',
						async : false,
						success : function(json) {
							if (json) {
								if (json.length > 0) {
									$("#tblSearch").attr("style", "display");
									$.each(json, function(i, item) {
										$('#searchData').append("<tr><td><img src='assets/img/avatar1.jpg' /></td><td class='hidden-phone'>" + item.userId + "</td><td>" + item.userFirstName + " " + item.userMiddleName + " " + item.userLastName + "</td><td class='hidden-phone'>" + item.userJoiningDate + "</td><td class='hidden-phone'>" + item.userId + "</td><td><span class='label label-success'>Approved</span></td><td><a class='btn mini red-stripe' href=''>View</a></td></tr>");
									});
								}
							}
						}
					});
				}
			});
		}
	};
}();
