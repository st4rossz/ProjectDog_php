
<?php
 include '../server.php';

    $dep_id = $_POST["dep_id"];
    $sql = "UPDATE deposit SET dep_status= 2, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id'" ;
    // $sql2 = "UPDATE deposit SET dep_status= 1, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 AND dep_deliver = 'ต้องการ'" ;

    if($sql){
        $query = mysqli_query($conn,$sql);
        echo "<script>";
        echo "alert(\"ยืนยันสถานะการเข้าใช้บริการสำเร็จ!\");";
        echo "window.location=\"../../backend/dep_confirm.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"ผิดพลาด!\");";
        echo "window.location=\"../../backend/dep_confirm.php\"";
        echo "</script>";
    }

?> 