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
                <a href="base_store.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลร้าน</p>
                </a>
                <a href="base_room.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลห้องพัก</p>
                </a>
                <a href="base_service.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลบริการ</p>
                </a>
                <a href="base_dog.php">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>เพิ่มข้อมูลสุนัข</p>
                </a>
                <a href="confirm_service.php">
                    <i class="nc-icon nc-check-2"></i>
                    <p>ยืนยันเข้าใช้บริการ</p>
                </a>
                <a href="confirm_deposit.php">
                    <i class="nc-icon nc-check-2"></i>
                    <p>ยืนยันการจองฝากเลี้ยง</p>
                </a>
            </li>
        </ul>
    </div>

</div>