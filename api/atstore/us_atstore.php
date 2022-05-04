
<?php
include '../server.php';

$us_id = $_POST["us_id"];
$sql = "UPDATE use_service SET us_status= 3, status_name = 'สิ้นสุดการให้บริการ' WHERE us_id='$us_id' AND us_status = 2 ";
$query = mysqli_query($conn, $sql);

if ($query) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);

?> 