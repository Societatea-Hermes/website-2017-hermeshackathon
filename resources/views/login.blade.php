@extends('template')

@section('mainPage')
<h2 class="text-center">Login</h2>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form onsubmit="doLogin();return false;">
				<div class="form-group">
					<label for="username" class="control-label">Username</label>
					<div class="input-group">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input id="username" type="text" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Password</label>
					<div class="input-group">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input id="password" type="password" class="form-control" required/>
					</div>
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>
		</div>
	</div>
</div>
@stop

@section('scripts')
	<script src="/js/app/login.js"></script>
@stop