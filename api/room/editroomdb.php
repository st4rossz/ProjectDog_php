<?php 
include '../server.php';
try {
    $room_id = $_POST['room_id'];
    $room_type = $_POST['room_type'];
    $room_quantity = $_POST['room_quantity'];
    $room_price = $_POST['room_price'];

    $sql = "UPDATE room SET room_type = '$room_type', room_quantity='$room_quantity', room_price = '$room_price' WHERE room_id = '$room_id'";
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
