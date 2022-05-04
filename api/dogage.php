<?php
include 'server.php';

$dog_id = $_POST["dog_id"];


$sql = "SELECT * FROM dog WHERE dog_id='$dog_id'";
$query = mysqli_query($conn, $sql);


// echo 'ราคาคือ -> '.$row['service_price'];
if ($query) {
    $row = mysqli_fetch_assoc($query);
    $data['age'] = $row['dog_age'];
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);
