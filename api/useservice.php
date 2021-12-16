<?php
 include 'server.php';

    $dog_id = $_POST['dog_id'];
    $service_id = $_POST['service_id'];
    $us_date = $_POST['us_date'];
    
    $sql = "INSERT INTO use_service (dog_id, service_id, us_date) VALUES ('$dog_id', '$service_id', '$us_date')";
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"จองบริการสำเร็จ\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }
?> 