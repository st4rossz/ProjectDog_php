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
                        <div class="col-12">
                            <h4 class="title" style="color: black;">บันทึกการติดตามสุนัข</h4>
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
                                            <th style="width: 10%;">วันสิ้นสุดการให้บริการ</th>
                                            <th style="width: 10%;">ประเภทห้อง</th>
                                            <th style="width: 10%;">เจ้าของสุนัข</th>
                                            <!-- <th>user_id</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $sql = "SELECT * FROM dog ";
                                        $sql = "SELECT * FROM deposit INNER JOIN room ON deposit.room_id = room.room_id INNER JOIN dog ON deposit.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE dep_status = 1";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr align="center">
                                                <!-- <th scope="row"> <?= $row["dog_id"] ?> </th> -->
                                                <td><?= $row["dog_name"] ?></td>
                                                <td><?= $row["dog_type"] ?></td>
                                                <td><?= $row["dep_sdate"] ?></td>
                                                <td><?= $row["dep_edate"] ?></td>
                                                <td><?= $row["room_type"] ?></td>
                                                <td><?= $row["username"] ?></td>
                                                <td style="width: 15%;">
                                                    <a class="btn btn-lg btn-primary" href="depret_detail.php?dep_id=<?= $row["dep_id"] ?>">รายละเอียด</a>
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