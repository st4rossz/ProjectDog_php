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

<body style="font-family: Kanit Light;">
    <?php include('userlayout/nav.php') ?>
    <div class="container-fluid justify-content-center" style="min-height: 100%;">
        <div class="row">
            <div class="col-md-12 text-center d-flex justify-content-center">
                <p style="padding-top: 2%; font-family: Kanit thin; font-size: 25px;">รายการจองสปาสุนัขของท่าน</p>
            </div>

            <div class="col-md-12 text-center d-flex justify-content-center">
                <img src="images/pet-care.png" style="width: 200px; height: 200px; " alt="">
            </div>
            <div class="col-md-12">
                <hr style="width: 35%; border: 3px solid black; margin-left: auto; margin-right: auto;">
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <table class="table table-striped table-dark" style="margin-left: 15%; margin-right: 15%; margin-bottom: 5%;box-shadow: 0px 0px 4px 4px  grey;">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 15%;">ชื่อสุนัข</th>
                            <th style="width: 20%;">วันเข้าใช้บริการ</th>
                            <th style="width: 20%;">ชื่อบริการ</th>
                            <th style="width: 5%;">ราคา</th>
                            <th style="width: 20%;">สถานะ</th>
                            <th style="width: 20%;">เพิ่มเติม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM use_service INNER JOIN dog on (use_service.dog_id = dog.dog_id) INNER JOIN service on (use_service.service_id = service.service_id) WHERE user_id = '$user_id'";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr class="table-light ">
                                <th scope="row"> <?= $row["dog_name"]; ?> </th>
                                <td><?= $row["us_date"]; ?></td>
                                <td><?= $row["service_name"]; ?></td>
                                <td><?= $row["us_price"]; ?></td>
                                <td><?= $row["status_name"]; ?></td>
                                <td><?php
                                        if ($row["us_status"] == 0) {
                                            $us_id = $row["us_id"];
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showus_detail' . $us_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#us_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#usor_del'. $us_id .'" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        } elseif ($row["us_status"] == 1) {
                                            $us_id = $row["us_id"];
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showus_detail' . $us_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#us_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#usor_del'. $us_id .'" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        } elseif ($row["us_status"] == 2) {
                                            $us_id = $row["us_id"];
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showus_detail' . $us_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#us_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#usor_del'. $us_id .'" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        } elseif ($row["us_status"] == 3) {
                                            $us_id = $row["us_id"];
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showus_detail' . $us_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#us_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#usor_del'. $us_id .'" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        } else {
                                            $us_id = $row["us_id"];
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showus_detail' . $us_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                            echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#us_basis" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#usor_del'. $us_id .'" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                        }
                                        ?></td>
                                <?php
                                    ?>
                            </tr>
                            <!-- หน้า Order สปาร์สุนัข(Use_service) -->
                            <div class="modal fade" id="showus_detail<?php echo $row["us_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจอง(สปาร์สุนัข)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center">

                                                <div class="col-md-12">
                                                    <p>ชื่อสุนัข : <?php echo $row["dog_name"]; ?></p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>ประเภทบริการ : <?php echo $row["service_name"]; ?></p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php
                                                        if (!empty($row['us_basis'])) {
                                                            echo '<div class="row"';
                                                            echo '<div class="col-md-12">';
                                                            echo '<label for="inputdogsickness" style="color: #16a085;" class="form-label"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true" ></i> หลักฐานการชำระเงิน</label>';
                                                            echo '<div class="col-md-12">';
                                                            echo '<img style="width: 100%; height: 100%;" src="api/pay/uploads/' . $row["us_basis"] . '">';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        } else {
                                                            echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีหลักฐานการชำระเงิน</p>';
                                                        }

                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- ยกเลิก (use_service) -->
                            <div class="modal fade" id="usor_del<?php echo $row["us_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="api/cancel/us_cancel.php">
                                            <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">โปรดยืนยัน</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        <p style="color: red;">ท่านต้องการยกเลิกการจองครั้งนี้หรือไม่ ?</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark btn-lg">ยืนยัน</button>
                                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>







    <?php include('userlayout/footer.php') ?>
</body>

</html>