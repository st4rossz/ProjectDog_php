<?php
 include '../server.php';

    $room_type = $_POST['room_type'];
    $room_quantity = $_POST['room_quantity'];
    $room_price = $_POST['room_price'];
    
    $sql = "INSERT INTO room (room_type, room_quantity, room_price) VALUES ('$room_type', '$room_quantity', '$room_price')";
    $query = mysqli_query($conn,$sql) ;

     if($query){
         echo "<script>";
         echo "alert(\"เพิ่มห้องพักสำเร็จ\");";
         echo "window.location=\"../../backend/base_room.php\"";
         echo "</script>";
     }else{
         echo "<script>";
         echo "alert(\"เกิดข้อผิดพลาด\");";
         echo "window.location=\"../../backend/base_room.php\"";
         echo "</script>";
     }
?> 