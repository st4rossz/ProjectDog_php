<?php
include '../server.php';

$dep_id = $_POST["dep_id"];
$sql = "UPDATE deposit SET dep_status= 10, status_name = 'ถูกยกเลิก' WHERE dep_id='$dep_id' AND dep_status = 1 ";
$query = mysqli_query($conn, $sql);

if ($query) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);
