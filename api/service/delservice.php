<?php
 include '../server.php';

 $service_id = $_REQUEST["service_id"];
 $sql = "DELETE FROM service WHERE service_id='$service_id'" ;
 $query = mysqli_query($conn,$sql) ;

 echo "<script>";
 echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
 echo "window.location=\"../../backend/base_service.php\"";
 echo "</script>";

?> 