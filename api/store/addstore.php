<?php
 include '../server.php';

    $store_name = $_POST['store_name'];
    $store_add = $_POST['store_add'];
    
    $sql = "INSERT INTO store (store_name, store_add) VALUES ('$store_name', '$store_add')";
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"เพิ่มร้านสำเร็จ\");";
        echo "window.location=\"../../backend/base_store.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../../backend/base_store.php\"";
        echo "</script>";
    }
?> 