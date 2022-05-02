
<?php
include '../server.php';

?>
<?php

$us_id = $_POST["us_id"];
$pay_type = $_POST["pay_type"];
$recieved_price = $_POST['recieved_price'];

$us_price = "SELECT us_price as up FROM use_service WHERE us_id = '$us_id'";
$us_query = mysqli_query($conn, $us_price);
$result = mysqli_fetch_assoc($us_query);

$exchange = $recieved_price - $result['up'];


$sql1 = "UPDATE use_service SET us_status= 1, status_name = 'ยืนยันการชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE us_id='$us_id' AND us_status = 0 ";
$sql2 = "INSERT INTO us_payment (pay_type, recieved_price, exchange, us_id) VALUES ('$pay_type','$recieved_price','$exchange','$us_id')";
$query = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query and $query2) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}





echo json_encode($data);


?>

