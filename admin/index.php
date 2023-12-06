<?php
session_start();
include 'connection.php';

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}

// SQL query to calculate the sum of desired_markup, manufacturer_profit, creator_profit, and marketplace_price
$sqlA = "SELECT
            SUM(desired_markup) AS total_desired_markup,
            SUM(manufacturer_profit) AS total_manufacturer_profit,
            SUM(creator_profit) AS total_creator_profit,
            SUM(marketplace_price) AS total_marketplace_price
        FROM
            orders
        WHERE
            is_canceled != 1 AND is_pending !=1    
        ";
$resultA = $conn->query($sqlA);

if ($resultA) {
    $rowA = $resultA->fetch_assoc();
    $totalDesiredMarkup = $rowA['total_desired_markup'];
    $totalManufacturerProfit = $rowA['total_manufacturer_profit'];
    $totalCreatorProfit = $rowA['total_creator_profit'];
    $totalMarketplacePrice = $rowA['total_marketplace_price'];
}

// SQL query to count the rows in the table
$sqlB = "SELECT COUNT(*) AS total_count FROM published_built_games";
$resultB = $conn->query($sqlB);
if ($resultB) {
    $rowB = $resultB->fetch_assoc();
    $published_games_total_count = $rowB['total_count'];
}

// SQL query to count the rows in the table
$sqlC = "SELECT COUNT(*) AS total_count FROM users";
$resultC = $conn->query($sqlC);
if ($resultC) {
    $rowC = $resultC->fetch_assoc();
    $users_total_count = $rowC['total_count'];
}

// SQL query to count the rows in the table
$sqlD = "SELECT COUNT(*) AS total_count FROM orders WHERE is_pending != 1 AND is_canceled !=1";
$resultD = $conn->query($sqlD);
if ($resultD) {
    $rowD = $resultD->fetch_assoc();
    $orders_total_count = $rowD['total_count'];
}

$sqlBuiltGames = "SELECT COUNT(built_game_id) AS total_built_games FROM built_games";
$sqlPublishedGames = "SELECT COUNT(published_game_id) AS total_published_games FROM published_built_games";
$resultBuiltGames = $conn->query($sqlBuiltGames);
$resultPublishedGames = $conn->query($sqlPublishedGames);

if ($resultBuiltGames && $resultPublishedGames) {
    $rowBuiltGames = $resultBuiltGames->fetch_assoc();
    $rowPublishedGames = $resultPublishedGames->fetch_assoc();

    $totalBuiltGames = $rowBuiltGames['total_built_games'];
    $totalPublishedGames = $rowPublishedGames['total_published_games'];
}

// Query to count the total number of rows with added_component_id
$sqlTotalComponents = "SELECT COUNT(*) AS total_components
                       FROM orders
                       WHERE in_production = 1
                       AND added_component_id IS NOT NULL";
