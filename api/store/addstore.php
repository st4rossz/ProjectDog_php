<?php
 include '../server.php';


    $id = $_REQUEST["userid"];
    $sql = "UPDATE user SET status= 1 WHERE id='$id' " ;
    $query = mysqli_query($conn,$sql) ;

    echo "<script>";
    echo "alert(\"ยืนยันสิทธิ์เสร็จสิ้น\");";
    echo "window.location=\"../backend/adminindex.php\"";
    echo "</script>";

?> 