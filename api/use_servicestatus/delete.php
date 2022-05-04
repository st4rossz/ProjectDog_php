<?php
include '../server.php';

$us_id = $_POST["us_id"];
$sql = "UPDATE use_service SET us_status= 10, status_name = 'ถูกยกเลิก' WHERE us_id='$us_id' AND us_status = 1 ";
$query = mysqli_query($conn, $sql);

if ($query) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);
