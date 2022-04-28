<?php
 include 'server.php';

    $us_id = $_REQUEST["us_id"];
    $sql = "UPDATE use_service SET us_status= 1 WHERE us_id='$us_id' " ;
    $query = mysqli_query($conn,$sql) ;

    echo "<script>";
    echo "alert(\"ยืนยันสถานะบริการเรียบร้อย!\");";
    echo "window.location=\"../backend/confirm_service.php\"";
    echo "</script>";

?> 