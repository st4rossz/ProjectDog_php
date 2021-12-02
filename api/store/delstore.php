<?php
 include '../server.php';

 $store_id = $_REQUEST["store_id"];
 $sql = "DELETE FROM store WHERE store_id='$store_id'" ;
 $query = mysqli_query($conn,$sql) ;

 echo "<script>";
 echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
 echo "window.location=\"../../backend/base_store.php\"";
 echo "</script>";

?> 