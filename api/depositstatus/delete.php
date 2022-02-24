<?php
include '../server.php';

$dep_id = $_REQUEST["dep_id"];
$sql = "UPDATE deposit SET dep_status= 10, status_name = 'ถูกยกเลิก' WHERE dep_id='$dep_id' AND dep_status = 0 " ;
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"การจองถูกยกเลิกแล้ว !\");";
    echo "window.location=\"../../backend/dep_confirm.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"ผิดพลาด!\");";
    echo "window.location=\"../../backend/dep_confirm.php\"";
    echo "</script>";
}
?>