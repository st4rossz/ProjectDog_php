<?php
include '../server.php';

try {
    $dog_name = $_POST['dog_name'];
    $dog_type = $_POST['dog_type'];
    $dog_weight = $_POST['dog_weight'];
    $dog_age = $_POST['dog_age'];
    $dog_sickness = $_POST['dog_sickness'];
    $user_id = $_POST['user_id'];

    //calculate dog_age as date
    $calyear = date("Y") - $dog_age;
    $dog_birthdate = date("$calyear-01-01");

    if ($_FILES['image']['size'] == 0) {
        $sql = "INSERT INTO dog (dog_name, dog_type, dog_weight, dog_age, dog_birthdate, dog_sickness, user_id) VALUES ('$dog_name', ' $dog_type', '$dog_weight', '$dog_age','$dog_birthdate','$dog_sickness', '$user_id')";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            throw new Exception("เพิ่มข้อมูลสุนัขไม่สำเร็จ");
        }
    } else {
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

        $sql = "INSERT INTO dog (dog_name, dog_type, dog_weight, dog_age, dog_birthdate, dog_sickness, user_id, image) VALUES ('$dog_name', ' $dog_type', '$dog_weight', '$dog_age','$dog_birthdate', '$dog_sickness', '$user_id', '$newname')";
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
