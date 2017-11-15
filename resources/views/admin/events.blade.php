@extends('admin')

@section('pageContents')
	<h2 class="text-center">Events</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-success" onclick="addEventModal()">Add event</button>
			</div>
		</div>
	</div>
	<div class="container">
		<table id="grid"></table>
		<div id="gridPager"></div>
	</div>

	<div class="modal fade" tabindex="-1" id="addEventModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add / edit event</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<textarea id="description" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="type" class="control-label">Type</label>
						<select id="type" class="form-control" required>
							<option value="">--Choose--</option>
							<option value="1">Training</option>
							<option value="2">Workshop</option>
							<option value="3">Party</option>
						</select>
					</div>
					<div class="form-group">
						<label for="date" class="control-label">Date</label>
						<input id="date" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="time" class="control-label">Time (format hh:mm)</label>
						<input id="time" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="location" class="control-label">Location</label>
						<input id="location" type="text" class="form-control" required/>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="clearModalFields()">Close</button>
					<button type="button" class="btn btn-primary" onclick="addEvent()">Add / edit event</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" tabindex="-1" id="addArticleModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add / edit article</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="artTitle" class="control-label">Title</label>
						<input id="artTitle" type="text" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content</label>
						<textarea id="content" class="form-control" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="clearArticleModalFields()">Close</button>
					<button type="button" class="btn btn-primary" onclick="addArticle()">Add / edit article</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" tabindex="-1" id="editEventPhoto" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit event photo</h4>
				</div>
				<div class="modal-body">
					<button class="btn btn-success" onclick="document.getElementById('logoToUpload').click()">Change event photo</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<form method="post" name="uploader" id="frmUpload" enctype="multipart/form-data">
    	<input type="file" name="logo" id="logoToUpload" style="visibility: hidden" onchange="upload()">
	</form>
@stop

@section('pageSpecificScripts')
	<script type="text/javascript" src="/js/app/events.js"></script>
@stop
