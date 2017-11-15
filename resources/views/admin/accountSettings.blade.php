@extends('admin')

@section('pageContents')
	<h2 class="text-center">Account settings</h2>
	<div class="container">
		<div class="row well">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>Username</th>
						<td>{{$user['username']}}</td>
						<td class="text-right"><button class="btn btn-raised btn-success" disabled>Change</button></td>
					</tr>
					<tr>
						<th>Full name</th>
						<td>{{$user['fullname']}}</td>
						<td class="text-right"><button class="btn btn-raised btn-success" disabled>Change</button></td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$user['email']}}</td>
						<td class="text-right"><button class="btn btn-raised btn-success" disabled>Change</button></td>
					</tr>
					<tr>
						<th>Password</th>
						<td colspan="2" class="text-right"><button class="btn btn-raised btn-success" onclick="changePassword()">Change</button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" id="changePassModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Change Password</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input id="password" type="password" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="password_confirmation" class="control-label">Password Confirmation</label>
						<input id="password_confirmation" type="password" class="form-control" required/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="doChangePassword()">Change password</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('pageSpecificScripts')
	<script type="text/javascript" src="/js/app/accountSettings.js"></script>
@stop
