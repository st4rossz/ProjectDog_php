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
                            <h4 class="title" style="color: black;">ยืนยันการคืนสุนัข (ฝากเลี้ยง)</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="content table-full-width">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr align="center">
                                            <th style="width: 5%;">ชื่อสุนัข</th>
                                            <th style="width: 10%;">พันธ์ุ</th>
                                            <th style="width: 10%;">วันที่เข้าใช้บริการ</th>
                                            <th style="width: 10%;">วันที่สิ้นสุด</th>
                                            <th style="width: 5%;">ประเภทห้อง</th>
                                            <th style="width: 10%;">เจ้าของสุนัข</th>
                                            <th style="width: 20%;">รูปสุนัข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM deposit INNER JOIN room ON deposit.room_id = room.room_id INNER JOIN dog ON deposit.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE dep_status = 2 AND dep_deliver = 'ต้องการ'";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $row["dog_name"] ?></td>
                                                <td><?= $row["dog_type"] ?></td>
                                                <td><?= $row["dep_sdate"] ?></td>
                                                <td><?= $row["dep_edate"] ?></td>
                                                <td><?= $row["room_type"] ?></td>
                                                <td><?= $row["username"] ?></td>
                                                <td>
                                                    <?php
                                                        if (!empty($row["image"])) {
                                                            echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 300px; height: 250px;" alt="">';
                                                        } else {
                                                            echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                                                        }
                                                        ?>
                                                </td>
                                                <td style="width: 15%;">
                                                    <a class="btn btn-lg btn-primary" href="depret_detail.php?dep_id=<?= $row["dep_id"] ?>">รายละเอียด</a>
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