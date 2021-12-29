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

<body class="">
    <?php include('userlayout/nav.php') ?>
    <div class="container">
        <div class="row">
            <img src="images/dog1.jpg" alt="Snow" style="width:100%;">
            <div class="bottom-left">Bottom Left</div>
            <div class="top-left">Top Left</div>
            <div class="top-right">Top Right</div>
            <div class="bottom-right">Bottom Right</div>
            <div class="centered">Centered</div>
        </div>
    </div>
    <!-- <div class="text-center">
                <div class="d-flex">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-mdb-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="opacity: 0.7;">
                                <img src="images/dog1.jpg" class="d-block w-100" alt="Wild Landscape" />
                            </div>
                            <div class="carousel-item">
                                <img src="images/dog2.jpg" class="d-block w-100" alt="Camera" />
                            </div>
                            <div class="carousel-item">
                                <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="d-block w-100" alt="Exotic Fruits" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    <div class="container-fluid bg-warning">
        <div class="row" style="padding-top: 25px;">
            <div class="col-6 text-center">
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#uadddog" data-whatever="@mdo">เพิ่มสุนัข</button>
                <p>ตารางสุนัขของท่าน</p>
                <table class="table table-bordered table-dark">
                  <thead>
                    <tr>
                    <th>รหัสสุนัข</th>
                      <th>ชื่อสุนัข</th>
                      <th>พันธุ์สุนัข</th>
                      <th>น้ำหนักสุนัข</th>
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
                                <td><?= $row["dog_type"] ?></td>
                                <td><?= $row["dog_weight"] ?></td>
                                <?php
                                    ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6 text-center">
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#deposit" data-whatever="@mdo">ฝากเลี้ยง</button>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#useservice" data-whatever="@mdo">ใช้บริการ</button>
                </div>
                <p>2</p>
            </div>
        </div>
    </div>







    <?php include('userlayout/footer.php') ?>
</body>

</html>