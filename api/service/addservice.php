<?php
include '../server.php';

try {
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];

    $sql = "INSERT INTO service (service_name, service_price) VALUES ('$service_name', '$service_price')";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        throw new Exception("เพิ่มข้อมูลสุนัขไม่สำเร็จ");
    }


    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
