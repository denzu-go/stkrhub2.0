<?php
session_start();
include("connection.php");
// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

$sql = 'SELECT courier_name FROM courier';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $courierNames = array();
  while ($row = $result->fetch_assoc()) {
    $courierNames[] = array('courier_name' => $row['courier_name']);
  }

  // Return the data as JSON
  echo json_encode($courierNames);
} else {
  // Handle the case where no data is found
  echo '[]';
}

$conn->close();
?>
