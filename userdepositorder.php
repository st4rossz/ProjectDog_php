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

<body style="font-family: Kanit Light">
    <?php include('userlayout/nav.php') ?>
    <div class="container-fluid" style="min-height: 100%;">
        <div class="row">
            <div class="col-md-12 text-center d-flex justify-content-center">
                <p style="padding-top: 2%; font-family: Kanit thin; font-size: 25px;">รายการจองฝากเลี้ยงของท่าน</p>
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <img src="images/dep_about.png" style="width: 200; height: 200px; " alt="">
            </div>
            <div class="col-md-12">
                <hr style="width: 35%; border: 3px solid black; margin-left: auto; margin-right: auto;">
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <table class="table table-striped table-dark" style="margin-left: 15%; margin-right: 15%; margin-bottom: 5%; box-shadow: 0px 0px 4px 4px grey;">
                    <thead>
                        <tr class="thead-dark">
                            <th style="width: 10%;">ชื่อสุนัข</th>
                            <th style="width: 10%;">วันเข้าใช้บริการ</th>
                            <th style="width: 10%;">วันรับสุนัขกลับ</th>
                            <th style="width: 5%;">จำนวนวัน</th>
                            <th style="width: 10%;">ชื่อประเภทห้อง</th>
                            <th style="width: 10%;">ราคา</th>
                            <th style="width: 15%;">สถานะ</th>
                            <th style="width: 20%;">เพิ่มเติม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM deposit INNER JOIN dog on (deposit.dog_id = dog.dog_id) INNER JOIN room on (deposit.room_id = room.room_id) WHERE user_id = '$user_id' ORDER BY dep_status desc";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr class="table-light">
                                <th scope="row"> <?= $row["dog_name"] ?> </th>
                                <td><?= $row["dep_sdate"] ?></td>
                                <td><?= $row["dep_edate"] ?></td>
                                <td><?= $row["dep_day"] ?></td>
                                <td><?= $row["room_type"]; ?></td>
                                <td><?= $row["dep_price"]; ?></td>
                                <td><?= $row["status_name"]; ?></td>
                                <td><?php
                                        if ($row["dep_status"] == 0) {
                                            echo '<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#showdep_detail" data-whatever="@mdo"><i class="fa fa-book fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';

                                        } elseif ($row["dep_status"] == 1) {
                                            echo '<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#showdep_detail" data-whatever="@mdo"><i class="fa fa-book fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';

                                        } elseif ($row["dep_status"] == 2){
                                            echo '<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#showdep_detail" data-whatever="@mdo"><i class="fa fa-book fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';

                                        }else if ($row["dep_status"] == 3){
                                            echo '<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#showdep_detail" data-whatever="@mdo"><i class="fa fa-book fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';

                                        }else{
                                            echo '<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#showdep_detail" data-whatever="@mdo"><i class="fa fa-book fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        }
                                        ?></td>
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