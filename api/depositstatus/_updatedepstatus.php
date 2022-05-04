
<?php
include '../server.php';

$dep_id = $_POST["dep_id"];
$chkdeliver = "SELECT dep_deliver as deliver FROM deposit WHERE dep_id = '$dep_id'";
$chkdeliverquery = mysqli_query($conn, $chkdeliver);
$chkdeliverresult = mysqli_fetch_assoc($chkdeliverquery);

$sql = "UPDATE deposit SET dep_status= 2, status_name = 'กำลังใช้บริการ' WHERE dep_id='$dep_id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    $data['success'] = true;
} else {
    $data['success'] = false;
}
echo json_encode($data);

?> 