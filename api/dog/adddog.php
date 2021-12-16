<?php
 include '../server.php';

    $dog_name = $_POST['dog_name'];
    $dog_type = $_POST['dog_type'];
    $dog_weight = $_POST['dog_weight'];
    $dog_age = $_POST['dog_age'];
    $dog_sickness = $_POST['dog_sickness'];

    
    $sql = "INSERT INTO dog (dog_name, dog_type, dog_weight, dog_age, dog_sickness) VALUES ('$dog_name', ' $dog_type', '$dog_weight', '$dog_age', '$dog_sickness')";
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"เพิ่มข้อมูลสุนัขสำเร็จ\");";
        echo "window.location=\"../../backend/base_dog.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../../backend/base_dog.php\"";
        echo "</script>";
    }
?> 