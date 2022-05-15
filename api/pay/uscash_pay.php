
<?php
include '../server.php';

try {
    $us_id = $_POST["us_id"];
    $pay_type = $_POST["pay_type"];
    $recieved_price = $_POST['recieved_price'];

    $us_price = "SELECT us_price as up FROM use_service WHERE us_id = '$us_id'";
    $us_query = mysqli_query($conn, $us_price);
    $result = mysqli_fetch_assoc($us_query);

    if ($recieved_price < $result['up']) {
        throw new Exception("เงินที่ลูกค้าชำระต้องมากกว่าค่าบริการ");
    }

    $exchange = $recieved_price - $result['up'];


    $sql1 = "UPDATE use_service SET us_status= 1, status_name = 'ยืนยันการชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE us_id='$us_id' AND us_status = 0 ";
    $sql2 = "INSERT INTO us_payment (pay_type, recieved_price, exchange, us_id) VALUES ('$pay_type','$recieved_price','$exchange','$us_id')";
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
