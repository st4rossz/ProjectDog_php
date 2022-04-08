<?php
include '../server.php';

$dep_id = $_POST['dep_id'];
$dep_basis = $_FILES['dep_basis'];

date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");

$numrand = (mt_rand());

$upload = $_FILES['dep_basis'];
if ($upload <> '') {

    $path = "uploads/";


    $type = strrchr($_FILES['dep_basis']['name'], ".");


    $newname = $date . $numrand . $type;
    $path_copy = $path . $newname;
    $path_link = "uploads/" . $newname;

    move_uploaded_file($_FILES['dep_basis']['tmp_name'], $path_copy);
}


$sql = "UPDATE deposit SET dep_basis = '$newname' WHERE dep_id = '$dep_id'" ;
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>";
    echo "alert(\"ส่งหลักฐานการโอนเงินสำเร็จ!\");";
    echo "window.location=\"../../userdepositorder.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด\");";
    echo "window.location=\"../../userdepositorder.php\"";
    echo "</script>";
}
