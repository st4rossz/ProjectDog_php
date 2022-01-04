<?php
include 'server.php';
$errors = array();

if (isset($_POST['bookdeposit'])) {
    $ndep_sdate = mysqli_real_escape_string($conn, $_POST['dep_sdate']);
    $ndep_edate = mysqli_real_escape_string($conn, $_POST['dep_edate']);
    $dog_id = mysqli_real_escape_string($conn, $_POST['dog_id']);
    $dep_sdate = date($ndep_sdate);
    $dep_edate = date($ndep_edate);

    // if ($dep_sdate > $dep_edate) {
    //     array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
    // }

    $bookdatecheck = "SELECT * FROM deposit WHERE dog_id = '$dog_id' AND (dep_sdate = '$dep_sdate' AND dep_edate = '$dep_edate') ";
    $query = mysqli_query($conn, $bookdatecheck);
    $result = mysqli_fetch_assoc($query);

    // if (count($errors) == 0) {
    //     $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id')";
    //     $query = mysqli_query($conn, $sql);
    //     echo "<script>";
    //     echo "alert(\"จองสำเร็จ!\");";
    //     echo "window.location=\"../userindex.php\"";
    //     echo "</script>";
    // } else{
    //     echo "<script>";
    //     array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
    //     $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
    //     echo "alert(\"กรุณากรอกวันจองให้ถูกต้อง!\");";
    //     echo "window.location=\"../adddeposit.php\"";
    //     echo "</script>";
    // }

    if ($dep_sdate > $dep_edate) {
        echo "<script>";
        array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
        $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
        echo "alert(\"กรุณากรอกวันจองให้ถูกต้อง!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    } elseif ($result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";   
    } else {
        $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id')";
        $query = mysqli_query($conn, $sql);
        echo "<script>";
        echo "alert(\"จองสำเร็จ!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }
}


    // $dep_sdate = $_POST['dep_sdate'];
    // $dep_edate = $_POST['dep_edate'];
    // $dog_id = $_POST['dog_id'];

    // $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id')";
    // $query = mysqli_query($conn,$sql) ;

    // if($query){
    //     echo "<script>";
    //     echo "alert(\"จองห้องพักสำเร็จ\");";
    //     echo "window.location=\"../userindex.php\"";
    //     echo "</script>";
    // }else{
    //     echo "<script>";
    //     echo "alert(\"เกิดข้อผิดพลาด\");";
    //     echo "window.location=\"../userindex.php\"";
    //     echo "</script>";
    // }
