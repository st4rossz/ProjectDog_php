
<?php
 include '../server.php';

    $us_id = $_POST["us_id"];
    $sql = "UPDATE use_service SET us_status= 2, status_name = 'รอชำระค่าบริการ' WHERE us_id='$us_id' AND us_status = 1 " ;
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"ยืนยันการจองสำเร็จ!\");";
        echo "window.location=\"../../backend/us_return.php\"";
        echo "</script>";
    
    }else{
        echo "<script>";
        echo "alert(\"ผิดพลาด!\");";
        echo "window.location=\"../../backend/us_return.php\"";
        echo "</script>";
    }

?> 