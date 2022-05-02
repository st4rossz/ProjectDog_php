<?php
include '../server.php';

?>
<?php

$dep_id = $_POST["dep_id"];
$pay_type = $_POST["pay_type"];
$recieved_price = $_POST['recieved_price'];

$dep_price = "SELECT dep_price as dp FROM deposit WHERE dep_id = '$dep_id'";
$dep_query = mysqli_query($conn, $dep_price);
$result = mysqli_fetch_assoc($dep_query);

$exchange = $recieved_price - $result['dp'];


$sql1 = "UPDATE deposit SET dep_status= 1, status_name = 'ยืนยันการชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 ";
$sql2 = "INSERT INTO payment (pay_type, recieved_price, exchange, dep_id) VALUES ('$pay_type', '$recieved_price', '$exchange', '$dep_id')";
$query = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query and $query2) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}





echo json_encode($data);

?>
