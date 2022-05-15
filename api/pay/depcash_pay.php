<?php
include '../server.php';

try {

    $dep_id = $_POST["dep_id"];
    $pay_type = $_POST["pay_type"];
    $recieved_price = $_POST['recieved_price'];



    $dep_price = "SELECT dep_price as dp FROM deposit WHERE dep_id = '$dep_id'";
    $dep_query = mysqli_query($conn, $dep_price);
    $result = mysqli_fetch_assoc($dep_query);

    if ($recieved_price < $result['dp']) {
        throw new Exception("เงินที่ลูกค้าชำระต้องมากกว่าค่าบริการ");
    }

    $exchange = $recieved_price - $result['dp'];



    $sql1 = "UPDATE deposit SET dep_status= 1, status_name = 'ยืนยันการชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 ";
    $sql2 = "INSERT INTO payment (pay_type, recieved_price, exchange, dep_id) VALUES ('$pay_type', '$recieved_price', '$exchange', '$dep_id')";
    $query = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    if (!$query and !$query2) {
        throw new Exception("เกิดข้อผิดพลาดขึ้น");
    }

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