$resultTotalComponents = $conn->query($sqlTotalComponents);
$rowTotalComponents = $resultTotalComponents->fetch_assoc();
$total_component_produced = $rowTotalComponents['total_components'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Dashboard </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="./css/style.css?<?php echo time(); ?>" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/orders_count.css'; ?>
    </style>
</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">

                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text muted">Profit from Published Games</div>
                                    <div class="stat-digit">&#8369;<?php echo number_format($totalManufacturerProfit, 2) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">STKR Players
                                        <!-- (<?php echo $users_total_count ?>) Earnings -->
                                    </div>
                                    <div class="stat-digit">
                                        <!-- <?php echo $totalManufacturerProfit ?> -->
                                        <?php echo $users_total_count ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-flag text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Published Games</div>
                                    <div class="stat-digit"><?php echo $published_games_total_count ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-check-to-slot text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Completed Orders</div>
                                    <div class="stat-digit"><?php echo $orders_total_count ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="myBarChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="card">

                            <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                                <canvas id="pieChart"></canvas>
                            </div>


                            <div class="card text-center">
                                <ul class="widget-line-list m-b-15">
                                    <li class="border-right"> <?php echo $totalPublishedGames ?>
                                        <br>
                                        <span class="text-success">Published Games</span>
                                    </li>
                                    <li><?php echo $totalBuiltGames ?>
                                        <br><span class="text-danger">Games Not Published</span>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <!-- BEST SELLER TABLE -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Best Selling Published Games</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="bestSeller" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Published Game Title</th>
                                                <th>Published Game ID</th>
                                                <th>Category</th>
                                                <th>Cost</th>
                                                <th>Marketplace Price</th>
                                                <th>Manufacturer's Profit</th>
                                                <th>Creator's Profit</th>
                                                <th>Creator/User ID</th>
                                                <th>Status</th>
                                                <th>Number of Purchases</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>

                        <!-- Users TABLE -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">STKR Players</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="usersTable" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>User ID</th>
                                                <th>Username</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Completed Orders</th>
                                                <th>Orders Canceled</th>
                                                <th>Published Games</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>


                        <!-- Published -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Published Games</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="publishedTable" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Published Game ID</th>
                                                <th>Game Name</th>
                                                <th>Category</th>
                                                <th>Published Date</th>
                                                <th>Creator/User ID</th>
                                                <th>Cost</th>
                                                <th>Marketplace Price</th>
                                                <th>Manufacturer's Profit</th>
                                                <th>Creator's Profit</th>
                                                <th>Status</th>
                                                <th>Number of Purchases</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>




            </div>
        </div>



    </div>


    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {

            <?php include 'html/count_orders.php'; ?>

            $('#bestPublished').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_published.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "game_count"
                    },

                ]
            });




            $('#bestEarnings').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_earnings.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "earnings"
                    },

                ]
            });




            $('#publishedTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_published_games.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "number"
                    },
                    {
                        "data": "id"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "published_date"
                    },
                    {
                        "data": "creator"
                    },
                    {
                        "data": "cost"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "manufacturer_profit"
                    },
                    {
                        "data": "creator_profit"
                    },

                    {
                        "data": "status"
                    },
                    {
                        "data": "frequency"
                    },
                    {
                        "data": "action"
                    },

                ],

            });





            $('#bestSeller').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_seller.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title"
                    }, {
                        "data": "id"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "cost"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "manufacturer_profit"
                    },
                    {
                        "data": "creator_profit"
                    },
                    {
                        "data": "creator"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "frequency"
                    },
                    {
                        "data": "action"
                    },

                ],
                // Order by the 'frequency' column in descending order (you can change 'desc' to 'asc' for ascending order)
                order: [
                    [9, 'desc']
                ],

            });




            $('#usersTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_users.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "number"
                    },
                    {
                        "data": "id"
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "firstname"
                    },
                    {
                        "data": "lastname"
                    },
                    {
                        "data": "phone_number"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "completed_orders"
                    },
                    {
                        "data": "orders_canceled"
                    },
                    {
                        "data": "published_games"
                    },
                    {
                        "data": "status"
                    },

                ],

            });







            $('#bestOrders').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_order.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "spent"
                    },
                    {
                        "data": "orders"
                    },
                ]
            });




            // Load JSON data
            $.getJSON('admin_json_built_vs_published_chart.php', function(data) {
                var labels = [];
                var values = [];

                // Extract labels and values from JSON
                data.forEach(function(item) {
                    labels.push(item.label);
                    values.push(item.value);
                });

                // Create a pie chart
                var ctx = document.getElementById('pieChart').getContext('2d');
                var pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                            ],
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    },
                });
            });




            // Get the canvas element
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var peso_sign = '₱';

            $.getJSON('admin_monthly_manufacturer_earning.php', function(data) {
                // Define chart data using JSON data
                var chartData = {
                    labels: data.labels,
                    datasets: [{
                        label: 'Profit on Published Games',
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Define chart options
                var options = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };

                // Create the bar chart
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: options
                });
            });




        });
    </script>

</body>

</html>