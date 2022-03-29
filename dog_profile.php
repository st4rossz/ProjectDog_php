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
                <p style="padding-top: 2%; font-family: Kanit thin; font-size: 25px;">ข้อมูลสุนัขของท่าน</p>
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <img src="images/dogpf2.png" class="rounded-circle" style="width: 250px; height: 250px; " alt="">
            </div>
            <div class="col-md-12">
                <hr style="width: 35%; border: 3px solid black; margin-left: auto; margin-right: auto;">
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <table class="table table-striped table-dark" style="margin-left: 15%; margin-right: 15%; margin-bottom: 5%; box-shadow: 0px 0px 4px 4px grey;">
                    <thead>
                        <tr class="thead-dark">
                            <th style="width: 20%;">ชื่อสุนัข</th>
                            <th style="width: 20%;">พันธุ์</th>
                            <th style="width: 10%;">น้ำหนัก</th>
                            <th style="width: 10%;">อายุ</th>
                            <th style="width: 25%;">โรคประจำตัว</th>
                            <th style="width: 15%;">รูปสุนัข</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM dog WHERE user_id = '$user_id' ORDER BY dog_id desc";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr class="table-light">
                                <th scope="row"> <?= $row["dog_name"] ?> </th>
                                <td><?= $row["dog_type"] ?></td>
                                <td><?= $row["dog_weight"] ?></td>
                                <td><?= $row["dog_age"] ?></td>
                                <td><?= $row["dog_sickness"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#adddog_img<?php echo $row['dog_id'] ?>" data-whatever="@mdo" style="margin-left: 3%;"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></button></td>
                                <?php
                                    ?>
                            </tr>
                            <!-- หน้า Order การจองฝากเลี้ยง (Deposit) -->
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>ชื่อสุนัข : <?php echo $row["dog_name"]; ?> </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>ประเภทห้องพัก : <?php echo $row["room_type"]; ?> </p>
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

                            <!-- หน้า Order การจองฝากเลี้ยง (Deposit) -->
                            <div class="modal fade" id="showdog_img<?php echo $row["dog_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="api/cancel/dep_cancel.php">
                                            <input type="hidden" name="dep_id" value="<?= $row['dog_id']; ?>">
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
                                                <button type="submit" class="btn btn-success btn-lg">ยืนยัน</button>
                                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="adddog_img<?php echo $row["dog_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="api/dog/editdogimg.php" enctype="multipart/form-data">
                                            <input type="hidden" name="dog_id" value="<?= $row['dog_id']; ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">รูปภาพสุนัขของท่าน</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <?php
                                                        if (!empty($row['image'])) {
                                                            echo '<div class="col-md-12">';
                                                            echo '<img style="width: 450px; height: 450px;" src="api/dog/uploads/' . $row["image"] . '" alt="">';
                                                            echo '</div>';
                                                        } else {
                                                            echo '<div class="col-md-12">';
                                                            echo '<h5 style="color: red; margin-top: 3%; margin-left: 2%;">"ท่านยังไม่ได้เพิ่มรูปสุนัข"</h5>';
                                                            echo '<div class="col-md-6">';
                                                            echo '</div>';
                                                        }
                                                        ?>

                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="dogimagelabel" class="form-label">ใส่รูปสุนัขของท่าน </label>
                                                        <input type="file" name="image" id="inputdogimage" class="form-control" id="fileField" required />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-lg">ยืนยัน</button>
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