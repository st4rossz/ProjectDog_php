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
                    $us_id = $_GET['us_id'];
                    $sql = "SELECT * FROM use_service WHERE us_id = '$us_id'";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="col-8">
                            <h4 class="title" style="color: black;">บันทึกข้อมูลการรับสุนัขกลับ (สปาสุนัข)</h4>
                        </div>
                        <div class="col-4" style="padding-top: 1%;">
                            <form id="updateForm">
                                <input type="hidden" name="us_id" value="<?= $row['us_id']; ?>" id="us_id">
                                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript:return confirm('ยืนยัน?');">อัพเดทสถานะ</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <hr>
                <div class="container"></div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="col-md-12 text-center pt-5">
                            <?php
                            $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 2 AND us_id ='$us_id'";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {

                                if (!empty($row["image"])) {
                                    echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 350px; height: 400px;" alt="">';
                                } else {
                                    echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                                }
                            }
                            ?>
                        </div>
                        <div id="accordion">
                            <div class="card">

                                <div class="row">
                                    <div class="col-md-12 ml-5 pt-3">
                                        <h4 style="font-family: Kanit;">รายละเอียดการจอง</h4>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="content table-full-width">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr align="center">
                                                    <th style="width: 5%;">รหัสการจอง</th>
                                                    <th style="width: 10%;">วันที่เข้าใช้บริการ</th>
                                                    <th style="width: 10%;">บริการ</th>
                                                    <th style="width: 10%;">สถานะ</th>
                                                    <th style="width: 5%;">ราคา</th>
                                                    <!-- <th style="width: 20%;">หลักฐานการโอน</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 2 AND us_id ='$us_id'";
                                                $query = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr align="center">
                                                        <td><?= $row["us_id"] ?></td>
                                                        <td><?= $row["us_date"] ?></td>
                                                        <td><?= $row["service_name"] ?></td>
                                                        <td><?= $row["status_name"] ?></td>
                                                        <td><?= $row["us_price"] ?></td>
                                                        <!-- <td>
                                                                <?php
                                                                if (!empty($row["dep_basis"])) {
                                                                    echo '<img src="../api/pay/uploads/' . $row['dep_basis'] . '" style="width: 300px; height: 350px;" alt="">';
                                                                } else {
                                                                    echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ไม่มีหลักฐานการโอน</p>';
                                                                }
                                                                ?>
                                                            </td> -->

                                                        <?php
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-12 ml-5 pt-3">
                                        <h4 style="font-family: Kanit;">รายละเอียดสุนัข</h4>

                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="content table-full-width">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr align="center">
                                                    <th style="width: 5%;">รหัสสุนัข</th>
                                                    <th style="width: 10%;">ชื่อ</th>
                                                    <th style="width: 10%;">พันธุ์</th>
                                                    <th style="width: 10%;">น้ำหนัก (กก.)</th>
                                                    <th style="width: 5%;">อายุ (ปี)</th>
                                                    <th style="width: 10%;">โรคประจำตัว/แพ้อาหาร</th>
                                                    <!-- <th style="width: 20%;">รูปสุนัข</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 2 AND us_id ='$us_id'";
                                                $query = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr align="center">
                                                        <td><?= $row["dog_id"] ?></td>
                                                        <td><?= $row["dog_name"] ?></td>
                                                        <td><?= $row["dog_type"] ?></td>
                                                        <td><?= $row["dog_weight"] ?></td>
                                                        <td><?= $row["dog_age"] ?></td>
                                                        <td><?= $row["dog_sickness"] ?></td>
                                                        <!-- <td>
                                                                <?php
                                                                if (!empty($row["image"])) {
                                                                    echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 300px; height: 350px;" alt="">';
                                                                } else {
                                                                    echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                                                                }
                                                                ?>
                                                            </td> -->

                                                        <?php
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 ml-5 pt-3">
                                        <h4 style="font-family: Kanit;">รายละเอียดเจ้าของ</h4>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="content table-full-width">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr align="center">
                                                    <th style="width: 10%;">รหัสเจ้าของ</th>
                                                    <th style="width: 10%;">ชื่อผู้ใช้งาน</th>
                                                    <th style="width: 15%;">อีเมล์</th>
                                                    <th style="width: 25%;">ชื่อ-นามสกุลจริง</th>
                                                    <th style="width: 40%;">ที่อยู่</th>

                                                    <!-- <th style="width: 20%;">รูปสุนัข</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 2 AND us_id ='$us_id'";
                                                $query = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr align="center">
                                                        <td><?= $row["user_id"] ?></td>
                                                        <td><?= $row["username"] ?></td>
                                                        <td><?= $row["email"] ?></td>
                                                        <td><?= $row["fullname"] ?></td>
                                                        <td><?= $row["address"] ?></td>

                                                        <!-- <td><?= $row["dep_price"] ?></td> -->
                                                        <!-- <td>
                                                            <?php
                                                            if (!empty($row["dep_basis"])) {
                                                                echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 300px; height: 350px;" alt="">';
                                                            } else {
                                                                echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ไม่มีหลักฐานการจอง</p>';
                                                            }
                                                            ?>
                                                        </td> -->

                                                        <?php
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


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
                $.post('../api/atstore/us_atstore.php', formData, function(data) {
                    if (data.success) {
                        swal("สิ้นสุดการให้บริการ", "เจ้าของสุนัขมารับสุนัขกลับแล้ว", "success").then(function() {
                            window.location = "us_atstore.php";
                        })
                    } else {
                        swal("แจ้งเตือน", "ไม่สำเร็จ!", "error")
                    }
                }, 'json')
            })
        </script>

</body>

</html>