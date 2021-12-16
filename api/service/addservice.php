<?php
 include '../server.php';

    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    
    $sql = "INSERT INTO service (service_name, service_price) VALUES ('$service_name', '$service_price')";
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"เพิ่มบริการสำเร็จ\");";
        echo "window.location=\"../../backend/base_service.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../../backend/base_service.php\"";
        echo "</script>";
    }
?> 