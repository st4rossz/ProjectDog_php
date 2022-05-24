<?php
include '../server.php';

$service_id = $_POST["service_id"];
$size = $_POST['size'];

if ($size == '0') {
    $size = 0;
} elseif ($size == '100') {
    $size = 100;
} else {
    $size = 150;
}

$sql = "SELECT service_price as sp FROM service WHERE service_id='$service_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$sp = $row['sp'] + $size;

if ($query) {
    $data['price'] = $sp;
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);
