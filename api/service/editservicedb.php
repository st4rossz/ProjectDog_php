<?php
include '../server.php';
try {

    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];

    $sql = "UPDATE service SET service_name = '$service_name', service_price = '$service_price' WHERE service_id = '$service_id'";
    $query = mysqli_query($conn, $sql);

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
