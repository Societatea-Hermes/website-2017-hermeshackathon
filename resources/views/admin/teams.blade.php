@extends('admin')

@section('pageContents')
	<h2 class="text-center">Teams</h2>
	<div class="container">
		<table id="grid"></table>
		<div id="gridPager"></div>
	</div>
@stop

@section('pageSpecificScripts')
	<script type="text/javascript" src="/js/app/teams.js"></script>
@stop
