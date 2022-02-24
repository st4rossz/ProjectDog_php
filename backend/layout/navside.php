<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="assets/img/logo-small.png">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="adminindex.php" class="simple-text logo-normal">
            <strong><?php echo $_SESSION['username']; ?>
                <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
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
                <a href="record.php">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>บันทึกการติดตามสุนัข</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="return.php">
                    <i class="nc-icon nc-satisfied"></i>
                    <p>ยืนยันสถานะการคืนสุนัข</p>
                </a>
                <hr>
            </li>
            <li class="active">
                <a href="pay.php">
                    <i class="nc-icon nc-credit-card"></i>
                    <p>ยืนยันการชำระเงิน</p>
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



            <!-- 
            <li class="active">
                <a href="base_store.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลร้าน</p>
                </a>
            </li>
            <li class="active">
                <a href="base_room.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลห้องพัก</p>
                </a>
            </li>
            <li class="active">
                <a href="base_service.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลบริการ</p>
                </a>
            </li>
            <li class="active">
                <a href="base_dog.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลสุนัข</p>
                </a>
            </li>
  -->




        </ul>
    </div>

</div>