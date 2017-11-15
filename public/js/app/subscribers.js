var grid_container = "#grid";
var grid_pager = "#gridPager";

$(function(){
	initCalendars();		
	loadSubscribersGrid();		
});

function initCalendars() {
	$( "#dFrom, #dTo" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
}

function loadSubscribersGrid() {
    var params = {};
    params.postData = {}

    params.url = "/api/getSubscribersForGrid";
    params.datatype = "json";
    params.mtype = 'GET';
    params.styleUI = 'Bootstrap';
    params.autowidth = true;
    params.height = 'auto';
    params.rownumbers = true;
    params.shrinkToFit = true;
    params.colNames = [
        'Email',
        'Subscribed on'
    ];
    params.colModel = [
        {
            name: 'email',
            index: 'email',
            width: 200
        }, {
            name: 'created_at',
            index: 'created_at',
            width: 200
        }
    ];
    params.rowNum = 25;
    params.rowList = [10, 25, 50, 75, 100, 150];
    params.pager = grid_pager;
    params.sortname = 'email';
    params.sortorder = 'ASC';
    params.viewrecords = true;
    params.caption = "Subscribers";

    jQuery(grid_container).jqGrid(params);

    jQuery(grid_container).jqGrid('navGrid', grid_pager, {
        refresh: true,
        edit: false,
        add: false,
        del: false,
        search: false
    });
}

function searchGrid() {
	var object = {};
	object.email = $('#email').val();
	object.dFrom = $('#dFrom').val();
	object.dTo = $('#dTo').val();

    jQuery(grid_container).jqGrid('setPostData', object);
    jQuery(grid_container).trigger("reloadGrid");
}

function clearFilters() {
	$('#email').val('');
	$('#dFrom').val('');
	$('#dTo').val('');

	searchGrid();
}
