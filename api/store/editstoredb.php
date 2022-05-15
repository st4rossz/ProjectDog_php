<?php
include '../server.php';

try {
    $store_id = $_POST['store_id'];
    $store_name = $_POST['store_name'];
    $store_add = $_POST['store_add'];
    $store_tel = $_POST['store_tel'];
    $store_email = $_POST['store_email'];

    if ($_FILES['store_logo']['size'] == 0) {

        $sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email' WHERE store_id = '$store_id'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            throw new Exception("แก้ไขข้อมูลไม่สำเร็จ");
        }
    } else {

        $store_logo = $_FILES['store_logo'];
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd");

        $numrand = (mt_rand());

        $upload = $_FILES['store_logo'];
        if ($upload <> '') {

            $path = "uploads/";


            $type = strrchr($_FILES['store_logo']['name'], ".");


            $newname = $date . $numrand . $type;
            $path_copy = $path . $newname;
            $path_link = "uploads/" . $newname;

            move_uploaded_file($_FILES['store_logo']['tmp_name'], $path_copy);
        }

        $sql = "UPDATE store SET store_name = '$store_name', store_add = '$store_add', store_tel = '$store_tel', store_email = '$store_email', store_logo = '$newname' WHERE store_id = '$store_id'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            throw new Exception("แก้ไขข้อมูลไม่สำเร็จ");
        }
    }

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
