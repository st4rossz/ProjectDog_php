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
                <p style="padding-top: 2%; font-family: Kanit thin; font-size: 25px;">ข้อมูลลูกค้า</p>
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <img src="images/user.png" class="rounded-circle" style="width: 250px; height: 250px; " alt="">
            </div>
            <div class="col-md-12">
                <hr style="width: 35%; border: 3px solid black; margin-left: auto; margin-right: auto;">
            </div>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <table class="table table-striped table-dark" style="margin-left: 15%; margin-right: 15%; margin-bottom: 5%; box-shadow: 0px 0px 4px 4px grey;">
                    <thead>
                        <tr class="thead-dark">
                            <th style="width: 5%;">รหัสผู้ใช้</th>
                            <th style="width: 10%;">ชื่อผู้ใช้</th>
                            <th style="width: 20%;">อีเมล์</th>
                            <th style="width: 30%;">ที่อยู่</th>
                            <th style="width: 15%;">ชื่อ-สกุล</th>
                            <th style="width: 10%;">เพิ่มเติม</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr class="table-light">
                                <th scope="row"> <?= $row["user_id"] ?> </th>
                                <td><?= $row["username"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><?= $row["address"] ?></td>
                                <td><?= $row["fullname"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#edit_user<?php echo $row['user_id'] ?>" data-whatever="@mdo" style="margin-left: 3%;">แก้ไข <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                </td>
                                <?php
                                ?>
                            </tr>

                            <div class="modal fade" id="edit_user<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form id="updateUser">
                                            <input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <label for="" class="form-label">อีเมล์ :</label>
                                                        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-12 text-left">
                                                        <label for="" class="form-label">ที่อยู่ :</label>
                                                        <input type="text" name="address" value="<?= $row['address'] ?>" class="form-control" required />
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
    <script>
        $("#updateUser").submit(function(e) {
            e.preventDefault()
            var formData = $(this).serialize()
            $.post('api/user/edit_user.php', formData, function(data) {
                if (data.success) {
                    swal("แก้ไขข้อมูลสำเร็จ", " ", "success").then(function() {
                        window.location = "user_profile.php";
                    })
                } else {
                    swal(" " + data.msg, " ", "error")
                }
            }, 'json')
        })
    </script>
</body>

</html>