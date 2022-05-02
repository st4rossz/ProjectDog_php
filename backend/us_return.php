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
                            <h4 class="title" style="color: black;">ยืนยันการคืนสุนัข (สปาสุนัข)</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="content table-full-width">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr align="center">
                                            <!-- <th>รหัส</th> -->
                                            <th style="width: 10%;">ชื่อสุนัข</th>
                                            <th style="width: 10%;">พันธ์ุ</th>
                                            <th style="width: 10%;">วันที่เข้าใช้บริการ</th>
                                            <th style="width: 10%;">ประเภทบริการ</th>
                                            <th style="width: 10%;">เจ้าของสุนัข</th>
                                            <!-- <th>user_id</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $sql = "SELECT * FROM dog ";
                                        $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 1";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr align="center">
                                                <!-- <th scope="row"> <?= $row["dog_id"] ?> </th> -->
                                                <td><?= $row["dog_name"] ?></td>
                                                <td><?= $row["dog_type"] ?></td>
                                                <td><?= $row["us_date"] ?></td>
                                                <td><?= $row["service_name"] ?></td>
                                                <td><?= $row["username"] ?></td>
                                                <td style="width: 15%;">
                                                    <a class="btn btn-lg btn-primary" href="usret_detail.php?us_id=<?= $row["us_id"] ?>">รายละเอียด</a>
                                                    <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button> -->
                                                    <!-- <a href="../api/dog/deldog.php?dog_id=<?= $row['dog_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a> -->
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