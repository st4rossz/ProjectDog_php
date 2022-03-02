<?php
include '../server.php';
$dog_name = $_POST['dog_name'];
$dog_type = $_POST['dog_type'];
$dog_weight = $_POST['dog_weight'];
$dog_age = $_POST['dog_age'];
$dog_sickness = $_POST['dog_sickness'];
$user_id = $_POST['user_id'];
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


$sql = "INSERT INTO dog (dog_name, dog_type, dog_weight, dog_age, dog_sickness, user_id, image) VALUES ('$dog_name', ' $dog_type', '$dog_weight', '$dog_age', '$dog_sickness', '$user_id', '$newname')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script language=\"JavaScript\">";
    echo "alert(\"เพิ่มข้อมูลสุนัขสำเร็จ\");";
    echo "window.location=\"../../usindex.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด\");";
    echo "window.location=\"../../usindex.php\"";
    echo "</script>";
}
