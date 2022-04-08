<?php
include '../server.php';

$us_id = $_POST['us_id'];
$us_basis = $_FILES['us_basis'];

date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");

$numrand = (mt_rand());

$upload = $_FILES['us_basis'];
if ($upload <> '') {

    $path = "uploads/";


    $type = strrchr($_FILES['us_basis']['name'], ".");


    $newname = $date . $numrand . $type;
    $path_copy = $path . $newname;
    $path_link = "uploads/" . $newname;

    move_uploaded_file($_FILES['us_basis']['tmp_name'], $path_copy);
}


$sql = "UPDATE use_service SET us_basis = '$newname' WHERE us_id = '$us_id'" ;
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"บันทึกข้อมูลการชำระแล้ว!\");";
    echo "window.location=\"../../userserviceorder.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด\");";
    echo "window.location=\"../../userserviceorder.php\"";
    echo "</script>";
}
