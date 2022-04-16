<?php
include '../server.php';

?>
<?php
if (isset($_POST['pay'])) {
    $dep_id = $_POST["dep_id"];
    $pay_type = $_POST["pay_type"];


    $sql1 = "UPDATE deposit SET dep_status= 1, status_name = 'ชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 ";
    $sql2 = "INSERT INTO payment (pay_type, dep_id) VALUES ('$pay_type','$dep_id')";
    $query = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    echo "<script>";
    echo "alert(\"สถานะการจองถูกอัพเดทแล้ว !\");";
    echo "window.location=\"../../backend/dep_pay.php\"";
    echo "</script>";

    // echo '<script type="text/javascript">';
    // echo 'setTimeout(function () { swal("แจ้งเตือน!","สถานะการจองถูกอัพเดทแล้ว!","success");';
    // echo '}, 1000);</script>';




} else {
    echo "<script>";
    echo "alert(\"เกิดข้อผิดพลาด!\");";
    echo "window.location=\"../../backend/dep_pay.php\"";
    echo "</script>";
}

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>