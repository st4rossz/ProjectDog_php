<?php
    include ('userlayout/header.php');

    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if($_SESSION['status'] == 0){
        echo "<script>";
        echo "alert(\"กรุณารอการยืนยันจาก admin\");";
        echo "window.location=\"login.php\"";
        echo "</script>";
    }elseif($_SESSION['status'] == 2){
        header('location: backend/adminindex.php');
    }else{

    }

    // if (isset($_SESSION['user_id'])){
    //     echo "<script>";
    //     echo "alert(\"มี ID\");";
    //     echo "</script>";
    // }

    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php'); 
    }
    $user_id = $_SESSION['user_id'];
    // $room_id = $_SESSION['room_id'];
?>

<body class="">
    <?php include ('userlayout/nav.php') ?>
    <div class="container-fluid bg-warning">
        <div class="row" style="padding-top: 25px;">
            <div class="col-xl-6 mt-4 mx-auto text-center">
                <div class="d-flex">
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#uadddog"
                        data-whatever="@mdo">เพิ่มสุนัข</button>
                </div>


                    <p>ตารางสุนัขของท่าน</p>
                <table class="table table-bordered table-dark">
                  <thead>
                    <tr>
                    <th>รหัสสุนัข</th>
                      <th>ชื่อสุนัข</th>
                      <th>รหัสลูกค้า</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM dog WHERE user_id = '$user_id' ";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <th scope="row"> <?= $row["dog_id"] ?> </th>
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["user_id"] ?></td>
                        <?php
                        ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
            <div class="col-xl-6 mt-4 mx-auto text-center">
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#deposit"
                        data-whatever="@mdo">ฝากเลี้ยง</button>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#useservice"
                        data-whatever="@mdo">ใช้บริการ</button>
                </div>
                <p>2</p>
            </div>
        </div>
    </div>







    <?php include ('userlayout/footer.php') ?>
</body>

</html>