var grid_container = "#grid";
var grid_pager = "#gridPager";

$(function(){
	loadSubscribersGrid();		
});

function loadSubscribersGrid() {
    var params = {};
    params.postData = {}

    params.url = "/api/getTeamsForGrid";
    params.datatype = "json";
    params.mtype = 'GET';
    params.styleUI = 'Bootstrap';
    params.autowidth = true;
    params.height = 'auto';
    params.rownumbers = true;
    params.shrinkToFit = true;
    params.colNames = [
        'Team name',
        'Techologies',
        'Link',
        'Created at',
        'Questions'
    ];
    params.colModel = [
        {
            name: 'name',
            index: 'name',
            width: 100
        }, {
            name: 'joke',
            index: 'joke',
            width: 200
        }, {
            name: 'theme',
            index: 'theme',
            width: 200
        }, {
            name: 'created_at',
            index: 'created_at',
            width: 100
        }, {
            name: 'questions',
            index: 'questions',
            width: 100
        }
    ];
    params.rowNum = 25;
    params.rowList = [10, 25, 50, 75, 100, 150];
    params.pager = grid_pager;
    params.sortname = 'name';
    params.sortorder = 'ASC';
    params.viewrecords = true;
    params.caption = "Teams";
    params.subGrid = true;

    params.subGridRowExpanded = function(subgridDivID, rowID) {
        onTeamSubGridRowExpanded(subgridDivID, rowID);
    };

    jQuery(grid_container).jqGrid(params);

    jQuery(grid_container).jqGrid('navGrid', grid_pager, {
        refresh: true,
        edit: false,
        add: false,
        del: false,
        search: false
    });
}

function onTeamSubGridRowExpanded(subgridDivID, rowID) {
    addMembersSubgrid(subgridDivID, rowID);
}

function addMembersSubgrid(subgridDivID, rowID) {
    var subgridTableID = subgridDivID + "_members";
        jQuery("#" + subgridDivID).html('');
        jQuery("#" + subgridDivID).attr('style', 'margin: 4px;');
        jQuery("#" + subgridDivID).append("<div class='row' style='margin-right: 0px'><div class='col-md-12'><center><table id='" + subgridTableID + "'></table></center></div></div>");
        jQuery("#" + subgridTableID).jqGrid({
            url: '/api/getTeamMembersForGrid',
            caption: "Membrii",
            datatype: "json",
            mtype: 'GET',
            styleUI: 'Bootstrap',
            autowidth: true,
            height: 'auto',
            rownumbers: true,
            shrinkToFit: true,
            postData: {
                team_id: rowID,
                rows: 10000,
            },
            colNames: [
                'Nume',
                'Email',
                'Nr telefon',
                'Team leader'
            ],
            colModel: [
                {
                    name: 'name',
                    index: 'name',
                    width: 200
                }, {
                    name: 'email',
                    index: 'email',
                    width: 150
                }, {
                    name: 'phone',
                    index: 'phone',
                    width: 150
                }, {
                    name: 'is_teamlead',
                    index: 'is_teamlead',
                    width: 150
                }
            ],
            viewrecords: true,
            rowNum: 10000
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
