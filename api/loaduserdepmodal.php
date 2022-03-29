<?php
 include '../server.php';

 $dep_id = $_POST["dep_id"];


 $sql = "SELECT * FROM deposit WHERE dep_id='$dep_id'" ;
 $query = mysqli_query($conn,$sql) ;
 

// echo 'ราคาคือ -> '.$row['service_price'];
if ($query) {
    $row = mysqli_fetch_assoc($query);
    $export['price'] = $row['service_price'];
    $export['success'] = true;
} else {
    $export['success'] = false;
}
echo json_encode($export);
?> 