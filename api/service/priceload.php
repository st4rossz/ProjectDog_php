<?php
 include '../server.php';

 $service_id = $_POST["id_service"];


 $sql = "SELECT * FROM service WHERE service_id='$service_id'" ;
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