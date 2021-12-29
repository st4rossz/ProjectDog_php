<?php 
include '../server.php';
$store_id = $_POST['store_id'];
$store_name = $_POST['store_name'];
$store_add = $_POST['store_add'];
$store_tel = $_POST['store_tel'];
$store_email = $_POST['store_email'];

$sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email' WHERE store_id = '$store_id'";
$query = mysqli_query($conn,$sql);

if($query){
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลร้านสำเร็จ!\");";
    echo "window.location=\"../../backend/base_store.php\"";
    echo "</script>";
}
?>


