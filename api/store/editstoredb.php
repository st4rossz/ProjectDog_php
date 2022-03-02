<?php
include '../server.php';
$store_id = $_POST['store_id'];
$store_name = $_POST['store_name'];
$store_add = $_POST['store_add'];
$store_tel = $_POST['store_tel'];
$store_email = $_POST['store_email'];
$store_logo = $_FILES['store_logo'];
//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");
//ฟังก์ชั่นสุ่มตัวเลข
$numrand = (mt_rand());
//เพิ่มไฟล์
$upload = $_FILES['store_logo'];
if ($upload <> '') {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป 
    $path = "uploads/";

    //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['store_logo']['name'], ".");

    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $newname = $date . $numrand . $type;
    $path_copy = $path . $newname;
    $path_link = "uploads/" . $newname;
    //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['store_logo']['tmp_name'], $path_copy);
}



// เพิ่มไฟล์เข้าไปในตาราง uploadfile
$sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email', store_logo = '$newname' WHERE store_id = '$store_id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo "<script language=\"JavaScript\">";
    echo "alert(' สำเร็จ!');";
    echo "window.location=\"../../backend/base_store.php\"";
    echo "</script>";
} else {
    echo "<script language=\"JavaScript\">";
    echo "alert(' ไม่สำเร็จ!');";
    echo "window.location=\"../../backend/editstore.php\"";
    echo "</script>";
}


// include '../server.php';
// $store_id = $_POST['store_id'];
// $store_name = $_POST['store_name'];
// $store_add = $_POST['store_add'];
// $store_tel = $_POST['store_tel'];
// $store_email = $_POST['store_email'];
// $store_logo = $_FILES['store_logo'];
// // $upload = $_FILES('store_logo');
// if ($store_logo != '') {

//     //กำหนดที่เก็บรูปของเซิร์ฟเวอร์
//     $dir = "uploads/";

//     $fileImage = $dir . basename($_FILES["store_logo"]["name"]);
//     $path_link = "uploads/" . $fileImage;
//     move_uploaded_file($_FILES["store_logo"]["tmp_name"], $fileImage);
//     echo $fileImage;
// }
// $sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email', store_logo = '$fileImage' WHERE store_id = '$store_id'";
// $query = mysqli_query($conn, $sql);

// if ($query) {
//     echo "<script>";
//     echo "alert(\"แก้ไขข้อมูลร้านสำเร็จ!\");";
//     echo "window.location=\"../../backend/base_store.php\"";
//     echo "</script>";
// } else
//     echo "<script>";
// echo "alert(\"เกิดข้อผิดพลาดในการแก้ไขข้อมูล!\");";
// echo "window.location=\"../../backend/editstore.php\"";
// echo "</script>";


//////////////////
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';
// echo $fileImage;
// if (move_uploaded_file($_FILES["store_logo"]["tmp_name"], $fileImage)) {
//     echo "ไฟล์ภาพชื่อว่า" . basename($_FILES["store_logo"]["name"]) . "อัพโหลดเสร็จแล้ว";
// } else
//     echo "เกิดข้อผิดพลาด";
// $store_id = $_POST['store_id'];
// $store_name = $_POST['store_name'];
// $store_add = $_POST['store_add'];
// $store_tel = $_POST['store_tel'];
// $store_email = $_POST['store_email'];
// $store_logo = $_POST['store_logo'];

// $sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email', store_logo = '$store_logo' WHERE store_id = '$store_id'";
// $query = mysqli_query($conn,$sql);

// if($query){
//     echo "<script>";
//     echo "alert(\"แก้ไขข้อมูลร้านสำเร็จ!\");";
//     echo "window.location=\"../../backend/base_store.php\"";
//     echo "</script>";
// }
?>