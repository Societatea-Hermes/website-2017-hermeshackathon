function doLogin() {
	$.ajax({
		url: '/api/login',
		type: 'POST',
		dataType: 'JSON',
		data: {
			username: $('#username').val(),
			password: $('#password').val()
		},
		success: function(response) {
			if(response.success == 1) {
				location.reload();
			} else {
				toastr.error(response.message);
			}
		}
	});
}