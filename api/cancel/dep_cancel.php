<?php
include '../server.php';

$dep_id = $_POST['dep_id'];
$sql = "DELETE FROM deposit WHERE dep_id = '$dep_id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
    echo "window.location=\"../../userdepositorder.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด!\");";
    echo "window.location=\"../../userdepositorder.php\"";
    echo "</script>";
}
?>