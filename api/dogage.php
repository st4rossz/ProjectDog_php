<?php
include 'server.php';

$dog_id = $_POST["dog_id"];

$bdsql = "SELECT dog_birthdate as bd FROM dog WHERE dog_id='$dog_id'";
$bdquery = mysqli_query($conn, $bdsql);
$bdfetch = mysqli_fetch_assoc($bdquery);

$dasql = "SELECT dog_age as da FROM dog WHERE dog_id='$dog_id'";
$daquery = mysqli_query($conn, $dasql);
$dafetch = mysqli_fetch_assoc($daquery);

$now = date("Y-01-01");
$datecal = strtotime($now) - strtotime($bdfetch['bd']);
$year = floor($datecal / 31556926);

$current_age = $dafetch['da'] + $year;


$sql = "SELECT * FROM dog WHERE dog_id='$dog_id'";
$query = mysqli_query($conn, $sql);



// echo 'ราคาคือ -> '.$row['service_price'];
if ($query) {
    $row = mysqli_fetch_assoc($query);
    $data['age'] = $row['dog_age'];
    $data['current'] = $current_age;
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);
