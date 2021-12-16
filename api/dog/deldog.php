<?php
 include '../server.php';

 $dog_id = $_REQUEST["dog_id"];
 $sql = "DELETE FROM dog WHERE dog_id='$dog_id'" ;
 $query = mysqli_query($conn,$sql) ;

 echo "<script>";
 echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
 echo "window.location=\"../../backend/base_dog.php\"";
 echo "</script>";

?> 