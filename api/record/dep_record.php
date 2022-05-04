<?php
include '../server.php';
if (isset($_POST['deprec_topic']) == '') {
    $dep_id = $_POST['dep_id'];
    $deprec_detail = $_POST['deprec_detail'];
    $sql1 = "UPDATE deposit SET deprec_topic = 'สุนัขปกติดี', deprec_detail = '$deprec_detail' WHERE dep_id = '$dep_id'";
    $sql2 = "INSERT INTO dep_record (deprec_topic, deprec_detail, dep_id) VALUES ('สุนัขปกติดี', '$deprec_detail','$dep_id')";
    $query1 = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    if ($query1 and $query2) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
    }
    echo json_encode($data);
} else {
    isset($_POST['deprec_topic']) ? $deprec_topic = $_POST['deprec_topic'] : $deprec_topic = array();
    if (count($deprec_topic) > 0) {
        $input = array();
        foreach ($deprec_topic as $v) {
            $input[] = $v;
        }
        $input = implode(", ", $input);
        // echo $input;
    }
    $dep_id = $_POST['dep_id'];
    $deprec_detail = $_POST['deprec_detail'];


    $sql1 = "UPDATE deposit SET deprec_topic = '$input', deprec_detail = '$deprec_detail' WHERE dep_id = '$dep_id'";
    $sql2 = "INSERT INTO dep_record (deprec_topic, deprec_detail, dep_id) VALUES ('$input','$deprec_detail','$dep_id')";
    $query1 = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    if ($query1 and $query2) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
    }
    echo json_encode($data);
}
