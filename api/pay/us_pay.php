<?php
include '../server.php';

?>
<?php
if (isset($_POST['pay'])) {
    $us_id = $_POST["us_id"];
    $pay_type = $_POST["pay_type"];


    $sql1 = "UPDATE use_service SET us_status= 1, status_name = 'ชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE us_id='$us_id' AND us_status = 0 ";
    $sql2 = "INSERT INTO payment (pay_type, us_id) VALUES ('$pay_type','$us_id')";
    $query = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    echo "<script>";
    echo "alert(\"สถานะการจองถูกอัพเดทแล้ว !\");";
    echo "window.location=\"../../backend/us_pay.php\"";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด!\");";
    echo "window.location=\"../../backend/us_pay.php\"";
    echo "</script>";
}

?>
