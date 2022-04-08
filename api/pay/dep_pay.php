
<?php
 include '../server.php';

    $dep_id = $_POST["dep_id"];
    $sql = "UPDATE deposit SET dep_status= 1, status_name = 'ชำระเงินแล้ว/รอเข้าใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 " ;
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"ยืนยันการชำระเงินแล้ว!\");";
        echo "window.location=\"../../backend/dep_pay.php\"";
        echo "</script>";
    
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด!\");";
        echo "window.location=\"../../backend/dep_pay.php\"";
        echo "</script>";
    }

?> 