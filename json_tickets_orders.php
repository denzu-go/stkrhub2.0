<?php

include "connection.php";
$user_id = $_GET['user_id'];

$data = array();

$sqlUniqueOrderDates = "SELECT * FROM tickets WHERE user_id = $user_id ORDER BY created_at DESC";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($fetchedD = $queryUniqueOrderDates->fetch_assoc()) {

    $ticket_id = $fetchedD['ticket_id'];

    $created_at = $fetchedD['created_at'];
    $formatted_date = date('M. d, Y h:i A', strtotime($created_at));

    $game_id = $fetchedD['game_id'];
    $is_approved = $fetchedD['is_approved'];
    $is_denied = $fetchedD['is_denied'];

    $is_at_cart = $fetchedD['is_at_cart'];
    $is_purchased = $fetchedD['is_purchased'];

    $is_accepted = $fetchedD['is_accepted'];
    $is_canceled = $fetchedD['is_canceled'];

    $total_price = $fetchedD['total_price'];
    $ticket_price = $fetchedD['ticket_price'];

    $sqlConstantBuiltG = "SELECT * FROM constants WHERE classification = 'thumbnail_ticket'";
    $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
    while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
        $constant_id = $fetchedConstantBuiltG['constant_id'];
        $image_path = $fetchedConstantBuiltG['image_path'];

        $img_src = $image_path;
    }

    if($is_approved){
        $status = 'Approved';
    } elseif($is_denied){
        $status = 'Denied';
    } else{
        $status = 'Undefined';
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
                                    <div class="mr-2">Ticket ID: ' . $ticket_id . '</div>
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
                                                                    <img class="image-mini" src="'.$img_src.'">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col overflow-hidden">
                                                            <div class="container" style="line-height: 17px;">
                                                                <div class="row mb-1">
                                                                    <span class=" d-inline-block text-truncate data-toggle="tooltip" title="" style="max-width: 500px; color: #e7e7e7">
                                                                        Created Game ID: '.$game_id.'
                                                                    </span>
                                                                </div>
                                                                
                                                                <div class="row mb-1">
                                                                    <span class="d-inline-block text-truncate" style="max-width: 500px;">
                                                                        Status: '.$status.'
                                                                    </span>
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <span class="small d-inline-block text-truncate" style="max-width: 500px;">
                                                                        Ticket
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3 pr-5">
                                                            <div class="container " style="line-height: 17px;">

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-0" style="color: #26d3e0">&#8369;'.$ticket_price.'</span>
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
