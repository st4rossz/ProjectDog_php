<?php
 include '../server.php';

 $dep_id = $_POST['dep_id'];
 $deprec_detail = $_POST['deprec_detail'];


 $sql1 = "UPDATE deposit SET deprec_detail = '$deprec_detail' WHERE dep_id = '$dep_id'";
 $sql2 = "INSERT INTO dep_record (deprec_detail, dep_id) VALUES ('$deprec_detail','$dep_id')" ;
 $query1 = mysqli_query($conn,$sql1);
 $query2 = mysqli_query($conn,$sql2);

 if($query1 AND $query2){
 echo "<script>";
 echo "alert(\"เพิ่มข้อมูลเสร็จสิ้น!\");";
 echo "window.location=\"../../backend/dep_record.php\"";
 echo "</script>";
}
?> 