<?php 

include '../api/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<table  class="table table-hover align-items-center"> 
    <thead class="thead-Secondary">
        <tr>
            <th>#</th>
            <th>วันที่เริ่มเข้าพัก</th>
            <th>วันที่สิ้นสุดการเข้าพัก</th>
            <th>testหัว4</th>
            <th>testหัว5</th>
        </tr>
    </thead>
    <tbody>  
    <?php 
    $i = 1;
    $where = ""; 
    if(isset($_GET['start'])){
        $date_start = $_GET['start'];
        $date_end = $_GET['end'];
        // $where = "WHERE dep_sdate = '$date_start' AND dep_edate = '$date_end' ";
        
        $where = "WHERE dep_sdate = '$date_start'";
    }
     $sql = "SELECT * FROM deposit $where";
     $query = mysqli_query($conn, $sql );
    while($result = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$result['dep_sdate']?></td>
            <td><?=$result['dep_edate']?></td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>
    </tbody>

    </table>
</body>
</html>