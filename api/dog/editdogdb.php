<?php
include '../server.php';
try {
    $dog_id = $_POST['dog_id'];
    $dog_name = $_POST['dog_name'];
    $dog_type = $_POST['dog_type'];
    $dog_weight = $_POST['dog_weight'];
    $dog_age = $_POST['dog_age'];
    $dog_sickness = $_POST['dog_sickness'];

    $sql = "UPDATE dog SET dog_name = '$dog_name', dog_type='$dog_type', dog_weight = '$dog_weight', dog_age = '$dog_age', dog_sickness = '$dog_sickness' WHERE dog_id = '$dog_id'";
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
