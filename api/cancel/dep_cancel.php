<?php
include '../server.php';

try {
    $dep_id = $_POST['dep_id'];
    $sql = "DELETE FROM deposit WHERE dep_id = '$dep_id'";
    $query = mysqli_query($conn, $sql);

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);


// if ($query) {
//     echo "<script>";
//     echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
//     echo "window.location=\"../../userdepositorder.php\"";
//     echo "</script>";
// } else {
//     echo "<script>";
//     echo "alert(\"เกิดข้อผิดพลาด!\");";
//     echo "window.location=\"../../userdepositorder.php\"";
//     echo "</script>";
// }
