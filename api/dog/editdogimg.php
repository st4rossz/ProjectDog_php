<?php
include '../server.php';
try {
    if ($_FILES['image']['size'] > 0) {
        $dog_id = $_POST['dog_id'];
        $image = $_FILES['image'];
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd");

        $numrand = (mt_rand());

        $upload = $_FILES['image'];
        if ($upload <> '') {

            $path = "uploads/";


            $type = strrchr($_FILES['image']['name'], ".");


            $newname = $date . $numrand . $type;
            $path_copy = $path . $newname;
            $path_link = "uploads/" . $newname;

            move_uploaded_file($_FILES['image']['tmp_name'], $path_copy);
        }

        $sql = "UPDATE dog SET image = '$newname' WHERE dog_id = '$dog_id'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            throw new Exception("เพิ่มข้อมูลสุนัขไม่สำเร็จ");
        }
    }

    $data['success'] = true;
} catch (Exception $th) {
    $data['success'] = false;
    $data['msg'] = $th->getMessage();
}
echo json_encode($data);
