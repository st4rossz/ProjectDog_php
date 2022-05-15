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
} else {
}

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
                            <th style="width: 10%;">บริการส่งสุนัข</th>
                            <th style="width: 10%;">รวมค่าบริการ</th>
                            <th style="width: 10%;">สถานะ</th>
                            <th style="width: 10%;">เพิ่มเติม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM deposit INNER JOIN dog on (deposit.dog_id = dog.dog_id) INNER JOIN room on (deposit.room_id = room.room_id) WHERE user_id = '$user_id' ORDER BY dep_status";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr class="table-light">
                                <th scope="row"> <?= $row["dog_name"] ?> </th>
                                <td><?= $row["dep_sdate"] ?></td>
                                <td><?= $row["dep_edate"] ?></td>
                                <td><?= $row["dep_day"] ?></td>
                                <td><?= $row["room_type"]; ?></td>
                                <td><?= $row["dep_deliver"]; ?></td>
                                <td><?= $row["dep_price"]; ?></td>
                                <td><?= $row["status_name"]; ?></td>
                                <td style="width: 15%;"><?php
                                                        if ($row["dep_status"] == 0) {
                                                            $dep_id = $row["dep_id"];
                                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail' . $dep_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            // echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                        } elseif ($row["dep_status"] == 1) {
                                                            $dep_id = $row["dep_id"];
                                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail_2' . $dep_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            // echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                        } elseif ($row["dep_status"] == 2) {
                                                            $dep_id = $row["dep_id"];
                                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail_2' . $dep_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            // echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                        } elseif ($row["dep_status"] == 3) {
                                                            $dep_id = $row["dep_id"];
                                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail_2' . $dep_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            // echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                            // } elseif ($row["dep_status"] == 4) {
                                                            //     $dep_id = $row["dep_id"];
                                                            //     echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail_2' . $dep_id . '"><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            //     echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            //     echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                        } else {
                                                            $dep_id = $row["dep_id"];
                                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showdep_detail' . $dep_id . '" disabled><i class="fa fa-book fa-lg" aria-hidden="true" ></i></button>';
                                                            // echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#dep_basis" data-whatever="@mdo" style="margin-left: 3%;" disabled><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>';
                                                            echo '<button type="button" class="btn btn-dark " data-toggle="modal" data-target="#depor_del' . $dep_id . '" style="margin-left: 3%;" disabled><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>';
                                                        }
                                                        ?></td>
                                <?php
                                ?>
                            </tr>
                            <!-- หน้า Order การจองฝากเลี้ยง (Deposit) status 1 2 3 4 -->
                            <div class="modal fade" id="showdep_detail_2<?php echo $row["dep_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจอง(ฝากเลี้ยง)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>ชื่อสุนัข : <?php echo $row["dog_name"]; ?> </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>ประเภทห้องพัก : <?php echo $row["room_type"]; ?> </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>จำนวนวัน : <?php echo $row["dep_day"]; ?> วัน</p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>ราคา : <?php echo $row["dep_price"]; ?> บาท</p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>วันเข้าใช้บริการ : <?php echo $row["dep_sdate"]; ?> </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>วันสิ้นสุดการให้บริการ : <?php echo $row["dep_edate"]; ?> </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php
                                                    if (!empty($row['dep_basis'])) {
                                                        echo '<div class="row"';
                                                        echo '<div class="col-md-12">';
                                                        echo '<label for="inputdogsickness" style="color: #16a085;" class="form-label"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true" ></i> หลักฐานการชำระเงิน</label>';
                                                        echo '<div class="col-md-12">';
                                                        echo '<img style="width: 100%; height: 100%;" src="api/pay/uploads/' . $row["dep_basis"] . '">';
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

                            <div class="modal fade" id="showdep_detail<?php echo $row["dep_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจอง(ฝากเลี้ยง)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="api/pay/addbasis.php" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>ชื่อสุนัข : <?php echo $row["dog_name"]; ?> </p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>ประเภทห้องพัก : <?php echo $row["room_type"]; ?> </p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>จำนวนวัน : <?php echo $row["dep_day"]; ?> วัน</p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>ราคา : <?php echo $row["dep_price"]; ?> บาท</p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>วันเข้าใช้บริการ : <?php echo $row["dep_sdate"]; ?> </p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>วันสิ้นสุดการให้บริการ : <?php echo $row["dep_edate"]; ?> </p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php
                                                        if (!empty($row['dep_basis'])) {
                                                            echo '<div class="row"';
                                                            echo '<div class="col-md-12">';
                                                            echo '<label for="inputdogsickness" style="color: #16a085;" class="form-label"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true" ></i> หลักฐานการชำระเงิน</label>';
                                                            echo '<div class="col-md-12">';
                                                            echo '<img style="width: 100%; height: 100%;" src="api/pay/uploads/' . $row["dep_basis"] . '">';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        } else {
                                                            echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีหลักฐานการชำระเงิน</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="hidden" value="<?php echo $row["dep_id"]; ?>" name="dep_id" id='dep_id'>
                                                        <label for="dep_basisimage" class="form-label">ส่งหลักฐานการโอนเงิน :</label>
                                                        <input type="file" name="dep_basis" id="dep_basis" class="form-control" required />
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
                                            <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- หน้า Order การจองฝากเลี้ยง (Deposit) -->
                            <div class="modal fade" id="depor_del<?php echo $row["dep_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form id="deleteDeposit">
                                            <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">โปรดยืนยัน</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        ท่านต้องการยกเลิกการจองครั้งนี้หรือไม่ ?
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
    <script>
        $("#deleteDeposit").submit(function(e) {
            e.preventDefault()
            var formData = $(this).serialize()
            $.post('api/cancel/dep_cancel.php', formData, function(data) {
                if (data.success) {
                    swal("ยกเลิกการจองสำเร็จ", " ", "success").then(function() {
                        window.location = "userdepositorder.php";
                    })
                } else {
                    swal(" " + data.msg, " ", "error")
                }
            }, 'json')
        })
    </script>
</body>

</html>