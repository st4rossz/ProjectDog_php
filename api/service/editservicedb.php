<?php 
include '../server.php';
$service_id = $_POST['service_id'];
$service_name = $_POST['service_name'];
$service_price = $_POST['service_price'];

$sql = "UPDATE service SET service_name = '$service_name', service_price = '$service_price' WHERE service_id = '$service_id'";
$query = mysqli_query($conn,$sql);

if($query){
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลบริการสำเร็จ!\");";
    echo "window.location=\"../../backend/base_service.php\"";
    echo "</script>";
}
?>


