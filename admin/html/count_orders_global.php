$("#in_production_count_table").DataTable({
searching: false,
info: false,
paging: false,
ordering: false,
ajax: {
url: "json_count_orders_global.php",
data: {
passed_status: passed_status
},
dataSrc: "",
},
columns: [{
data: "cart_count",
}],
});