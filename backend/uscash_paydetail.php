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
                <form id="updateForm">
                    <div class="row">
                        <?php
                        $us_id = $_GET['us_id'];
                        $sql = "SELECT * FROM use_service WHERE us_id = '$us_id'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="col-md-4">
                                <h4 class="title" style="color: black;">รายละเอียดการจองสปาสุนัข (เงินสด)</h4>
                            </div>
                            <div class="col-md-2 ">
                                <div class="form-group">
                                    <label for="">จำนวนเงินที่ต้องชำระ / บาท</label>
                                    <input type="text" class="form-control" value="<?= $row['us_price'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2 ">
                                <div class="form-group">
                                    <label for="">จำนวนเงินที่ได้รับ / บาท</label>
                                    <input type="text" class="form-control" name="recieved_price" required>
                                </div>
                            </div>
                            <div class="col-md-2 form-inline" style="padding-top: 28px; padding-right: 20px;">
                                <div class="form-group form-check ml-auto">
                                    <input type="radio" class="mr-1" name="pay_type" id="pay_online" value="โอนจ่าย" disabled>
                                    <label style="font-size: 24px;" for="pay_online"> โอนจ่าย</label>
                                </div>
                                <div class="form-group form-check ml-3">
                                    <input type="radio" class="mr-1" name="pay_type" id="pay_cash" value="เงินสด" checked>
                                    <label style="font-size: 24px;" for="pay_cash"> เงินสด</label>
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-top: 1%;">
                                <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="us_id">
                                <button type="submit" name="pay" class="btn btn-success btn-lg btn-block" onclick="javascript:return confirm('ยืนยัน?');">ยืนยันการชำระ</button>
                            </div>
                        <?php } ?>
                    </div>
                </form>
                <hr>
                <div class="col-md-12">
                    <div class="card">
                        <?php
                        $sql = "SELECT * FROM store";
                        $query = mysqli_query($conn, $sql);
                        while ($result = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="row">
                                <div class="col-md-4 pt-4 pl-5">
                                    <!-- <h4 style="font-family: Kanit;">รายละเอียดการจอง</h4> -->
                                    <img src="../api/store/uploads/<?= $result['store_logo'] ?>" style="width: 200px; height: 200px;" alt="">
                                </div>
                                <div class="col-md-4 pt-5 text-center">
                                    <h5>ร้าน <?= $result['store_name'] ?></h5>
                                    <h5><?= $result['store_add'] ?></h5>
                                    <h5>Tel. <?= $result['store_tel'] ?></h5>
                                </div>
                                <div class="col-md-4" style="padding-left: 20%; padding-top: 5%;">
                                    <h3>ใบแจ้งหนี้</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="content table-full-width">
                                    <table style="border: 2px solid black;" class="table table-striped table-bordered ">
                                        <thead>
                                            <?php
                                            $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 0 AND us_id ='$us_id'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <tr style="border: 2px solid black;">
                                                    <th style="padding-left: 20%; padding-top: 2%; padding-bottom: 2%;  font-size: 16px;" rowspan="1" colspan="2">รหัสลูกค้า : <?= $row['user_id'] ?><br>ชื่อ-สกุล : <?= $row['fullname'] ?><br>ที่อยู่ : <?= $row['address'] ?><br>อีเมล์ : <?= $row['email'] ?></th>
                                                    <th style="padding-left: 10%; padding-top: 2%; padding-bottom: 2%;  font-size: 16px;" rowspan="1" colspan="2">รหัสสุนัข : <?= $row['dog_id'] ?><br>ชื่อ : <?= $row['dog_name'] ?><br>พันธุ์ : <?= $row['dog_type'] ?><br>อายุ : <?= $row['dog_age'] ?> ปี</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="border: 2px solid black;" align="center">
                                                <th style="width: 5%; border: 2px solid black;">รหัสการจอง</th>
                                                <th style="width: 10%; border: 2px solid black;">วันที่เข้าใช้บริการ</th>
                                                <th style="width: 10%; border: 2px solid black;">ประเภทบริการ</th>
                                                <!-- <th style="width: 20%; border: 2px solid black;">หลักฐานการโอนเงิน</th> -->
                                                <th style="width: 5%; border: 2px solid black;">ราคา</th>
                                            </tr>
                                            <tr align="center">
                                                <td style="width: 5%; border: 2px solid black;"><?= $row["us_id"] ?></td>
                                                <td style="width: 5%; border: 2px solid black;"><?= $row["us_date"] ?></td>
                                                <td style="width: 5%; border: 2px solid black;"><?= $row["service_name"] ?></td>
                                                <!-- <td style="width: 5%; border: 2px solid black;">
                                                    <?php
                                                    if (!empty($row["us_basis"])) {
                                                        echo '<img src="../api/pay/uploads/' . $row['us_basis'] . '" style="width: 300px; height: 350px;" alt="">';
                                                    } else {
                                                        echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ไม่มีหลักฐานการโอน</p>';
                                                    }
                                                    ?>
                                                </td> -->
                                                <td style="width: 5%; border: 2px solid black;"><?= $row["us_price"] ?></td>
                                            </tr>

                                            <!-- <tr>
                                                <td style="border: 2px solid black; padding-left: 68%;" rowspan="1" colspan="4">ส่วนลด</td>
                                                <td class="text-center" rowspan="1" colspan="4">0</td>
                                            </tr> -->

                                            <tr>
                                                <th style="border: 2px solid black; padding-left: 63%;" rowspan="1" colspan="3">รวมเป็นเงิน (Total) </th>
                                                <th style="border: 2px solid black;" class="text-center" rowspan="1" colspan="3"><?= $row['us_price'] ?></th>
                                            </tr>



                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <h5>ขอขอบคุณที่ใช้บริการ</h3>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'layout/footer.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $("#updateForm").submit(function(e) {
                e.preventDefault()
                var formData = $(this).serialize()
                $.post('../api/pay/uscash_pay.php', formData, function(data) {
                    if (data.success) {
                        swal("แจ้งเตือน", "อัปเดตสถานะการชำระสำเร็จ", "success").then(function() {
                            window.location = "uscash_pay.php";
                        })
                    } else {
                        swal("แจ้งเตือน", " " + data.msg, "error")
                    }
                }, 'json')
            })
        </script>

</body>

</html>