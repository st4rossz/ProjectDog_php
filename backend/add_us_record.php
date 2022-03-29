<?php
include 'layout/header.php';
?>

<body class="bodyfont">
    <div class="wrapper ">
        <?php
        include 'layout/navside.php';
        ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php
            include 'layout/nav.php';
            ?>
            <!-- End Navbar -->

            <!-- Content -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h4 class="title">เพิ่มบันทึกการติดตามสุนัข (สปาร์สุนัข) </h4>
                            <hr>
                        </div>
                        <div class="card">
                            <?php
                            $us_id = $_GET['us_id'];
                            $sql = "SELECT * FROM use_service INNER JOIN dog ON use_service.dog_id = dog.dog_id WHERE us_id = '$us_id' ";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {

                                ?>
                                <form method="POST" action="../api/record/us_record.php">
                                    <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="inputusid">
                                    <input type="hidden" name="dog_id" value="<?= $row['dog_id']; ?>" id="inputdogid">
                                    <?php
                                        if (!empty($row['image'])) {
                                            echo '<div class="col-md-12">';
                                            echo '<label for="inputdogsickness" class="form-label">รูปภาพสุนัข</label>';
                                            echo '<div class="col-md-6">';
                                            echo '<img class="w-50" src="../api/dog/uploads/' . $row["image"] . '">';
                                            echo '</div>';
                                        }else{
                                            echo '<div class="col-md-12">';
                                            echo '<h3 style="color: red; margin-top: 3%; margin-left: 2%;">"ผู้ใช้ท่านนี้ยังไม่มีการเพิ่มรูปสุนัข"</h3>';
                                            echo '<div class="col-md-6">';
                                            echo '</div>';
                                        }
                                        ?>
                                    <!-- <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">รูปภาพสุนัข</label>
                                        <div class="col-md-6">
                                            <img class="w-50" src="../api/dog/uploads/<?= $row['image']; ?>" alt="">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <label for="inputdogname" class="form-label">ชื่อสุนัข</label>
                                        <input name="dog_name" value="<?= $row['dog_name']; ?>" type="text" class="form-control" id="inputdogname" placeholder="ชื่อสุนัข" disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogtype" class="form-label">พันธุ์สุนัข</label>
                                        <select name="dog_type" id="" class="form-control" disabled>
                                            <option value="<?= $row['dog_type']; ?>"><?= $row['dog_type']; ?></option>
                                            <?php
                                                $sql2 = "SELECT * FROM dog_breed";
                                                $query2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_array($query2)) {
                                                    ?>
                                                <option value="<?php echo $row2["dogbreed_name"]; ?>"><?php echo $row2["dogbreed_name"]; ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogweight" class="form-label">น้ำหนักสุนัข</label>
                                        <select name="dog_weight" class="form-control" id="" disabled>
                                            <option value="<?= $row['dog_weight']; ?>"><?= $row['dog_weight']; ?></option>
                                            <?php

                                                for ($i = 1; $i <= 100; $i++) {
                                                    ?>

                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">อายุสุนัข (ปี) : </label>
                                        <select name="dog_age" class="form-control" id="" disabled>
                                            <option value="<?= $row['dog_age']; ?>"><?= $row['dog_age']; ?></option>
                                            <?php

                                                for ($i = 1; $i <= 50; $i++) {
                                                    ?>

                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">โรคประจำตัว,อาหารที่แพ้</label>
                                        <input name="dog_sickness" value="<?= $row['dog_sickness']; ?>" type="text" class="form-control" id="inputdogsickness" disabled>
                                        <hr>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom: 1%;">
                                        <label for="inputdogsickness" class="form-label">บันทึกการติดตามสุนัขครั้งก่อน</label>
                                        <input type="text" class="form-control" value="<?= $row['usrec_topic']; ?>" disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" style="padding-left: 1%;" type="text" id="exampleFormControlTextarea1" rows="3" name="usrec_detail_show" disabled><?= $row['usrec_detail']; ?></textarea>
                                        <hr>
                                    </div>

                                    <!-- ส่งข้อมูลอัพเดทการติดตาม -->

                                    <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">กรอกบันทึกการติดตามสุนัขครั้งนี้</label>
                                    </div>
                                    <div class="col-md-12" style="margin-left: 2%;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="usrec_topic" id="flexRadioDefault1" value="อัพเดทสถานะสุนัข" checked>
                                            <label style="margin-left: -2%;" class="form-check-label" for="flexRadioDefault1">
                                                อัพเดทสถานะสุนัข
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="usrec_topic" id="flexRadioDefault2" value="สุนัขมีความผิดปกติ">
                                            <label class="form-check-label" style="margin-left: -2%;" for="flexRadioDefault2">
                                                สุนัขมีความผิดปกติ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">หมายเหตุ</label>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" style="padding-left: 1%;" id="exampleFormControlTextarea1" rows="3" name="usrec_detail"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-lg" style="font-family: Kanit Light; font-size: 18px;">บันทึก</button>
                                    </div>
                                </form>
                            <?php } ?>
                            <?php
                            include 'layout/footer.php';
                            ?>
</body>

</html>