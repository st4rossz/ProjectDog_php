<?php
include '../server.php';

$us_id = $_POST['us_id'];
$usrec_detail = $_POST['usrec_detail'];
$usrec_topic = $_POST['usrec_topic'];


$sql1 = "UPDATE use_service SET usrec_topic ='$usrec_topic', usrec_detail = '$usrec_detail' WHERE us_id = '$us_id'";
$sql2 = "INSERT INTO us_record (usrec_topic, usrec_detail, us_id) VALUES ('$usrec_topic', '$usrec_detail', '$us_id')";
$query1 = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);

if ($query1 and $query2) {
    echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเสร็จสิ้น!\");";
    echo "window.location=\"../../backend/us_record.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"ผิดพลาด!\");";
    echo "window.location=\"../../backend/us_record.php\"";
    echo "</script>";
}
