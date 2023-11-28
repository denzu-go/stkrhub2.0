<?php
include "connection.php";

$passed_status = $_GET['passed_status'];
$data = array();


if ($passed_status == 'games_pending_approval') {
    $sql = "SELECT COUNT(*) as count FROM games WHERE to_approve = 1";
    $icon = '<i class="fa-solid fa-dice"></i>';
    $title = 'Games Pending Approval';
} elseif ($passed_status == 'pending_details_request') {
    $sql = "SELECT COUNT(*) as count FROM pending_published_built_games WHERE is_visible = 1";
    $icon = '<i class="fa-solid fa-flag-checkered"></i>';
    $title = 'Publish Game Details Requests';
} elseif ($passed_status == 'edit_published_game_requests') {
    $sql = "SELECT COUNT(*) as count FROM pending_update_published_built_games";
    $icon = '<i class="fa-solid fa-font-awesome"></i>';
    $title = 'Edit Published Game Requests';
} elseif ($passed_status == 'cashout_requests') {
    $sql = "SELECT COUNT(*) as count FROM wallet_transactions WHERE status = 'pending'";
    $icon = '<i class="fa-solid fa-money-bill-transfer"></i>';
    $title = 'Cashout Requests';
} elseif ($passed_status == 'comment_report') {
    $sql = "SELECT COUNT(*) as count FROM ratings WHERE is_reported = 1";
    $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
    $title = 'Reported Comments';
} else {
    $sql = "SELECT COUNT(*) as count FROM games WHERE to_approve = 1";
    $icon = '<i class="fa-solid fa-dice"></i>';
    $title = 'Games Pending Approval';
}








$sql;
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
}




$item = '
' . $icon . '
<span class="nav-text"> ' . $title . '
    <span class="p-1" style="background-color: red;">
        ' . $count . '
    </span>
</span>



';


$data[] = array(
    "cart_count" => $item,

);


echo json_encode($data);
