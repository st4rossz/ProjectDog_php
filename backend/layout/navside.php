<!-- <div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="assets/img/logo-small.png">
            </div>
        </a>
        <a href="adminindex.php" class="simple-text logo-normal">
            <strong><?php echo $_SESSION['username']; ?></strong>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="adminindex.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>ยืนยันการสมัคร</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>ข้อมูลพื้นฐาน</p>
                </a>
                <ul style="padding-left: 30%;">
                    <li class="active">
                        <a href="base_store.php">
                            <p>ข้อมูลร้าน</p>
                        </a>
                    </li>
                </ul>
                <ul style="padding-left: 30%;">
                    <li class="active">
                        <a href="base_room.php">
                            <p>ข้อมูลห้องพัก</p>
                        </a>
                    </li>
                </ul>
                <ul style="padding-left: 30%;">
                    <li class="active">
                        <a href="base_service.php">
                            <p>ข้อมูลบริการ</p>
                        </a>
                    </li>
                </ul>
                <ul style="padding-left: 30%;">
                    <li class="active">
                        <a href="base_dog.php">
                            <p>ข้อมูลสุนัข</p>
                        </a>
                    </li>
                </ul>
                <hr>
            </li>
            <li class="active">
                <a href="useservice_confirm.php">
                    <i class="nc-icon nc-check-2"></i>
                    <p>ยืนยันเข้าใช้บริการ</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="dep_confirm.php">
                    <i class="nc-icon nc-check-2"></i>
                    <p>ยืนยันการจองฝากเลี้ยง</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="us_record.php">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>บันทึกสุนัข (สปาร์สุนัข)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="dep_record.php">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>บันทึกสุนัข (ฝากเลี้ยง)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="us_pay.php">
                    <i class="nc-icon nc-credit-card"></i>
                    <p>ยืนยันการชำระเงิน (สปาร์สุนัข)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="dep_pay.php">
                    <i class="nc-icon nc-credit-card"></i>
                    <p>ยืนยันการชำระเงิน (ฝากเลี้ยง)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="us_return.php">
                    <i class="nc-icon nc-satisfied"></i>
                    <p>ยืนยันการคืนสุนัข (สปาร์สุนัข)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="dep_return.php">
                    <i class="nc-icon nc-satisfied"></i>
                    <p>ยืนยันการคืนสุนัข (ฝากเลี้ยง)</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="report.php">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>รายงาน</p>
                </a>
                <hr>
            </li>
        </ul>
    </div>
</div> -->


<nav class="sidebar">
    <div class="text">
        <img src="../images/gooddoghome.jpg" style="width: 25px; height: 25px;" alt="">
        <strong><?php echo $_SESSION['username']; ?></strong></div>
    <hr style="border-bottom: 1px solid grey;">

    <!-- <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="width: 99%; background-color: white; color: orange;">
            Link with href
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <li>
                <a href="base_store.php">
                    <p>ข้อมูลร้าน</p>
                </a>
            </li>
        </div>
    </div> -->



    <ul>
        <li>
            <a href="adminindex.php">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-single-02"></i>
                ยืนยันการสมัคร
            </a>
        </li>

        <li>
            <a data-toggle="collapse" href="#colbase" aria-expanded="false" aria-controls="colbase" class="link-danger">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-simple-add"></i>
                ข้อมูลพื้นฐาน
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down first"></span>
            </a>
            <div class="collapse" id="colbase">

                <ul class="base-show">
                    <li>
                        <a href="base_store.php">
                            <p>ข้อมูลร้าน</p>
                        </a>
                    </li>
                    <li>
                        <a href="base_room.php">
                            <p>ข้อมูลห้องพัก</p>
                        </a>
                    </li>


                    <li>
                        <a href="base_service.php">
                            <p>ข้อมูลบริการ</p>
                        </a>
                    </li>

                    <li>
                        <a href="base_dog.php">
                            <p>ข้อมูลสุนัข</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#colpay" aria-expanded="false" aria-controls="colpay" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-credit-card"></i>
                ยืนยันสถานะการชำระเงิน
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="colpay">

                <ul class="serv-show">
                    <li>
                        <a href="us_pay.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="dep_pay.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#colus" aria-expanded="false" aria-controls="colus" class="base-btn">
                <i style="font-size: 20px; padding-right: 12px;" class="fa fa-handshake-o"></i>
                ยืนยันการเข้าใช้บริการ
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="colus">

                <ul class="serv-show">
                    <li>
                        <a href="useservice_confirm.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="dep_confirm.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <hr style="border: 0.5px solid #EE5A24; width: 55%; margin: auto;"> -->
        </li>

        <li>
            <a data-toggle="collapse" href="#colrec" aria-expanded="false" aria-controls="colrec" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-tag-content"></i>
                บันทึกการติดตามสุนัข
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="colrec">

                <ul class="serv-show">
                    <li>
                        <a href="us_record.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="dep_record.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#atstore" aria-expanded="false" aria-controls="atstore" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-check-2"></i>
                บันทึกข้อมูลการรับสุนัขกลับ
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="atstore">

                <ul class="serv-show">
                    <li>
                        <a href="us_atstore.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="dep_atstore.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li>
            <a data-toggle="collapse" href="#colret" aria-expanded="false" aria-controls="colret" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-satisfied"></i>
                ยืนยันการคืนสุนัข
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="colret">

                <ul class="serv-show">
                    <li>
                        <a href="us_return.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="dep_return.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="report.php">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-single-copy-04"></i>
                ออกรายงาน
            </a>
        </li>



    </ul>
</nav>