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

<body class="">
    <?php include('userlayout/nav.php') ?>
    <div class="bg">

        <!-- <div class="bottom-left">Bottom Left</div>
            <div class="top-left">Top Left</div>
            <div class="top-right">Top Right</div>
            <div class="bottom-right">Bottom Right</div>
            <div class="centered">Centered</div> -->

    </div>
    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center" style="padding-top: 25px; background-color: #34495E;">
                    <p style="font-size: 25px; font-family: Kanit; color: #FDFDFD;"> ขั้นตอนใช้บริการ </p>
                    <hr style="width: 35%; border: 1px solid white; margin-left: auto; margin-right: auto;">
                </div>
            </div>
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
    <div class="container-fluid" style="background-color: #F4D03F;">
        <div class="row" style="padding-top: 25px;">


            <div class="col-md-4 text-center d-flex align-items-stretch">
                <div class="card text-center rounded-0" style="width: 20rem;  margin-left: 50%; margin-right: auto; margin-top: 5%; box-shadow: 10px 10px 0px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/dog_dep3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">โปรดเพิ่มสุนัขของท่าน</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Thin; font-size: 16px;">เพิ่มสุนัขสำหรับใช้บริการในครั้งหน้าและอัปเดทข้อมูลส่วนตัวเพื่อเก็บเป็นข้อมูลการเติบโตให้กับสุนัขของท่าน</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#uadddog" data-whatever="@mdo" style="font-family: Kanit thin;">เพิ่มสุนัข</button>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center d-flex align-items-stretch">
                <div class="card text-center rounded-0" style="width: 20rem; margin-left: auto; margin-right: auto; margin-top: 5%; box-shadow: 10px 10px 0px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/deposit_dog.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">ฝากเลี้ยงสุนัข</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Thin; font-size: 16px;">บริการรับฝากเลี้ยงสุนัขแบบแยกห้อง พร้อมห้องปรับอากาศ ดูแลและปล่อยสุนัขอย่างเป็นเวลา</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#deposit" data-whatever="@mdo" style="font-family: Kanit Thin; box-shadow: 2px 2px 0px;">ฝากเลี้ยง</button>
                        <!-- <a class="btn btn-danger" href="adddeposit.php">ทดสอบเพิ่มวันที่</a> -->
                    </div>
                </div>
            </div>
            <div class="col-4 text-center d-flex align-items-stretch">
                <div class="card text-center rounded-0" style="width: 20rem; margin-left: auto; margin-right: 50%; margin-top: 5%; box-shadow: 10px 10px 0px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/bath_dog.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">สปาร์สุนัข</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Thin; font-size: 16px;">บริการอาบน้ำ ตัดขน ตัดเล็บสุนัขครบวงจร</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                    <button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#useservice" data-whatever="@mdo" style="font-family: Kanit Thin; box-shadow: 2px 2px 0px;">ใช้บริการ</button>
                    </div>
                </div>
            </div>











                <!-- <a class="btn btn-danger" href="adddeposit.php">ทดสอบเพิ่มวันที่</a>
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
                </table> -->

            <!-- <div class="col-4 text-center">
                <a class="btn btn-danger" href="adddeposit.php">ทดสอบเพิ่มวันที่</a>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#deposit" data-whatever="@mdo">ฝากเลี้ยง</button>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#useservice" data-whatever="@mdo">ใช้บริการ</button>
                </div>
            </div> -->
        </div>
    </div>







    <?php include('userlayout/footer.php') ?>
</body>

</html>