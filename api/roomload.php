<?php
include 'server.php';

$dep_sdate = $_POST["dep_sdateid"];
$dep_edate = $_POST["dep_edateid"];
$room_id = $_POST["deproom_id"];

$emptyroom1 = "SELECT COUNT(dep_id) AS emp1 FROM deposit WHERE room_id = 1 AND dep_sdate = CURRENT_DATE OR dep_edate = CURRDENT_DATE";

if ($room_id && $dep_sdate && $dep_edate) {
   $bookdatecheck1 = "SELECT COUNT(dep_id) AS depcheck1 FROM deposit WHERE room_id = 1 AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate' OR dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
   $query1 = mysqli_query($conn, $bookdatecheck1);
   $result1 = mysqli_fetch_assoc($query1);

   $bookdatecheck2 = "SELECT COUNT(dep_id) AS depcheck2 FROM deposit WHERE room_id = 2 AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate' OR dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
   $query2 = mysqli_query($conn, $bookdatecheck2);
   $result2 = mysqli_fetch_assoc($query2);

   $bookdatecheck3 = "SELECT COUNT(dep_id) AS depcheck3 FROM deposit WHERE room_id = 3 AND(dep_sdate BETWEEN '$dep_sdate' AND '$dep_edate' OR dep_edate BETWEEN '$dep_sdate' AND '$dep_edate')";
   $query3 = mysqli_query($conn, $bookdatecheck3);
   $result3 = mysqli_fetch_assoc($query3);

   $chkroom1 = "SELECT room_quantity as rq1 FROM room WHERE room_id = 1 ";
   $q1 = mysqli_query($conn, $chkroom1);
   $rs1 = mysqli_fetch_assoc($q1);

   $chkroom2 = "SELECT room_quantity as rq2 FROM room WHERE room_id = 2 ";
   $q2 = mysqli_query($conn, $chkroom2);
   $rs2 = mysqli_fetch_assoc($q2);

   $chkroom3 = "SELECT room_quantity as rq3 FROM room WHERE room_id = 3 ";
   $q3 = mysqli_query($conn, $chkroom3);
   $rs3 = mysqli_fetch_assoc($q3);

   $cal1 = $rs1['rq1'] - $result1['depcheck1'];
   $cal2 = $rs2['rq2'] - $result2['depcheck2'];
   $cal3 = $rs3['rq3'] - $result3['depcheck3'];

   $export['success'] = true;
   $export['cal1'] = $cal1;
   $export['cal2'] = $cal2;
   $export['cal3'] = $cal3;
} else {
   $export['success'] = false;
}
echo json_encode($export);


//   echo '<pre>'; print_r($rs); echo '</pre>';
//   echo '<pre>'; print_r($result2['depcheck1']); echo '</pre>';

// $cal = $rs['rq'] - $result2['depcheck1'];

// echo $cal;

// if ($query) {
//     $row = mysqli_fetch_assoc($query);
//     $export['dc'] = $row['room_type'];
//     $export['success'] = true;
// }else{
//     $export['success'] = false;
// }

// echo json_encode($export);

// if ($result2['depcheck1'] >= $rs['rq']) {
//    $export['dc'] = "ห้องเต็ม";
//    $export['success'] = true;
//    $export['cal'] = $cal;
// } elseif($result2['depcheck1'] < $rs['rq']) {
//    $export['dc'] = "ห้องว่าง";
//    $export['success'] = true;
// }else{
//    $export['success'] = false;
// }
// echo json_encode($export);

// if ($rs && $result2) {
//    // $export['dc'] = "ห้องเต็ม";
//    $export['success'] = true;
//    $export['cal'] = $cal;
// } else {
//    $export['success'] = false;
// }
// echo json_encode($export);
