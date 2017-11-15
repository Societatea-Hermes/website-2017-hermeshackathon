var grid_container = "#grid";
var grid_pager = "#gridPager";

var currentEvent = 0;
var currentArticle = 0;
var currentEventForArticle = 0;

$(function(){
	loadEventsGrid();
    initCalendars();	
});

function initCalendars() {
    $( "#date" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
}

function loadEventsGrid() {
    var params = {};
    params.postData = {}

    params.url = "/api/getEventsForGrid";
    params.datatype = "json";
    params.mtype = 'GET';
    params.styleUI = 'Bootstrap';
    params.autowidth = true;
    params.height = 'auto';
    params.rownumbers = true;
    params.shrinkToFit = true;
    params.colNames = [
        'Actions',
        'Title',
        'Date-Time',
        'Location'
    ];
    params.colModel = [
        {
            name: 'actions',
            index: 'actions',
            sortable: false,
            width: 50
        }, {
            name: 'title',
            index: 'title',
            width: 200
        }, {
            name: 'datetime',
            index: 'datetime',
            width: 200
        }, {
            name: 'location_text',
            index: 'location_text',
            width: 200
        }
    ];
    params.rowNum = 25;
    params.rowList = [10, 25, 50, 75, 100, 150];
    params.pager = grid_pager;
    params.sortname = 'title';
    params.sortorder = 'ASC';
    params.viewrecords = true;
    params.caption = "Events";

    params.subGrid = true;

    params.subGridRowExpanded = function(subgridDivID, rowID) {
        onEventSubGridRowExpanded(subgridDivID, rowID);
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

function onEventSubGridRowExpanded(subgridDivID, rowID) {
    addArticlesSubgrid(subgridDivID, rowID);
}

function addArticlesSubgrid(subgridDivID, rowID) {
    var subgridTableID = subgridDivID + "_articles";
    var oldGridId = subgridDivID;
    jQuery("#" + subgridDivID).html('');
    jQuery("#" + subgridDivID).attr('style', 'margin: 4px;');
    jQuery("#" + subgridDivID).append("<div class='row' style='margin-right: 0px'><div class='col-md-12'><button class='btn btn-success' onclick='showArticleModal(\""+rowID+"\")'>Add article</button></div><div class='col-md-12'><center><table id='" + subgridTableID + "'></table></center></div></div>");
    jQuery("#" + subgridTableID).jqGrid({
        url: '/api/getArticlesForGrid',
        caption: "Articles",
        datatype: "json",
        mtype: 'GET',
        autowidth: true,
        height: 'auto',
        styleUI: 'Bootstrap',
        rownumbers: true,
        shrinkToFit: true,
        postData: {
            id: rowID,
            rows: 10000,
        },
        colNames: [
            'Actions',
            'Article name',
            'Added by',
            'Date added'
        ],
        colModel: [
            {
                name: 'actions',
                index: 'actions',
                sortable: false,
                width: 60
            }, {
                name: 'name',
                index: 'name',
                sortable: false,
                width: 200
            }, {
                name: 'fullname',
                index: 'fullname',
                sortable: false,
                width: 345
            }, {
                name: 'created_at',
                index: 'created_at',
                sortable: false,
                width: 345
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

function addEventModal() {
    $('#addEventModal').modal('show');
}

function addEvent() {
    $.ajax({
        url: '/api/addEditEvent',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: currentEvent,
            title: $('#title').val(),
            description: $('#description').val(),
            type: $('#type').val(),
            date: $('#date').val(),
            time: $('#time').val(),
            location: $('#location').val()
        },
        success: function(response) {
            if(response.success == 1) {
                toastr.success('Event added / modified successfully!');
                searchGrid();
                clearModalFields();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            var messages = "";
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function(key, val) {
                $.each(val, function(key2, val2) {
                    messages += val2+"\n";
                });
            });
            toastr.error("The following errors occoured:"+messages);
        }
    });
}

function clearModalFields() {
    currentEvent = 0;
    $('#title').val("");
    $('#description').val("");
    $('#type').val("");
    $('#date').val("");
    $('#time').val("");
    $('#location').val("");
    $('#addEventModal').modal('hide');
}

function editEvent(id) {
    currentEvent = id;
    $.ajax({
        url: '/api/getEventData',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(response) {
            $('#title').val(response.title);
            $('#description').val(response.description);
            $('#type').val(response.type);
            $('#date').val(response.date);
            $('#time').val(response.time);
            $('#location').val(response.location_text);
            addEventModal();
        }

    })
}

function showArticleModal(id) {
    currentEventForArticle = id;
    $('#addArticleModal').modal('show');
}

function clearArticleModalFields() {
    currentEventForArticle = 0;
    currentArticle = 0;
    $('#addArticleModal').modal('hide');
    $('#artTitle').val("");
    $('#content').val("");
}

function addArticle() {
    $.ajax({
        url: '/api/addEditArticle',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: currentArticle,
            title: $('#artTitle').val(),
            content: $('#content').val(),
            event_id: currentEventForArticle
        },
        success: function(response) {
            if(response.success == 1) {
                toastr.success('Article added / modified successfully!');
                searchGrid();
                clearArticleModalFields();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            var messages = "";
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function(key, val) {
                $.each(val, function(key2, val2) {
                    messages += val2+"\n";
                });
            });
            toastr.error("The following errors occoured:"+messages);
        }
    });
}

function editArticle(id) {
    currentArticle = id;
    $.ajax({
        url: '/api/getArticleData',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(response) {
            $('#artTitle').val(response.title);
            $('#content').val(response.content);
            showArticleModal(response.event_id);
        }

    })
}

function editEventPicture(id) {
    currentEvent = id;
    $('#editEventPhoto').modal('show');
}

/**
 * File upload handler for avatar
 * @author Flaviu Porutiu (flaviu@glitch.ro)
 */
var client = new XMLHttpRequest();  
function upload() {
    var file = document.getElementById("logoToUpload");
     
    /* Create a FormData instance */
    var formData = new FormData();
    
    /* Add the file */ 
    formData.append("logo", file.files[0]);
    formData.append("id", currentEvent);

    client.open("post", "/api/editEventPicture", true);
    //client.setRequestHeader("Content-Type", "multipart/form-data");
    client.send(formData);  /* Send to server */ 
}
     
/* Check the response status */  
client.onreadystatechange = function() {
    if (client.readyState == 4 && client.status == 200) {
        var response = client.response;

        if(response == 1) {
            $('#editEventPhoto').modal('hide');
            toastr.success('Uploaded successfully');
            currentEvent = 0;
        } else {
            toastr.error('There was an error!');
        }
    }
}
