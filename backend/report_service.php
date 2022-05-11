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
                            <h4 class="title" style="color: black;">รายงานการใช้บริการสปาร์</h4>
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
                            $where .= "WHERE us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end'";
                        }
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] != "all") {
                                $where .= "AND us_status = {$_GET['status']}";
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
                            <div class="col">
                                <div class="card">
                                    <form action="report_service.php" method="get">
                                        <div class="card-header form-inline">
                                            <h4>ประวัติการใช้บริการสปาร์</h4>
                                            <?php if (isset($_GET['start'])) { ?>
                                                <a href="generate_pdf.php?action=report_service&start=<?= $_GET['start'] ?>&end=<?= $_GET['end'] ?>>&status=<?= $_GET['status']?>" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
                                            <?php } else { ?>
                                                <a href="generate_pdf.php?action=report_service&status=all" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
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
                                                    <!-- <option value="2" <?= $get_status == '2' ? 'selected' : '' ?>>กำลังใช้บริการ</option> -->
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
                                        $sql = "SELECT * FROM use_service
                                        INNER JOIN dog ON use_service.dog_id = dog.dog_id
                                        INNER JOIN user ON dog.user_id = user.user_id
                                        INNER JOIN service ON use_service.service_id = service.service_id 
                                        $where limit {$start} , {$perpage}";
                                        $query = mysqli_query($conn, $sql);

                                        $sql2 = "SELECT * FROM use_service $where";
                                        $query2 = mysqli_query($conn, $sql2);

                                        $total_record = mysqli_num_rows($query2);
                                        $total_page = ceil($total_record / $perpage);
                                        ?>

                                        <table class="table table-hover align-items-center">
                                            <thead class="thead-Secondary">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัสการเข้าใช้บริการ</th>
                                                    <th>ชื่อลูกค้า</th>
                                                    <!-- <th style="width:20%;">รูปสุนัข</th> -->
                                                    <th>วันที่ให้บริการ</th>
                                                    <th>ชื่อบริการ</th>
                                                    <th>ราคารวม</th>
                                                    <?php if (isset($_GET['status'])) { ?>
                                                        <?php if ($_GET['status'] == "all") { ?>
                                                            <th>สถานะ</th>
                                                        <?php } else { ?>
                                                            
                                                        <?php } ?>
                                                    <?php } ?>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($result = mysqli_fetch_array($query)) { ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $result['us_id'] ?></td>
                                                        <td><?= $result['username'] ?></td>
                                                        <td><?= $result['us_date'] ?></td>
                                                        <td><?= $result['service_name'] ?> บาท</td>
                                                        <td><?= number_format($result['us_price'] , 2) ?> บาท</td>
                                                        <?php if (isset($_GET['status'])) { ?>
                                                            <?php if ($_GET['status'] == "all") { ?>
                                                                <td><?= $result['status_name'] ?></td>
                                                            <?php } else { ?>

                                                            <?php } ?>
                                                        <?php } ?>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                        <?php 
                                        $sql_report = "SELECT *, sum(us_price) as total FROM use_service $where";
                                        $query_report = mysqli_query($conn, $sql_report);
                                        $report = mysqli_fetch_assoc($query_report);
                                        ?>
                                        <div class="col-md-12">
                                            <div class="row justify-content-end">
                                                <div class="col-md-2 bg-success py-3">
                                                    <span class="text-center text-white">ทั้งหมด : <?=mysqli_num_rows($query2)?> รายการ</span>
                                                </div>
                                                <div class="col-md-2 bg-danger py-3">
                                                    <span class="text-center text-white">ยอดเงิน : <?=number_format($report['total'] , 2)?> บาท</span>
                                                </div>
                                            </div>
                                        </div>
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
                                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="report_service.php?page=<?= $page - 1 ?><?= $page_parameter ?>">
                                                        < </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link " href="report_service.php?page=<?php echo $i; ?><?= $page_parameter ?>"><?php echo $i; ?></a></li>
                                                <?php } ?>
                                                <li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>"><a class="page-link" href="report_service.php?page=<?= $page + 1 ?><?= $page_parameter ?>">></a></li>
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