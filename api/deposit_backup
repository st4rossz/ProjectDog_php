<?php
include 'server.php';
$errors = array();

if (isset($_POST['bookdeposit'])) {

    $ndep_sdate = mysqli_real_escape_string($conn, $_POST['dep_sdate']);
    $ndep_edate = mysqli_real_escape_string($conn, $_POST['dep_edate']);
    $dog_id = mysqli_real_escape_string($conn, $_POST['dog_id']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $dep_deliver = mysqli_real_escape_string($conn, $_POST['dep_deliver']);
    $dep_sdate = date($ndep_sdate);
    $dep_edate = date($ndep_edate);

    if ($dep_deliver == "ต้องการ") {
        $dep_deliverp = 50;
    } else {
        $dep_deliverp = 0;
    }


    //คำนวณวัน
    $daycalculate = strtotime($dep_edate) - strtotime($dep_sdate);
    $day = floor($daycalculate / 86400);



    $bookdatecheck = "SELECT * FROM deposit WHERE dog_id = '$dog_id' AND (dep_sdate = '$dep_sdate' AND dep_edate = '$dep_edate') ";
    $query = mysqli_query($conn, $bookdatecheck);
    $result = mysqli_fetch_assoc($query);

    // echo '<pre>'; print_r($rquery1); echo '</pre>';

    if (isset($_POST['dog_age'])) {
        $dog_age = $_POST['dog_age'];
        $sql = "UPDATE dog SET dog_age = '$dog_age' WHERE dog_id = '$dog_id'";
        $query = mysqli_query($conn, $sql);
    }

    if ($dep_sdate >= $dep_edate) {
        echo "<script>";
        array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
        $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
        echo "alert(\"วันเริ่มเข้าพักต้องน้อยกว่าวันสิ้นสุด !\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 1 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 1) {

        $bookdatecheck2 = "SELECT COUNT(dep_id) AS depcheck1 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query2 = mysqli_query($conn, $bookdatecheck2);
        $result2 = mysqli_fetch_assoc($query2);

        $chkroomqty1 = "SELECT room_quantity as rq1 FROM room WHERE room_id = 1";
        $rquery1 = mysqli_query($conn, $chkroomqty1);
        $resultroom1 = mysqli_fetch_assoc($rquery1);

        $chkprice1 = "SELECT room_price as rp1 FROM room WHERE room_id = 1";
        $pquery1 = mysqli_query($conn, $chkprice1);
        $rp1 = mysqli_fetch_assoc($pquery1);

        $roomprice1 = $rp1['rp1'];



        if ($result2['depcheck1'] >= $resultroom1['rq1']) {
            echo "<script>";
            echo "alert(\"ห้องขนาดเล็กเต็มแล้ว !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id, dep_deliver, dep_price) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id', '$dep_deliver', ($day*$roomprice1)+$dep_deliverp)";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองห้องพักสำเร็จ !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        }
    }

    if ($dep_sdate >= $dep_edate) {
        echo "<script>";
        array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
        $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
        echo "alert(\"วันเริ่มเข้าพักต้องน้อยกว่าวันสิ้นสุด !\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 2 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 2) {
        $bookdatecheck3 = "SELECT COUNT(dep_id) AS depcheck2 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query3 = mysqli_query($conn, $bookdatecheck3);
        $result3 = mysqli_fetch_assoc($query3);

        $chkroomqty2 = "SELECT room_quantity as rq2 FROM room WHERE room_id = 2";
        $rquery2 = mysqli_query($conn, $chkroomqty2);
        $resultroom2 = mysqli_fetch_assoc($rquery2);

        $chkprice2 = "SELECT room_price as rp2 FROM room WHERE room_id = 2";
        $pquery2 = mysqli_query($conn, $chkprice2);
        $rp2 = mysqli_fetch_assoc($pquery2);

        $roomprice2 = $rp2['rp2'];

        if ($result3['depcheck2'] >= $resultroom2['rq2']) {
            echo "<script>";
            echo "alert(\"ห้องขนาดใหญ่เต็มแล้ว !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id, dep_deliver,dep_price) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id', '$dep_deliver', ($day*$roomprice2)+$dep_deliverp)";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองห้องพักสำเร็จ !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        }
    }

    if ($dep_sdate >= $dep_edate) {
        echo "<script>";
        array_push($errors, "กรุณากรอกวันจองให้ถูกต้อง!");
        $_SESSION['error'] = "กรุณากรอกวันจองให้ถูกต้อง!";
        echo "alert(\"วันเริ่มเข้าพักต้องน้อยกว่าวันสิ้นสุด !\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 3 and $result) {
        echo "<script>";
        echo "alert(\"วันซ้ำ!\");";
        echo "window.location=\"../usindex.php\"";
        echo "</script>";
    } elseif ($room_id == 3) {
        $bookdatecheck4 = "SELECT COUNT(dep_id) AS depcheck3 FROM deposit WHERE room_id = '$room_id' AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate') AND (dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
        $query4 = mysqli_query($conn, $bookdatecheck4);
        $result4 = mysqli_fetch_assoc($query4);

        $chkroomqty3 = "SELECT room_quantity as rq3 FROM room WHERE room_id = 3";
        $rquery3 = mysqli_query($conn, $chkroomqty3);
        $resultroom3 = mysqli_fetch_assoc($rquery3);

        $chkprice3 = "SELECT room_price as rp3 FROM room WHERE room_id = 3";
        $pquery3 = mysqli_query($conn, $chkprice3);
        $rp3 = mysqli_fetch_assoc($pquery3);

        $roomprice3 = $rp3['rp3'];


        if ($result4['depcheck3'] >= $resultroom3['rq3']) {
            echo "<script>";
            echo "alert(\"ห้องพิเศษเต็มแล้ว !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        } else {
            $sql = "INSERT INTO deposit (dep_sdate, dep_edate, dog_id, room_id, dep_deliver, dep_price) VALUES ('$dep_sdate', '$dep_edate', '$dog_id', '$room_id', '$dep_deliver', ($day*$roomprice3)+$dep_deliverp)";
            $query = mysqli_query($conn, $sql);
            echo "<script>";
            echo "alert(\"จองห้องพักสำเร็จ !\");";
            echo "window.location=\"../usindex.php\"";
            echo "</script>";
        }
    }
}
