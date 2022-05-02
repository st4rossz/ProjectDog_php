
<?php
include '../server.php';

?>
<?php

$us_id = $_POST["us_id"];
$pay_type = $_POST["pay_type"];


$sql1 = "UPDATE use_service SET us_status= 1, status_name = 'ยืนยันการชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE us_id='$us_id' AND us_status = 0 ";
$sql2 = "INSERT INTO us_payment (pay_type, us_id) VALUES ('$pay_type','$us_id')";
$query = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query and $query2) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}





echo json_encode($data);


?>

