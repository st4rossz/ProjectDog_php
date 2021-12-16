<?php 
include '../server.php';
$dog_id = $_POST['dog_id'];
$dog_name = $_POST['dog_name'];
$dog_type = $_POST['dog_type'];
$dog_weight = $_POST['dog_weight'];
$dog_age = $_POST['dog_age'];
$dog_sickness = $_POST['dog_sickness'];

$sql = "UPDATE dog SET dog_name = '$dog_name', dog_type='$dog_type', dog_weight = '$dog_weight', dog_age = '$dog_age', dog_sickness = '$dog_sickness' WHERE dog_id = '$dog_id'";
$query = mysqli_query($conn,$sql);

if($query){
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลสุนัขสำเร็จ!\");";
    echo "window.location=\"../../backend/base_dog.php\"";
    echo "</script>";
}
?>


