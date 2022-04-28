<?php
include '../server.php';

$us_id = $_REQUEST["us_id"];
$sql = "UPDATE use_service SET us_status= 2, status_name = 'กำลังใช้บริการ' WHERE us_id='$us_id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"ยืนยันสถานะการเข้าใช้บริการสำเร็จ!\");";
    echo "window.location=\"../../backend/useservice_confirm.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"ผิดพลาด!\");";
    echo "window.location=\"../../backend/useservice_confirm.php\"";
    echo "</script>";
}
