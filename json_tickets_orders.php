<?php

include "connection.php";
$user_id = $_GET['user_id'];

$data = array();

$sqlUniqueOrderDates = "SELECT DISTINCT ticket_id FROM orders WHERE user_id = $user_id AND ticket_id IS NOT NULL ORDER BY order_date DESC";

$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $ticket_id = $row['ticket_id'];


    $sqlOrderDetails = "SELECT * FROM orders WHERE ticket_id = $ticket_id AND user_id = $user_id";

    $queryOrderDetails = $conn->query($sqlOrderDetails);
    while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
        $unique_order_group_id = $fetchedD['unique_order_group_id'];

        $order_date = $fetchedD['order_date'];
        $formatted_date = date('M. d, Y h:i A', strtotime($order_date));

        $is_pending = $fetchedD['is_pending'];
        $in_production = $fetchedD['in_production'];
        $to_ship = $fetchedD['to_ship'];
        $to_deliver = $fetchedD['to_deliver'];
        $is_received = $fetchedD['is_received'];
        $is_canceled = $fetchedD['is_canceled'];
        $is_completely_canceled = $fetchedD['is_completely_canceled'];
    }


    $item = '
            <div class="row">

                <div class="col">
                
                    <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #17172b; padding: 0.1rem;">
                
                        <div class="card-header py-1">
                            <div class="row p-0">
                
                                <div class="col-0 d-flex align-items-center">
                                    <i class="fa-regular fa-calendar-days"></i>&nbsp;' . $formatted_date . '
                                </div>
                
                                <div class="col-0 d-flex align-items-center ml-auto">
                                    <div class="mr-2">Status: status</div>
                                    <div class="mr-2">Order ID: ' . $unique_order_group_id . '</div>
                                </div>
                
                            </div>
                        </div>
                
                        <div class="card-body p-0" style="background-color: #272a4e;">
                            <div class="row d-flex justify-content-between align-items-center ">
                                <div class="col">';



        $item .= '
                                    <div class="container p-0 m-0" style="border-bottom: 2px solid #15172e;">

                                        <div class="row">

                                            <div class="col">

                                                <div class="card-body p-0" style="background-color: #272a4e;">
                                                    <div class="row d-flex justify-content-between align-items-center ">

                                                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                                                            <div class="container" style="height: 100%; width: 100%;">
                                                                <div class="image-mini-container mask1">
                                                                    <img class="image-mini" src="img/i7.jpg">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col overflow-hidden">
                                                            <div class="container" style="line-height: 17px;">
                                                                <div class="row mb-1">
                                                                    <span class="lead d-inline-block text-truncate data-toggle="tooltip" title="" style="max-width: 500px; color: #e7e7e7">
                                                                        title
                                                                    </span>
                                                                </div>
                                                                
                                                                <div class="row mb-1">
                                                                    <span class="d-inline-block text-truncate" style="max-width: 500px;">
                                                                        desc
                                                                    </span>
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <span class="small d-inline-block text-truncate" style="max-width: 500px;">
                                                                        class
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3 pr-5">
                                                            <div class="container " style="line-height: 17px;">

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-1" style="">Price: &#8369;price</span>
                                                                </div>

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-1" style="">Quantity: quanity</span>
                                                                </div>

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-0" style="color: #26d3e0">&#8369;total price</span>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>              


                                                    </div>
                                                </div>
                                                

                                            </div>

                                        </div>
                                    </div>
                                    ';


    $item .= '
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="background: rgb(39, 42, 78);
                        background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(21, 23, 46, 0.7) 100%);">

                            <div class="row">

                                
                                    
                    
                                </div>
                            </div>
                        </div>

                        

                    </div>
                
                </div>
            
            </div>
        
        ';



    $data[] = array(
        "item" => $item,
    );
}

echo json_encode($data);
