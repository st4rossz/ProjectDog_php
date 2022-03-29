<?php
include '../server.php';

$dep_id = $_POST['dep_id'];
$deprec_detail = $_POST['deprec_detail'];
$deprec_topic = $_POST['deprec_topic'];


$sql1 = "UPDATE deposit SET deprec_topic = '$deprec_topic' , deprec_detail = '$deprec_detail' WHERE dep_id = '$dep_id'";
$sql2 = "INSERT INTO dep_record (deprec_topic, deprec_detail, dep_id) VALUES ('$deprec_topic','$deprec_detail','$dep_id')";
$query1 = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query1 and $query2) {
    echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเสร็จสิ้น!\");";
    echo "window.location=\"../../backend/dep_record.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด!\");";
    echo "window.location=\"../../backend/dep_record.php\"";
    echo "</script>";
}
