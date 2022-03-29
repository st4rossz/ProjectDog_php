<?php
include '../server.php';

$us_id = $_POST['us_id'];
$sql = "DELETE FROM use_service WHERE us_id = '$us_id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
    echo "window.location=\"../../userserviceorder.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด!\");";
    echo "window.location=\"../../userserviceorder.php\"";
    echo "</script>";
}
?>