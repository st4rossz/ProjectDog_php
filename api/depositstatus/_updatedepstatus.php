
<?php
 include '../server.php';

    $dep_id = $_POST["dep_id"];
    $sql = "UPDATE deposit SET dep_status= 1, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id' AND dep_status = 0 " ;
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"ยืนยันการจองสำเร็จ!\");";
        echo "window.location=\"../../backend/dep_confirm.php\"";
        echo "</script>";
    
    }else{
        echo "<script>";
        echo "alert(\"ผิดพลาด!\");";
        echo "window.location=\"../../backend/dep_confirm.php\"";
        echo "</script>";
    }

?> 