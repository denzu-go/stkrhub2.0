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