<?php include 'layout/header.php'; ?>

<body class="bodyfont">
    <div class="wrapper">

        <?php include 'layout/navside.php'; ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'layout/nav.php'; ?>
            <!-- End Navbar -->

            <!-- Content -->
            <div class="content">
                <div class="row">
                    <?php
                    $dep_id = $_GET['dep_id'];
                    $sql = "SELECT * FROM deposit WHERE dep_id = '$dep_id'";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <div class="col-8">
                            <h4 class="title" style="color: black;">รายละเอียดการจองฝากเลี้ยง</h4>
                        </div>
                        <div class="col-2" style="padding-top: 1%;">
                            <form method="POST" action="../api/depositstatus/_updatedepstatus.php">
                                <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>" id="dep_id">
                                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript:return confirm('ยันยันการจองหรือไม่?');">ยืนยันการจอง</button>
                            </form>
                        </div>
                        <div class="col-2" style="padding-top: 1%;">
                            <?php $dep_id = $_GET['dep_id']; ?>
                            <form method="POST" action="../api/depositstatus/delete.php">
                                <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>" id="dep_id">
                                <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="javascript:return confirm('แน่ใจว่าจะยกเลิกการจองนี้?');">ยกเลิกการจอง</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>



                <hr>
                <div class="col-md-12" style="font-family: Kanit Light;">
                    <div class="card">
                        <?php
                        $dep_id = $_GET['dep_id'];
                        $sql = "SELECT *, dog.image as img FROM deposit 
                                INNER JOIN dog ON (deposit.dog_id = dog.dog_id) 
                                INNER JOIN user ON (dog.user_id = user.user_id)
                                INNER JOIN room ON (deposit.room_id = room.room_id)
                                WHERE dep_id = '$dep_id'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
    
                            <?php
                           
                                if (!empty($row['image'])) {
                                    // echo '<div class="col-md-12 justify-content-center d-flex" style="padding-top: 3%;">';
                                    // echo '<img style="width: 40%;" src="../api/dog/uploads/' . $row["image"] . '">';
                                    // echo '</div>';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="text-center">';
                                    echo '<img style="padding-top: 2%;
                                    display: block;
                                    margin-left: auto;
                                    margin-right: auto;
                                    width: 25%;" src="../api/dog/uploads/' . $row["image"] . '">';
                                    echo '</div>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-12 justify-content-center d-flex" style="padding-top: 3%;">';
                                    echo '<h3 style="color: red;">*ไม่มีรูปสุนัข*</h3>';
                                    echo '</div>';
                                }
                                
                                ?>
                            <div class="row">
                                <div class="col-md-2" style="padding-top: 3%; padding-left: 7%;">
                                    <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                        <div class="card-body">
                                            <h5 class="card-title">รหัสการจอง</h5>
                                            <hr>
                                            <p align="center" style="font-size: 40px;"><?= $row['dep_id']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-top: 3%; padding-left: 7%;">
                                    <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                        <div class="card-body">
                                            <h5 class="card-title">วันที่เข้าใช้บริการ</h5>
                                            <hr>
                                            <p align="center" style="font-size: 30px;;"><?= $row['dep_sdate']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-top: 3%; padding-left: 9%;">
                                    <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                        <div class="card-body">
                                            <h5 class="card-title">วันที่รับสุนัขกลับ</h5>
                                            <hr>
                                            <p align="center" style="font-size: 30px;;"><?= $row['dep_edate']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-top: 3%; padding-left: 11%;">
                                    <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                        <div class="card-body">
                                            <h5 class="card-title">จำนวนวัน</h5>
                                            <hr>
                                            <p align="center" style="font-size: 40px;"><?= $row['dep_day']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4" style=" padding-left: 10%;">
                                        <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">ชื่อประเภทห้อง</h5>
                                                <hr>
                                                <p align="center" style="font-size: 40px;"><?= $row['room_type']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style=" padding-left: 11%;">
                                        <div class="card rounded-0" style="width: 29rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">สถานะการจอง</h5>
                                                <hr>
                                                <p align="center" style="font-size: 30px;"><?= $row['status_name']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style=" padding-left: 16%;">
                                        <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">ราคา(บาท)</h5>
                                                <hr>
                                                <p align="center" style="font-size: 40px;"><?= $row['dep_price']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4" style=" padding-left: 10%;">
                                        <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">รหัสเจ้าของ</h5>
                                                <hr>
                                                <p align="center" style="font-size: 40px;"><?= $row['user_id']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style=" padding-left: 11%;">
                                        <div class="card rounded-0" style="width: 29rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">ชื่อเจ้าของ</h5>
                                                <hr>
                                                <p align="center" style="font-size: 40px;"><?= $row['username']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style=" padding-left: 16%;">
                                        <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">อีเมล์เจ้าของ</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['email']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2" style=" padding-left: 8%;">
                                        <div class="card rounded-0" style="width: 10rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">รหัสสุนัข</h5>
                                                <hr>
                                                <p align="center" style="font-size: 30px;"><?= $row['dog_id']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style=" padding-left: 3%;">
                                        <div class="card rounded-0" style="width: 20rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">พันธุ์</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['dog_type']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style=" padding-left: 8rem;">
                                        <div class="card rounded-0" style="width: 20rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">ชื่อสุนัข</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['dog_name']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style=" padding-left: 13rem;">
                                        <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">น้ำหนัก(กิโลกรัม)</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['dog_weight']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style=" padding-left: 13rem;">
                                        <div class="card rounded-0" style="width: 12rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">อายุ(ปี)</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['dog_age']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-left: 8%;">
                                        <div class="card rounded-0" style="width: 84rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                            <div class="card-body">
                                                <h5 class="card-title">โรคประจำตัว/อาหารที่แพ้</h5>
                                                <hr>
                                                <p align="center" style="font-size: 25px;"><?= $row['dog_sickness']; ?></p>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12" style=" padding-right: 5%; padding-top: 3%;">
                                            <form method="POST" action="../api/depositstatus/_updatedepstatus.php">
                                                <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>" id="dep_id">
                                                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript:return confirm('ยันยันการจองหรือไม่?');">ยืนยันการจอง</button>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                        <div class="col-md-12" style="padding-top: 3%; padding-left: 5%;">
                                            <form method="POST" action="../api/depositstatus/_updatedepstatus.php">
                                                <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>" id="dep_id">
                                                <button type="button" class="btn btn-success">เพิ่มข้อมูลบริการ</button>
                                            </form> -->

                    </div>
                </div>



                <!-- <p><?= $row['dog_type']; ?></p>
                                        <p><?= $row['username']; ?></p> -->
            <?php } ?>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>

</body>

</html>