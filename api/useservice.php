<?php
 include 'server.php';
    // $user_id = $_POST['user_id'];
    $dog_id = $_POST['dog_id'];
    $service_id = $_POST['service_id'];
    $us_date = $_POST['us_date'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO use_service (dog_id, service_id, us_date, us_price) VALUES ('$dog_id', '$service_id', '$us_date', '$price')";
    $query = mysqli_query($conn,$sql) ;

    // echo $price;

    if($query){
        echo "<script>";
        echo "alert(\"จองบริการสำเร็จ\");";
        echo "window.location=\"../userserviceorder.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }
?> 