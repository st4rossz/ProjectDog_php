<?php
include('userlayout/header.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if ($_SESSION['status'] == 0) {
    echo "<script>";
    echo "alert(\"กรุณารอการยืนยันจาก admin\");";
    echo "window.location=\"login.php\"";
    echo "</script>";
} elseif ($_SESSION['status'] == 2) {
    header('location: backend/adminindex.php');
} else { }

// if (isset($_SESSION['user_id'])){
//     echo "<script>";
//     echo "alert(\"มี ID\");";
//     echo "</script>";
// }

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
$user_id = $_SESSION['user_id'];
// $room_id = $_SESSION['room_id'];
?>

<body class="" style="font-family: Kanit Thin;">
    <?php include('userlayout/nav.php') ?>
    <div class="container-fluid bg-warning">
        <div class="row">
            <div class="col-md-12" text-center>
                <p style="padding-left: 45%; padding-top: 5%; font-family: Kanit thin; font-size: 25px;">รายการจองสปาร์สุนัขของท่าน</p>
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <table class="table table-bordered table-dark" style="margin-left: 15%; margin-right: 15%; margin-top: 3%; margin-bottom: 5%;">
                    <thead>
                        <tr>
                            <th>ชื่อสุนัข</th>
                            <th>วันเข้าใช้บริการ</th>
                            <th>ชื่อบริการ</th>
                            <th>สถานะ</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM use_service INNER JOIN dog on (use_service.dog_id = dog.dog_id) INNER JOIN service on (use_service.service_id = service.service_id) WHERE user_id = '$user_id'";
                        $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <th scope="row"> <?= $row["dog_name"] ?> </th>
                                <td><?= $row["us_date"] ?></td>
                                <td><?= $row["service_name"]; ?></td>
                                <td><?= $row["us_status"]; ?></td>
                                <td><?= $row["us_price"];?></td>
                                <?php
                                    ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>







    <?php include('userlayout/footer.php') ?>
</body>

</html>