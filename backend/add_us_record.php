<?php
include 'layout/header.php';
?>

<body class="">
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
            <div class="content" style="font-family: Kanit Thin;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="header"> -->
                            <h4 class="title">เพิ่มบันทึกการติดตามสุนัข (สปาร์สุนัข) </h4>
                            <hr>
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
                                            echo '<img class="w-50" src="../api/dog/uploads/'.$row["image"].'">';
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
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">บันทึกการติดตามสุนัขครั้งก่อน</label>
                                        <textarea class="form-control" type="text" id="exampleFormControlTextarea1" rows="3" name="usrec_detail_show" disabled><?= $row['usrec_detail']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputdogsickness" class="form-label">กรอกการติดตามสุนัขครั้งนี้</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="usrec_detail"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">บันทึก</button>
                                    </div>
                                </form>
                            <?php } ?>
                            <?php
                            include 'layout/footer.php';
                            ?>
</body>

</html>