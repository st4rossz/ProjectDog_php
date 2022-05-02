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
                            <h4 class="title" style="color: black;">แดชบอร์ด</h4>
                            <!-- <a href="#" class="btn btn-primary active fixed-center" role="button" aria-pressed="true"><i class="fa fa-print" aria-hidden="true"></i>  พิมพ์รายงาน</a> -->
                            <hr>
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
                                            <div class="text-center h5">รวมรายได้ทั้งสิ้น</div>
                                            <?php
                                            $sql1 = "SELECT sum(us_price) as usprice FROM use_service";
                                            $query1 = mysqli_query($conn, $sql1);
                                            $result1 = mysqli_fetch_assoc($query1);
                                            $sql2 = "SELECT sum(dep_price) as depprice FROM deposit";
                                            $query2 = mysqli_query($conn, $sql2);
                                            $result2 = mysqli_fetch_assoc($query2);
                                            $total = $result1['usprice'] + $result2['depprice'];
                                            ?>
                                            <div class="text-center text-success h5"><?= number_format($total, 2) ?> บาท</div>
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->
                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <div class="card bg-dark text-white">
                                        <div class="card-body">
                                            <div class="text-center h5">ลูกค้าที่รอการยืนยัน</div>
                                            <?php
                                            $sql = "SELECT * FROM user WHERE status ='0'";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } ?>

                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-4">
                                    <div class="card bg-dark text-white">
                                        <div class="card-body">
                                            <div class="text-center h5">จำนวนการจองฝากเลี้ยง</div>
                                            <?php
                                            $sql = "SELECT * FROM deposit $where";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } else { ?>
                                                <div class="text-center h5">0</div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- col -->

                                <div class="col-md-4">
                                    <div class="card bg-dark text-white">
                                        <div class="card-body">
                                            <div class="text-center h5">จำนวนการจองสปาสุนัข</div>
                                            <?php
                                            $sql = "SELECT * FROM use_service $where2";
                                            $query = mysqli_query($conn, $sql);
                                            if ($num = mysqli_num_rows($query)) {
                                            ?>
                                                <div class="text-center h5"><?= $num ?></div>
                                            <?php } else { ?>
                                                <div class="text-center h5">0</div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- container -->
                        <hr>
                        <div class="col-md-12">
                            <h5>จำนวนห้องพักที่พร้อมให้บริการ</h5>
                        </div>
                        <div class="row">
                            <?php
                            $room_sql = "SELECT * FROM room";
                            $query_sql = mysqli_query($conn, $room_sql);
                            $date = date_create();
                            $today = date_format($date, "Y-m-d");
                            while ($room = mysqli_fetch_assoc($query_sql)) {
                                $count_sql = "SELECT * , count(room_id) as total FROM `deposit` WHERE dep_edate > '$today' AND room_id = {$room['room_id']}";
                                $query_count = mysqli_query($conn, $count_sql);
                                $count = mysqli_fetch_assoc($query_count);
                            ?>
                                <div class="col-md-4">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="text-center h5"><?= $room['room_type'] ?></div>
                                            <h3 class="text-center text-white my-3"><?= $room['room_quantity'] - $count['total'] ?> ห้อง</h3>
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div><!-- col -->
                            <?php   } ?>

                        </div>
                    </div>
                    <?php
                    include 'layout/footer.php';
                    ?>
</body>

</html>