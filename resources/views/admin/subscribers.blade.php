@extends('admin')

@section('pageContents')
	<h2 class="text-center">Email subscribers</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-12 well">
				<h3>Filters</h3>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="email" class="control-label">Email</label>
							<input id="email" type="text" class="form-control"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="dFrom" class="control-label">Subscribed from</label>
							<input id="dFrom" type="text" class="form-control"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="dTo" class="control-label">Subscribed to</label>
							<input id="dTo" type="text" class="form-control"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-right">
						<button class="btn btn-success" onclick="searchGrid()">Filter</button>
						<button class="btn btn-danger" onclick="clearFilters()">Clear filters</button>
					</div>
				</div>
			</div> 	
		</div>
	</div>
	<div class="container">
		<table id="grid"></table>
		<div id="gridPager"></div>
	</div>
@stop

@section('pageSpecificScripts')
	<script type="text/javascript" src="/js/app/subscribers.js"></script>
@stop
