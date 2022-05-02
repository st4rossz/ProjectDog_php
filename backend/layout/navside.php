<nav class="sidebar">
    <div class="text">
        <img src="../images/gooddoghome.jpg" style="width: 25px; height: 25px;" alt="">
        <strong><?php echo $_SESSION['username']; ?></strong>
    </div>
    <hr style="border-bottom: 1px solid grey;">

    <ul style="overflow-y:auto;">

        <li>
            <a href="dashboard.php">
                <i style="font-size: 20px; padding-right: 15px;" class="fa fa-bar-chart"></i>
                สรุปข้อมูลการให้บริการ
            </a>
        </li>

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
            <a data-toggle="collapse" href="#cashpay" aria-expanded="false" aria-controls="cashpay" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="fa fa-money"></i>
                ยืนยันการรับชำระโดยเงินสด
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="cashpay">

                <ul class="serv-show">
                    <li>
                        <a href="uscash_pay.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="depcash_pay.php">
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
                    <!-- <li>
                        <a href="us_return.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li> -->
                    <li>
                        <a href="dep_return.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li>
            <a data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="colret" class="base-btn">
                <i style="font-size: 20px; padding-right: 15px;" class="nc-icon nc-single-copy-04"></i>
                รายงาน
                <span style="font-size: 12px;" class="nc-icon nc-minimal-down"></span>
            </a>
            <div class="collapse" id="report">

                <ul class="serv-show">
                    <li>
                        <a href="report_service.php">
                            <p>สปาร์สุนัข</p>
                        </a>
                    </li>
                    <li>
                        <a href="report_deposit.php">
                            <p>ฝากเลี้ยง</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>