var grid_container = "#grid";
var grid_pager = "#gridPager";

$(function(){
	loadUsersGrid();		
});

function loadUsersGrid() {
    var params = {};
    params.postData = {}

    params.url = "/api/getUsersForGrid";
    params.datatype = "json";
    params.mtype = 'GET';
    params.styleUI = 'Bootstrap';
    params.autowidth = true;
    params.height = 'auto';
    params.rownumbers = true;
    params.shrinkToFit = true;
    params.colNames = [
        'Actions',
        'Name',
        'Username',
        'Email',
        'Is Admin',
        'is_locked'
    ];
    params.colModel = [
        {
            name: 'actions',
            index: 'actions',
            sortable: false,
            width: 200
        }, {
            name: 'fullname',
            index: 'fullname',
            width: 200
        }, {
            name: 'username',
            index: 'username',
            width: 200
        }, {
            name: 'email',
            index: 'email',
            width: 200
        }, {
            name: 'is_admin',
            index: 'is_admin',
            sortable: false,
            width: 200
        }, {
            name: 'is_locked',
            index: 'is_locked',
            sortable: false,
            hidden: true,
            width: 200
        }
    ];
    params.rowNum = 25;
    params.rowList = [10, 25, 50, 75, 100, 150];
    params.pager = grid_pager;
    params.sortname = 'fullname';
    params.sortorder = 'ASC';
    params.viewrecords = true;
    params.caption = "Users";

    params.rowattr = function (rd) {
        var row = rd.is_locked;
        if(row == 1) { // is locked..
            return {'style': "background: #d9534f; color: #000"}; // red
        }
        return {'style': "background: #5cb85c; color: #000"}; // green
    }

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

function addUserModal() {
   $('#addUserModal').modal('show'); 
}

function addUser() {
    $.ajax({
        url: '/api/addUser',
        type: 'POST',
        dataType: 'JSON',
        data: {
            fullname: $('#fullname').val(),
            username: $('#username').val(),
            password: $('#password').val(),
            email: $('#email').val(),
            is_admin: ($('#is_admin').is(':checked') ? 1 : 0)
        },
        success: function(response) {
            if(response.success == 1) {
                toastr.success('User added successfully!');
                searchGrid();
                $('#addUserModal').modal('hide'); 
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

function changeAdminStatus(id) {
    $.ajax({
        url: '/api/changeAdminStatus',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(response) {
            if(response.success == 1) {
                toastr.success('Admin status changed successfully!');
                searchGrid();
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

function changeUserStatus(id) {
    $.ajax({
        url: '/api/changeUserStatus',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(response) {
            if(response.success == 1) {
                toastr.success('Status changed successfully!');
                searchGrid();
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
