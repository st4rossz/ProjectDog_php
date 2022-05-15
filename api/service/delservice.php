<?php
include '../server.php';
try {
    $service_id = $_POST['id'];
    $sql = "DELETE FROM service WHERE service_id='$service_id'";
    $query = mysqli_query($conn, $sql);


    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
