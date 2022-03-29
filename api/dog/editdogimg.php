<?php
include '../server.php';
$dog_id = $_POST['dog_id'];
$image = $_FILES['image'];

date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");

$numrand = (mt_rand());

$upload = $_FILES['image'];
if ($upload <> '') {

    $path = "uploads/";


    $type = strrchr($_FILES['image']['name'], ".");


    $newname = $date . $numrand . $type;
    $path_copy = $path . $newname;
    $path_link = "uploads/" . $newname;

    move_uploaded_file($_FILES['image']['tmp_name'], $path_copy);
}


$sql = "UPDATE dog SET image = '$newname' WHERE dog_id = '$dog_id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script language=\"JavaScript\">";
    echo "alert(\"เพิ่มข้อมูลสุนัขสำเร็จ\");";
    echo "window.location=\"../../dog_profile.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด\");";
    echo "window.location=\"../../dog_profile.php\"";
    echo "</script>";
}
