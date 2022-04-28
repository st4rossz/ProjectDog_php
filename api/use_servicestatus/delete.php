<?php
include '../server.php';

$us_id = $_POST["us_id"];
$sql = "UPDATE use_service SET us_status= 10, status_name = 'ถูกยกเลิก' WHERE us_id='$us_id' AND us_status = 1 ";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"การจองถูกยกเลิกแล้ว !\");";
    echo "window.location=\"../../backend/useservice_confirm.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"ผิดพลาด!\");";
    echo "window.location=\"../../backend/useservice_confirm.php\"";
    echo "</script>";
}
