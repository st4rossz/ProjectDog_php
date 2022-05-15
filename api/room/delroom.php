<?php
include '../server.php';

try {
    $room_id = $_POST['id'];
    $sql = "DELETE FROM room WHERE room_id='$room_id'";
    $query = mysqli_query($conn, $sql);

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
