<?php
include '../server.php';

?>
<?php

$dep_id = $_POST["dep_id"];
$pay_type = $_POST["pay_type"];


$sql1 = "UPDATE deposit SET dep_status= 1, status_name = 'ชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 ";
$sql2 = "INSERT INTO payment (pay_type, dep_id) VALUES ('$pay_type','$dep_id')";
$query = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query or $query2) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}





echo json_encode($data);

?>
