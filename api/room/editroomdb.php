<?php 
include '../server.php';
$room_id = $_POST['room_id'];
$room_type = $_POST['room_type'];
$room_quantity = $_POST['room_quantity'];
$room_price = $_POST['room_price'];

$sql = "UPDATE room SET room_type = '$room_type', room_quantity='$room_quantity', room_price = '$room_price' WHERE room_id = '$room_id'";
$query = mysqli_query($conn,$sql);

if($query){
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลห้องพักสำเร็จ!\");";
    echo "window.location=\"../../backend/base_room.php\"";
    echo "</script>";
}
?>


