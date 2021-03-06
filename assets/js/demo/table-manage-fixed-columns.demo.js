/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleDataTableFixedColumns = function(a) {
	"use strict";
    if ($('#data-table-fixed-columns').length !== 0) {
        $('#data-table-fixed-columns').DataTable({
            scrollY:        300,
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            fixedColumns:   true
            

        });
    }
};

var TableManageFixedColumns = function () {
	"use strict";
    return {
        //main function
        init: function (a) {
            handleDataTableFixedColumns(a);
        }
    };
}();