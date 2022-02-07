<?php
include 'server.php';
$errors = array();

if (isset($_POST['bookdeposit'])) {
    $ndep_sdate = mysqli_real_escape_string($conn, $_POST['dep_sdate']);
    $ndep_edate = mysqli_real_escape_string($conn, $_POST['dep_edate']);
    $dog_id = mysqli_real_escape_string($conn, $_POST['dog_id']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $dep_sdate = date($ndep_sdate);
    $dep_edate = date($ndep_edate);


    $bookdatecheck = "SELECT * FROM deposit WHERE dog_id = '$dog_id' AND (dep_sdate = '$dep_sdate' AND dep_edate = '$dep_edate') ";
    $query = mysqli_query($conn, $bookdatecheck);
    $result = mysqli_fetch_assoc($query);

    // $bookdatecheck2 = "SELECT COUNT(dep_id) AS depcheck1 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') OR (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
    // $query2 = mysqli_query($conn, $bookdatecheck2);
    // $result2 = mysqli_fetch_assoc($query2);

    // echo '<pre>'; print_r($result2); echo '</pre>';


    if ($dep_sdate > $dep_edate) {
        echo "<script>";
        array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
        $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
        echo "alert(\"วันเริ่มเข้าพักต้องน้อยกว่าวันสิ้นสุด !\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    }
    // if ($result) {
    //     echo "<script>";
    //     echo "alert(\"วันซ้ำ!\");";
    //     echo "window.location=\"../userindex.php\"";
    //     echo "</script>";
    // }
    if ($room_id == 1 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    } elseif ($room_id == 1) {
        $bookdatecheck2 = "SELECT COUNT(dep_id) AS depcheck1 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query2 = mysqli_query($conn, $bookdatecheck2);
        $result2 = mysqli_fetch_assoc($query2);
        if ($result2['depcheck1'] >= 10) {
            echo "<script>";
            echo "alert(\"ห้องขนาดเล็กเต็มแล้ว !\");";
            echo "window.location=\"../userindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id')";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองสำเร็จ!\");";
            echo "window.location=\"../userdepositorder.php\"";
            echo "</script>";
        }
    }


    if ($room_id == 2 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    } elseif ($room_id == 2) {
        $bookdatecheck3 = "SELECT COUNT(dep_id) AS depcheck2 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query3 = mysqli_query($conn, $bookdatecheck3);
        $result3 = mysqli_fetch_assoc($query3);
        if ($result3['depcheck2'] >= 10) {
            echo "<script>";
            echo "alert(\"ห้องขนาดใหญ่เต็มแล้ว !\");";
            echo "window.location=\"../userindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id')";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองสำเร็จ!\");";
            echo "window.location=\"../userdepositorder.php\"";
            echo "</script>";
        }
    }

    if ($room_id == 3 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../userindex.php\"";
        echo "</script>";
    } elseif ($room_id == 3) {
        $bookdatecheck4 = "SELECT COUNT(dep_id) AS depcheck3 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query4 = mysqli_query($conn, $bookdatecheck4);
        $result4 = mysqli_fetch_assoc($query4);
        if ($result4['depcheck3'] >= 5) {
            echo "<script>";
            echo "alert(\"ห้องพิเศษเต็มแล้ว !\");";
            echo "window.location=\"../userindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id')";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองสำเร็จ!\");";
            echo "window.location=\"../userdepositorder.php\"";
            echo "</script>";
        }
    }
}
