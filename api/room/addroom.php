<?php
include '../server.php';

try {
    $room_type = $_POST['room_type'];
    $room_quantity = $_POST['room_quantity'];
    $room_price = $_POST['room_price'];

    $sql = "INSERT INTO room (room_type, room_quantity, room_price) VALUES ('$room_type', '$room_quantity', '$room_price')";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        throw new Exception("เพิ่มข้อมูลห้องไม่สำเร็จ");
    }

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
