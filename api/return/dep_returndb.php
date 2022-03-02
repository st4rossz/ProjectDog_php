
<?php
 include '../server.php';

    $dep_id = $_POST["dep_id"];
    $sql = "UPDATE deposit SET dep_status= 2, status_name = 'รอชำระค่าบริการ' WHERE dep_id='$dep_id' AND dep_status = 1 " ;
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"ยืนยันการจองสำเร็จ!\");";
        echo "window.location=\"../../backend/dep_return.php\"";
        echo "</script>";
    
    }else{
        echo "<script>";
        echo "alert(\"ผิดพลาด!\");";
        echo "window.location=\"../../backend/dep_return.php\"";
        echo "</script>";
    }

?> 