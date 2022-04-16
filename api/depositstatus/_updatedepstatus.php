
<?php
include '../server.php';

$dep_id = $_POST["dep_id"];
$chkdeliver = "SELECT dep_deliver as deliver FROM deposit WHERE dep_id = '$dep_id'";
$chkdeliverquery = mysqli_query($conn, $chkdeliver);
$chkdeliverresult = mysqli_fetch_assoc($chkdeliverquery);

$sql = "UPDATE deposit SET dep_status= 2, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id'";

if ($sql) {
    $query = mysqli_query($conn, $sql);
    echo "<script>";
    echo "alert(\"ยืนยันสถานะการเข้าใช้บริการสำเร็จ!\");";
    echo "window.location=\"../../backend/dep_confirm.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"ผิดพลาด!\");";
    echo "window.location=\"../../backend/dep_confirm.php\"";
    echo "</script>";
}


// if ($chkdeliverresult['deliver'] != "ต้องการ") {
//     $sql = "UPDATE deposit SET dep_status= 2, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 2 AND dep_deliver != 'ต้องการ' ";
//     $query = mysqli_query($conn, $sql);
//     // $result = mysqli_fetch_assoc($query);
//     echo "<script>";
//     echo "alert(\"อัพเดทสถานะสุนัขแล้ว!\");";
//     echo "window.location=\"../../backend/dep_confirm.php\"";
//     echo "</script>";
// } elseif ($chkdeliverresult['deliver'] == "ต้องการ") {
//     $sql2 = "UPDATE deposit SET dep_status= 2, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 2";
//     $query2 = mysqli_query($conn, $sql2);
//     // $result = mysqli_fetch_assoc($query);
//     echo "<script>";
//     echo "alert(\"อัพเดทสถานะสุนัขแล้ว!\");";
//     echo "window.location=\"../../backend/dep_confirm.php\"";
//     echo "</script>";
// } else {
//     echo "<script>";
//     echo "alert(\"เกิดข้อผิดพลาด!\");";
//     echo "window.location=\"../../backend/dep_confirm.php\"";
//     echo "</script>";
// }

?> 