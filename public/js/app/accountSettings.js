function changePassword() {
	$('#changePassModal').modal('show');
}

function doChangePassword() {
	if($('#password').val() != $('#password_confirmation').val()) {
		alert("Passwords do not match!");
		return;
	}

	$.ajax({
		url: '/api/changeUserData',
		type: 'POST',
		dataType: 'JSON',
		data: {
			password: $('#password').val(),
			password_confirmation: $('#password_confirmation').val()
		},
		success: function(response) {
			if(response.success == 1) {
				toastr.success("Password changed successfully!");
				$('#changePassModal').modal('hide');
				$('#password').val("");
				$('#password_confirmation').val("");
			} else {
				toastr.error(response.message);
			}
		}
	});
}
