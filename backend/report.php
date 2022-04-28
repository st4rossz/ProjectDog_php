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
                            <h4 class="title" style="color: black;">รายงาน</h4>
                            <!-- <a href="#" class="btn btn-primary active fixed-center" role="button" aria-pressed="true"><i class="fa fa-print" aria-hidden="true"></i>  พิมพ์รายงาน</a> -->
                        </div>
                        <?php

                        $perpage = 5; // จำนวนหน้าที่ต้องการ
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        $start = ($page - 1) * $perpage;

                        $where = "";
                        if (isset($_GET['start'])) {
                            $date_start = $_GET['start'];
                            $date_end = $_GET['end'];
                            // $where = "WHERE dep_sdate = '$date_start' AND dep_edate = '$date_end' ";
                            $where .= "WHERE dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end'";
                        }
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] != "all") {
                                $where .= "AND dep_status = {$_GET['status']}";
                            }
                        }

                        $where2 = "";
                        if (isset($_GET['start'])) {
                            $date_start = $_GET['start'];
                            $date_end = $_GET['end'];
                            // $where = "WHERE dep_sdate = '$date_start' AND dep_edate = '$date_end' ";
                            $where2 .= "WHERE us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end'";
                        }
                        ?>

                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">จำนวนผู้ใช้งาน</div>
                                            <?php
                                            $sql = "SELECT * FROM user WHERE status ='1'";
                                            $query = mysqli_query($conn, $sql);
                                            // $num = mysqli_num_rows($query);
                                            // echo "จํานวน record คือ ".$num;

                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } ?>

                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body ">
                                            <div class="text-center h5">ผู้ใช้งานที่รออนุมัติ</div>
                                            <?php
                                            $sql = "SELECT * FROM user WHERE status ='0'";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center text-warning h5"><?= $num ?></div>
                                            <?php } ?>

                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">จำนวนฝากเลี้ยง</div>
                                            <?php
                                            $sql = "SELECT * FROM deposit $where";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } else { ?>
                                                <div class="text-center h5 text-danger">0</div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">จำนวนใช้สปาร์สุนัข</div>
                                            <?php
                                            $sql = "SELECT * FROM use_service $where2";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } else { ?>
                                                <div class="text-center h5 text-danger">0</div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">รายได้จากฝากเลี้ยงสุนัข</div>
                                            <?php
                                            $price = 0;
                                            $sql = "SELECT sum(dep_price) as income FROM deposit  $where";
                                            $query = mysqli_query($conn, $sql);
                                            $f = mysqli_fetch_assoc($query);
                                            ?>
                                            <div class="text-center text-success h5">ได้รับ <?= number_format($f['income'], 2) ?> บาท</div>
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">รายได้จากสปาร์สุนัข</div>
                                            <?php
                                            $price = 0;
                                            $sql = "SELECT sum(us_price) as income2 FROM use_service  $where2";
                                            $query = mysqli_query($conn, $sql);
                                            $f = mysqli_fetch_assoc($query);
                                            ?>
                                            <div class="text-center text-success h5">ได้รับ <?= number_format($f['income2'], 2) ?> บาท</div>
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center h5">รายได้ทั้งหมด</div>
                                            <?php
                                            $price = 0;
                                            $sql = "SELECT sum((us_price)+(dep_price)) as total FROM `deposit`  INNER JOIN use_service;";
                                            $query = mysqli_query($conn, $sql);
                                            $f = mysqli_fetch_assoc($query);
                                            ?>
                                            <div class="text-center text-success h5">ได้รับ <?= number_format($f['total'], 2) ?> บาท</div>
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->


                            </div><!-- row -->
                        </div><!-- container -->

                        <div class="container-fluid">
                            <div class="col">
                                <div class="card">
                                    <form action="report.php" method="get">
                                        <div class="card-header form-inline">
                                            <h4>ประวัติการฝากเลี้ยง</h4>
                                            <?php if (isset($_GET['start'])) { ?>
                                                <a href="generate_pdf.php?start=<?= $_GET['start'] ?>&end=<?= $_GET['end'] ?>" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
                                            <?php } else { ?>
                                                <a href="generate_pdf.php" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
                                            <?php } ?>

                                            <div class="form-group ml-auto">
                                                <label for="" class="col-form-label">วันที่เริ่มเข้าพัก : </label>
                                                <input type="date" class="form-control" name="start" value="<?= isset($_GET['start']) ? $_GET['start'] : '' ?>" id="dep_sdateid" placeholder="วันที่เริ่มเข้าพัก" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="col-form-label">วันที่สิ้นสุดการเข้าพัก : </label>
                                                <input type="date" class="form-control" name="end" value="<?= isset($_GET['end']) ? $_GET['end'] : '' ?>" id="dep_edateid" placeholder="วันที่สิ้นสุดการเข้าพัก" required>
                                            </div>

                                            <div class="form-group ml-4">
                                                <label for="" class="col-form-label">ประเภทสถานะ :</label>
                                                <select name="status" class="form-control ml-2" id="" required>
                                                    <?php $get_status = isset($_GET['status']) ? $_GET['status'] : 'all'; ?>
                                                    <option value="all" <?= $get_status == 'all' ? 'selected' : '' ?>>ทั้งหมด</option>
                                                    <option value="0" <?= $get_status == '0' ? 'selected' : '' ?>>รอชำระเงิน</option>
                                                    <option value="1" <?= $get_status == '1' ? 'selected' : '' ?>>ชำระเงินแล้ว/รอเข้าใช้บริการ</option>
                                                    <option value="2" <?= $get_status == '2' ? 'selected' : '' ?>>กำลังใช้บริการ</option>
                                                    <option value="3" <?= $get_status == '3' ? 'selected' : '' ?>>สิ้นสุดการให้บริการ</option>
                                                    <!-- <option value="4" <?= $get_status == '4' ? 'selected' : '' ?>>ใช้บริการเสร็จสิ้น</option> -->
                                                </select>
                                                <!-- <input type="text" class="form-control" name="dog_type" id="inputdog_type" placeholder="พันธุ์สุนัข" required> -->
                                            </div>

                                            <!-- <div class="form-group">
                                    <label for="" class="col-form-label">วันที่สิ้นสุดการเข้าพัก : </label>
                                    <input type="date" class="form-control" name="end" id="dep_edateid" placeholder="วันที่สิ้นสุดการเข้าพัก" required>
                                </div> -->
                                            <button type="submit" class="btn btn-primary active ml-4"><i class="fa fa-search" aria-hidden="true"></i></button>

                                        </div><!-- card-header -->
                                    </form>

                                    <div class="card-body">
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT *, dog.image FROM deposit 
                                 INNER JOIN room ON deposit.room_id = room.room_id 
                                 INNER JOIN dog ON deposit.dog_id = dog.dog_id 
                                 INNER JOIN user ON dog.user_id = user.user_id
                                $where limit {$start} , {$perpage}";
                                        $query = mysqli_query($conn, $sql);

                                        $sql2 = "SELECT * FROM deposit $where";
                                        $query2 = mysqli_query($conn, $sql2);

                                        $total_record = mysqli_num_rows($query2);
                                        $total_page = ceil($total_record / $perpage);
                                        ?>

                                        <table class="table table-hover align-items-center">
                                            <thead class="thead-Secondary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อสุนัข</th>
                                                    <th>พันธ์ุ</th>
                                                    <th style="width:20%;">รูปสุนัข</th>
                                                    <th>เจ้าของสุนัข</th>
                                                    <th>วันที่เริ่มเข้าพัก</th>
                                                    <?php if (isset($_GET['status'])) { ?>
                                                        <?php if ($_GET['status'] == "all") { ?>

                                                        <?php } elseif ($_GET['status'] == 0) { ?>
                                                            <th>จำนวนเงิน</th>
                                                        <?php } elseif ($_GET['status'] == 2) { ?>
                                                            <th>กำลังใช้บริการ</th>
                                                        <?php } elseif ($_GET['status'] == 3) { ?>
                                                            <th>ที่อยู่</th>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($result = mysqli_fetch_array($query)) { ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $result['dog_name'] ?></td>
                                                        <td><?= $result['dog_type'] ?></td>
                                                        <td>
                                                            <?php
                                                            if (!empty($result["image"])) {
                                                                echo '<img src="../api/dog/uploads/' . $result['image'] . '" style="width: 150px; height: 150px;" alt="">';
                                                            } else {
                                                                echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $result["username"] ?></td>
                                                        <td><?= $result['dep_sdate'] ?></td>
                                                        <?php if (isset($_GET['status'])) { ?>
                                                            <?php if ($_GET['status'] == "all") { ?>

                                                            <?php } elseif ($_GET['status'] == 2) { ?>
                                                                <td><?= $result['dep_price'] ?></td>
                                                            <?php } elseif ($_GET['status'] == 3) { ?>
                                                                <td><?= $result['address'] ?></td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <td><?= $result['status_name'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>

                                    </div>
                                    <div class="card-footer">
                                        <nav aria-label="Page">
                                            <ul class="pagination justify-content-center">
                                                <?php
                                                $page_parameter = "";
                                                if (isset($_GET['start'])) {
                                                    $page_parameter .= "&start=" . $_GET['start'] . "&end=" . $_GET['end'];
                                                }
                                                if (isset($_GET['status'])) {
                                                    $page_parameter .= '&status=' . $_GET['status'];
                                                }
                                                ?>
                                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="report.php?page=<?= $page - 1 ?><?= $page_parameter ?>">
                                                        < </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link " href="report.php?page=<?php echo $i; ?><?= $page_parameter ?>"><?php echo $i; ?></a></li>
                                                <?php } ?>
                                                <li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>"><a class="page-link" href="report.php?page=<?= $page + 1 ?><?= $page_parameter ?>">></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                    </div>
                </div><!-- container -->








            </div>


            <?php
            include 'layout/footer.php';
            ?>
</body>

</html>