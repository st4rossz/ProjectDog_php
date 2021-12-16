<?php
 include '../server.php';

 $room_id = $_REQUEST["room_id"];
 $sql = "DELETE FROM room WHERE room_id='$room_id'" ;
 $query = mysqli_query($conn,$sql) ;

 echo "<script>";
 echo "alert(\"ลบข้อมูลเสร็จสิ้น!\");";
 echo "window.location=\"../../backend/base_room.php\"";
 echo "</script>";

?> 