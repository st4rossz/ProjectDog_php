<?php
include '../server.php';

try {
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    $sql = "UPDATE user SET email = '$email', address='$address' WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
