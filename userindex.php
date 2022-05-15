<?php
include('userlayout/header.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}

if ($_SESSION['status'] == 0) {
    echo "<script>";
    echo "alert(\"กรุณารอการยืนยันจาก admin\");";
    echo "window.location=\"login.php\"";
    echo "</script>";
} elseif ($_SESSION['status'] == 2) {
    header('location: backend/dashboard.php');
} else {
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
$user_id = $_SESSION['user_id'];
?>

<body class="" style="font-family: Kanit Thin;min-height: 100%;">
    <?php include('userlayout/nav.php') ?>
    <div class="bg">
        <div class="" style="padding-top: 20%; padding-left: 15%; ">
            <h2 class="" style=" font-family: Kanit thin; color: black; font-size: 80px; text-shadow: 2px 1px 0px black;">Good Dog Home</h2>
            <hr style="width: 35%;">
            <p style="font-family: Kanit light; color: black; text-shadow: 2px 2px 0px white;">ร้านรับฝากเลี้ยงน้องหมา มีพี่ ๆ ดูแลอย่างใกล้ชิด มีสนามหญ้าให้น้อง ๆ ได้วิ่งเล่น ผ่อนคลาย</p>
            <p style="font-family: Kanit light; color: black; text-shadow: 2px 2px 0px white;">น้อง ๆ จะได้นอนห้องส่วนตัว แยกไซส์เล็ก-ใหญ่ ผู้ปกครองไว้ใจได้เลยค่ะ</p>
            <button type="button" onclick="window.location.href='usindex.php'" class="btn btn-success btn-lg" style="font-family: Kanit light; color: white; border-radius: 100px; box-shadow:0px 0px 10px green">ใช้บริการ</button>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #F4D03F;">
        <div class="row" style="padding-top: 25px;">
            <div class="col-md-12 text-center justify-content-center">

                <p style="font-family: Kanit medium; font-size: 35px;">เริ่มต้นใช้งาน</p>
                <hr style="width: 65%; margin-left: 18%;">
            </div>

            <div class="col-md-4 text-center d-flex justify-content-center">
                <div class="card text-center rounded-0" style="width: 20rem; margin-top: 3%; margin-left: 45%; margin-bottom: 10%; box-shadow: 0px 0px 10px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/logintest.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">สมัครสมาชิก/ล็อคอิน</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Light; font-size: 16px;">เป็นส่วนหนึ่งกับพวกเราด้วยการสมัครสมาชิก และล็อคอิน เพื่อง่ายต่อการใช้งานในครั้งถัดไป</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                        <button onclick="gologin()" type="button" class="btn btn-warning btn-lg" style="font-family: Kanit Thin; color:black; box-shadow: 2px 2px 0px;" disabled>ล็อคอินเลย</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center justify-content-center">
                <div class="card text-center rounded-0" style="width: 20rem; margin-top: 3%;  margin-left: 25%;  margin-bottom: 10%; box-shadow: 0px 0px 10px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/dogcard2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">เพิ่มสุนัข</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Light; font-size: 16px;">ลูกค้าสามารถเพิ่มสุนัขทั้งหมดที่ลูกค้ามีเพื่อเก็บเป็นข้อมูล สำหรับการใช้บริการในครั้งนี้และครั้งถัดไป</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                        <button type="button" data-toggle="modal" data-target="#adddog_detail" class="btn btn-warning btn-lg" style="font-family: Kanit Thin; color:black; box-shadow: 2px 2px 0px;">รายละเอียด</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center d-flex justify-content-center">
                <div class="card text-center rounded-0" style="width: 20rem; margin-top: 3%; margin-right: 40%;  margin-bottom: 10%; box-shadow: 0px 0px 10px #3C3B3D;">
                    <img class="card-img-top rounded-0" src="images/choose.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Kanit; font-size: 20px;">เลือกบริการ</h5>
                        <hr style="width: 75%; margin-left: 15%;">
                        <p class="card-text" style="font-family: Kanit Light; font-size: 16px;">เลือกใช้บริการที่ต้องการ และเลือกวันที่จะเข้าใช้บริการได้เลย</p>
                        <hr style="width: 75%; margin-left: 15%;">
                    </div>
                    <div class="card-footer">
                        <button type="button" data-toggle="modal" data-target="#use_detail" class="btn btn-warning btn-lg" style="font-family: Kanit Thin; color:black; box-shadow: 2px 2px 0px;">รายละเอียด</button>
                    </div>
                </div>
            </div>


            <div class="container-fluid" style="background-color: white;">
                <div class="row" style="padding-top: 25px; padding-bottom: 25px;">
                    <div class="col-md-5 justify-content-center ">
                        <hr style="width: 90%; margin-left: 10%; margin-top: 3%;">
                    </div>
                    <div class="col-md-2 text-center justify-content-center">
                        <p style="font-family: Kanit medium; font-size: 35px;">เกี่ยวกับเรา</p>
                    </div>
                    <div class="col-md-5 justify-content-center ">
                        <hr style="width: 90%; margin-right: 5%; margin-top: 3%;">
                    </div>

                    <div class="col-md-6 justify-content-center">
                        <p style="font-family: Kanit light; margin-left: 45%;">
                            - รับฝากเลี้ยงน้องหมา​ ทุกขนาด​<br>
                            - นอนห้องแอร์ เย็นสบาย ไม่แออัด แอร์ 12,000 BTU <br>
                            - แยกบ้าน แยกห้อง​ น้องหมาพันธุ์เล็ก-ใหญ่ <br>
                            - มีถาดรองฉี่ พร้อมแผ่นซับ ให้บริการฟรี <br>
                            - เปลี่ยนและทำความสะอาด ชามข้าว​ ชามน้ำ​ เช้า -เย็น <br>
                            - ทางบ้านใช้น้ำกรอง ให้น้องกิน เพื่อสุขภาพปลอดเชื้อ <br>
                        </p>
                    </div>
                    <div class="col-md-6 justify-content-center">
                        <p style="font-family: Kanit light; margin-left: 15%;">
                            - พาวิ่งเล่น อย่างน้อย 4 เวลา(เช้า-เที่ยง-เย็น-ก่อนนอน) <br>
                            - ทำความสะอาดที่พักทุกวัน​ พ่นไบติคอล-​น้ำยาฆ่าเชื้อ <br>
                            - เจ้าของบ้านดูแลน้องๆ เอง พร้อมพี่เลี้ยง <br>
                            - น้องหมาขนสั้น ฝากเกิน 7 วัน อาบน้ำฟรี <br>
                            - มีบริการรับ-ส่ง เริ่มต้นที่ 80 บาท จ้า</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="background-color: white;">
                <div class="row" style="padding-top: 25px; padding-bottom: 25px;">
                    <div class="col-md-5 justify-content-center ">
                        <hr style="width: 90%; margin-left: 10%; margin-top: 3%;">
                    </div>
                    <div class="col-md-2 text-center justify-content-center">
                        <p style="font-family: Kanit medium; font-size: 35px;">แกลเลอรี่</p>
                    </div>
                    <div class="col-md-5 justify-content-center ">
                        <hr style="width: 90%; margin-right: 30%; margin-top: 3%;">
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="images/gal1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="images/gal2.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="images/gal3.jpg" alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="images/gal4.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a data-toggle="modal" data-target="#r1">
                                            <img src="images/r1.jpg" class="w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a data-toggle="modal" data-target="#r2">
                                            <img src="images/r2.jpg" class="w-100" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a data-toggle="modal" data-target="#r3">
                                            <img src="images/r5.jpg" class="w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a data-toggle="modal" data-target="#r4">
                                            <img src="images/r4.jpg" class="w-100" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('userlayout/footer.php') ?>

            <div class="modal fade" id="r1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <img src="images/r1.jpg" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="r2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <img src="images/r2.jpg" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="r3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <img src="images/r5.jpg" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="r4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <img src="images/r4.jpg" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>