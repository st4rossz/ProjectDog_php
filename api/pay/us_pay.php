
<?php
 include '../server.php';

    $dep_id = $_POST["us_id"];
    $sql = "UPDATE use_service SET us_status= 1, status_name = 'ชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE us_id='$us_id' AND us_status = 0 " ;
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"ยืนยันการชำระเงินแล้ว!\");";
        echo "window.location=\"../../backend/us_pay.php\"";
        echo "</script>";
    
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด!\");";
        echo "window.location=\"../../backend/us_pay.php\"";
        echo "</script>";
    }

?> 