@extends('admin')

@section('pageContents')
	<h2 class="text-center">Users</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-success" onclick="addUserModal()">Add user</button>
			</div>
		</div>
	</div>
	<div class="container">
		<table id="grid"></table>
		<div id="gridPager"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	            <b>Legend</b>
	        </div>
	        <div class="col-md-3">
	            <div class="legendBox" style="background: #d9534f; color: #000">
	               	User banned
	            </div>
	        </div>
	        <div class="col-md-3">
	            <div class="legendBox" style="background: #5cb85c; color: #000">
	                User active
	            </div>
	        </div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" id="addUserModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add user</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="fullname" class="control-label">Fullname</label>
						<input id="fullname" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="username" class="control-label">Username</label>
						<input id="username" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="email" class="control-label">Email</label>
						<input id="email" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input id="password" type="password" class="form-control" required/>
					</div>
					<div class="checkbox">
					    <label>
							<input id="is_admin" type="checkbox"> Is admin
					    </label>
				  	</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="addUser()">Add user</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('pageSpecificScripts')
	<script type="text/javascript" src="/js/app/users.js"></script>
@stop
