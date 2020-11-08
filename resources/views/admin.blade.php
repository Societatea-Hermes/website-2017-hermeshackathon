@extends('template')

@section('extraCss')
	<link rel="stylesheet" href="/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="/grid/css/ui.jqgrid-bootstrap.css">
@stop

@section('mainPage')
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Hackathon Admin page</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/adm1n/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="/adm1n/subscribers"><span class="glyphicon glyphicon-envelope"></span> Newsletter subscribers</a></li>
					<li><a href="/adm1n/events">Events</a></li>
					<li><a href="/adm1n/facebookLogins"><i class="icon-facebook"></i> Facebook Logins</a></li>
					<li><a href="/adm1n/teams"><span class="glyphicon glyphicon-tags"></span> Teams</a></li>
					@if($user['is_admin'] === 1)
						<li><a href="/adm1n/users"><span class="glyphicon glyphicon-user"></span> Users</a></li>
					@endif
					<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{$user['fullname']}} <span class="caret"></span></a>
				        <ul class="dropdown-menu">
							<li><a href="/adm1n/accountSettings"><span class="glyphicon glyphicon-cog"></span> Setari</a></li>
							<li><a href="/api/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
				        </ul>
				    </li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	@yield('pageContents')
@stop

@section('scripts')
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script type="text/javascript" src="/grid/js/i18n/grid.locale-ro.js"></script>
	<script type="text/javascript" src="/grid/js/jquery.jqGrid.min.js"></script>
	<script type="text/javascript" src="/grid/plugins/grid.postext.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	@yield('pageSpecificScripts')
@stop