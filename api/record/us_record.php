<?php
include '../server.php';
if (isset($_POST['usrec_topic']) == '') {
    $us_id = $_POST['us_id'];
    $usrec_detail = $_POST['usrec_detail'];
    $sql1 = "UPDATE use_service SET usrec_topic = 'สุนัขปกติดี', usrec_detail = '$usrec_detail' WHERE us_id = '$us_id'";
    $sql2 = "INSERT INTO us_record (usrec_topic, usrec_detail, us_id) VALUES ('สุนัขปกติดี', '$usrec_detail','$us_id')";
    $query1 = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    if ($query1 and $query2) {
        echo "<script>";
        echo "alert(\"อัพเดทข้อมูลการติดตามสุนัขเรียบร้อย!\");";
        echo "window.location=\"../../backend/us_record.php\"";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด!\");";
        echo "window.location=\"../../backend/us_record.php\"";
        echo "</script>";
    }
} else {
    isset($_POST['usrec_topic']) ? $usrec_topic = $_POST['usrec_topic'] : $usrec_topic = array();
    if (count($usrec_topic) > 0) {
        $input = array();
        foreach ($usrec_topic as $v) {
            $input[] = $v;
        }
        $input = implode(", ", $input);
        // echo $input;
    }
    $us_id = $_POST['us_id'];
    $usrec_detail = $_POST['usrec_detail'];


    $sql1 = "UPDATE use_service SET usrec_topic = '$input', usrec_detail = '$usrec_detail' WHERE us_id = '$us_id'";
    $sql2 = "INSERT INTO us_record (usrec_topic, usrec_detail, us_id) VALUES ('$input','$usrec_detail','$us_id')";
    $query1 = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);

    if ($query1 and $query2) {
        echo "<script>";
        echo "alert(\"อัพเดทข้อมูลการติดตามสุนัขเรียบร้อย!\");";
        echo "window.location=\"../../backend/us_record.php\"";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"เกิดข้อผิดพลาด!\");";
        echo "window.location=\"../../backend/us_record.php\"";
        echo "</script>";
    }
}
