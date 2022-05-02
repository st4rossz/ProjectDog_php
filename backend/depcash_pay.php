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
                        <div class="col-12">
                            <h4 class="title" style="color: black;">ยืนยันการรับชำระโดยเงินสด (ฝากเลี้ยง)</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="content table-full-width">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr align="center">

                                            <th style="width: 5%;">รหัสการจอง</th>
                                            <th style="width: 15%;">วันที่เข้าใช้บริการ</th>
                                            <th style="width: 15%;">วันที่สิ้นสุด</th>
                                            <th style="width: 10%;">ประเภทห้อง</th>
                                            <th style="width: 10%;">ราคา</th>
                                            <th style="width: 20%;">ชื่อ-สกุลผู้จอง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *, dog.image, user.fullname FROM deposit INNER JOIN room ON deposit.room_id = room.room_id INNER JOIN dog ON deposit.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE dep_status = 0 AND dep_basis = ''";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr align="center">
                                                <!-- <td>
                                                    <?php
                                                    if (!empty($row["dep_basis"])) {
                                                        echo '<img src="../api/pay/uploads/' . $row['dep_basis'] . '" style="width: 300px; height: 350px;" alt="">';
                                                    } else {
                                                        echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีหลักฐานการชำระเงิน</p>';
                                                    }
                                                    ?>
                                                </td> -->
                                                <td><?= $row["dep_id"] ?></td>
                                                <td><?= $row["dep_sdate"] ?></td>
                                                <td><?= $row["dep_edate"] ?></td>
                                                <td><?= $row["room_type"] ?></td>
                                                <td><?= $row["dep_price"] ?></td>
                                                <td><?= $row["fullname"] ?></td>

                                                <td style="width: 15%;">
                                                    <a class="btn btn-lg btn-primary" href="depcash_paydetail.php?dep_id=<?= $row["dep_id"] ?>">รายละเอียด</a>
                                                </td>
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


                <?php
                include 'layout/footer.php';
                ?>
</body>

</html>