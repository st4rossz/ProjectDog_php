<?php
 include 'server.php';

    $dep_sdate = $_POST['dep_sdate'];
    $dep_edate = $_POST['dep_edate'];
    $dog_id = $_POST['dog_id'];
    
    $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id')";
    $query = mysqli_query($conn,$sql) ;

    if($query){
        echo "<script>";
        echo "alert(\"เพิ่มห้องพักสำเร็จ\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }
?> 