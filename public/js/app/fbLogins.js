var grid_container = "#grid";
var grid_pager = "#gridPager";

$(function(){
	loadSubscribersGrid();		
});

function loadSubscribersGrid() {
    var params = {};
    params.postData = {}

    params.url = "/api/getFacebookLoginsForGrid";
    params.datatype = "json";
    params.mtype = 'GET';
    params.styleUI = 'Bootstrap';
    params.autowidth = true;
    params.height = 'auto';
    params.rownumbers = true;
    params.shrinkToFit = true;
    params.colNames = [
        'Full name',
        'Facebook Id',
        'Email',
        'Last login date'
    ];
    params.colModel = [
        {
            name: 'fullname',
            index: 'fullname',
            width: 200
        }, {
            name: 'fb_id',
            index: 'fb_id',
            width: 200
        }, {
            name: 'email',
            index: 'email',
            sortable: false,
            width: 200
        }, {
            name: 'updated_at',
            index: 'updated_at',
            width: 200
        }
    ];
    params.rowNum = 25;
    params.rowList = [10, 25, 50, 75, 100, 150];
    params.pager = grid_pager;
    params.sortname = 'fullname';
    params.sortorder = 'ASC';
    params.viewrecords = true;
    params.caption = "Facebook logins";

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

    jQuery(grid_container).jqGrid('setPostData', object);
    jQuery(grid_container).trigger("reloadGrid");
}

function clearFilters() {
	searchGrid();
}
