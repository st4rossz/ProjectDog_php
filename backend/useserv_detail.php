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
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            $us_id = $_GET['us_id'];
                            $sql = "SELECT * FROM use_service WHERE us_id = '$us_id'";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <div class="col-8">
                                    <h4 class="title" style="color: black;">รายละเอียดการใช้บริการ</h4>
                                </div>
                                <div class="col-2" style="padding-top: 1%;">
                                    <form method="POST" action="../api/use_servicestatus/_updateus_status.php">
                                        <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="us_id">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript:return confirm('ยันยันการจองหรือไม่?');">ยืนยันการจอง</button>
                                    </form>
                                </div>
                                <div class="col-2" style="padding-top: 1%;">
                                    <?php $us_id = $_GET['us_id']; ?>
                                    <form method="POST" action="../api/use_servicestatus/delete.php">
                                        <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="us_id">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="javascript:return confirm('แน่ใจว่าจะยกเลิกการจองนี้?');">ยกเลิกการจอง</button>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>

                        <hr>
                        <div class="col-md-12" style="font-family: Kanit light;">
                            <div class="card">
                                <?php
                                $us_id = $_GET['us_id'];
                                $sql = "SELECT * FROM use_service 
                                INNER JOIN dog ON (use_service.dog_id = dog.dog_id) 
                                INNER JOIN user ON (dog.user_id = user.user_id)
                                INNER JOIN service ON (use_service.service_id = service.service_id)
                                WHERE us_id = '$us_id'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <?php
                                        if (!empty($row['image'])) {
                                            echo '<div class="col-md-12">';
                                            echo '<div class="text-center">';
                                            echo '<img style="padding-top: 2%;
                                    display: block;
                                    margin-left: auto;
                                    margin-right: auto;
                                    width: 25%;" src="../api/dog/uploads/' . $row["image"] . '">';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="col-md-12">';
                                            echo '<h3 style="font-family: Kanit light; color: red; padding-left: 40%; padding-top: 2%;">"ผู้ใช้ท่านนี้ยังไม่มีการเพิ่มรูปสุนัข"</h3>';
                                            echo '</div>';
                                        }
                                        ?>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-top: 3%; padding-left: 7%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">รหัสการจองบริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['us_id']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 3%; padding-left: 4%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">วันที่เข้าใช้บริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 30px;;"><?= $row['us_date']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 3%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">อัตราค่าบริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['us_price']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4" style=" padding-left: 7%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">ชื่อบริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 30px;"><?= $row['service_name']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="padding-left: 4%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">วันที่เข้าใช้บริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['us_date']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">สถานะการใช้บริการ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['status_name']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4" style=" padding-left: 7%;">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">รหัสเจ้าของ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['user_id']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style=" padding-left: 4%; ">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">ชื่อเจ้าของ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 40px;"><?= $row['username']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card rounded-0" style="width: 25rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">อีเมล์เจ้าของ</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['email']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <hr style="width: 95%; border: solid grey 1px;">
                                            <h3 style="padding-left: 4%;">ข้อมูลเจ้าของ</h3>
                                            <hr style="width: 95%; border: solid grey 1px; ">
                                        </div>
                                    </div> -->


                                    <div class="row">
                                        <div class="col-md-2" style=" padding-left: 7%;">
                                            <div class="card rounded-0" style="width: 10rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">รหัสสุนัข</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 30px;"><?= $row['dog_id']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style=" padding-left: 5%;">
                                            <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">พันธุ์</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['dog_type']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style=" padding-left: 8%;">
                                            <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">ชื่อสุนัข</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['dog_name']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style=" padding-left: 11%;">
                                            <div class="card rounded-0" style="width: 15rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">น้ำหนักสุนัข(กิโลกรัม)</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['dog_weight']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style=" padding-left: 14%;">
                                            <div class="card rounded-0" style="width: 12rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">อายุ(ปี)</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['dog_age']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding-left: 5%;">
                                            <div class="card rounded-0" style="width: 91rem; height: 10rem; box-shadow: 0px 0px 5px grey;">
                                                <div class="card-body">
                                                    <h5 class="card-title">โรคประจำตัว/อาหารที่แพ้</h5>
                                                    <hr>
                                                    <p align="center" style="font-size: 25px;"><?= $row['dog_sickness']; ?></p>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-12" style=" padding-right: 5%;">
                                                <form method="POST" action="../api/use_servicestatus/_updateus_status.php">
                                                    <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="us_id">
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