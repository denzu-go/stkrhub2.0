    $("#is_pending_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'is_pending',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });


    $("#in_production_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'in_production',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#to_ship_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'to_ship',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });
    
    $("#to_deliver_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'to_deliver',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#is_received_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'is_received',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#is_canceled_count").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_orders.php",
            data: {
                passed_status: 'is_canceled',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });


    $("#games_pending_approval_table").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_pending_approval.php",
            data: {
                passed_status: 'games_pending_approval',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });


    $("#pending_details_request_table").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_pending_approval.php",
            data: {
                passed_status: 'pending_details_request',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#edit_published_game_requests_table").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_pending_approval.php",
            data: {
                passed_status: 'edit_published_game_requests',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#cashout_requests_table").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_pending_approval.php",
            data: {
                passed_status: 'cashout_requests',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });

    $("#comment_report_table").DataTable({
        searching: false,
        info: false,
        paging: false,
        ordering: false,
        ajax: {
            url: "json_count_pending_approval.php",
            data: {
                passed_status: 'comment_report',
            },
            dataSrc: "",
        },
        columns: [{
            data: "cart_count",
        }],
    });