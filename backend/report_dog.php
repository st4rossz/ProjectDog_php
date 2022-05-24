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
                            <h4 class="title" style="color: black;">รายงานข้อมูลสุนัข</h4>
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
                            <div class="col">
                                <div class="card">
                                    <form action="report_dog.php" method="get">
                                        <div class="card-header form-inline">
                                            <h4>ข้อมูลสุนัข</h4>
                                            <?php if (isset($_GET['start'])) { ?>
                                                <a href="generate_pdf.php?start=<?= $_GET['start'] ?>&end=<?= $_GET['end'] ?>" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
                                            <?php } else { ?>
                                                <a href="generate_pdf.php?action=report_dog" target="_blank" class="btn btn-primary active ml-4"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์รายงาน</a>
                                            <?php } ?>
                                        </div><!-- card-header -->
                                    </form>

                                    <div class="card-body">
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT * FROM dog 
                                        INNER JOIN user ON dog.user_id = user.user_id
                                        $where limit {$perpage}";
                                        $query = mysqli_query($conn, $sql);

                                        $sql2 = "SELECT * FROM dog $where";
                                        $query2 = mysqli_query($conn, $sql2);

                                        $total_record = mysqli_num_rows($query2);
                                        $total_page = ceil($total_record / $perpage);
                                        ?>

                                        <table class="table table-hover align-items-center">
                                            <thead class="thead-Secondary">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อสุนัข</th>
                                                    <th>พันธุ์สุนัข</th>
                                                    <th>อายุ</th>
                                                    <th style="width:20%;">รูปสุนัข</th>
                                                    <th>ชื่อเจ้าของสุนัข</th>
                                                    <!-- <th style="width:20%;">รูปสุนัข</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($result = mysqli_fetch_array($query)) { ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $result['dog_name'] ?></td>
                                                        <td><?= $result['dog_type'] ?></td>
                                                        <td><?= $result['dog_age'] ?></td>
                                                        <td>
                                                            <?php
                                                            if (!empty($result["image"])) {
                                                                echo '<img src="../api/dog/uploads/' . $result['image'] . '" style="width: 150px; height: 150px;" alt="">';
                                                            } else {
                                                                echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $result['username'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <div class="col-md-12">
                                            <div class="row justify-content-end">
                                                <div class="col-md-2 bg-success py-3">
                                                    <span class="text-center text-white">จำนวนสุนัขทั้งหมด : <?= mysqli_num_rows($query2) ?> ตัว</span>
                                                </div>
                                                <!-- <div class="col-md-2 bg-danger py-3">
                                                    <span class="text-center text-white">ยอดเงิน : <?= number_format($report['total'], 2) ?></span>
                                                </div> -->
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
                                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="report_dog.php?page=<?= $page - 1 ?><?= $page_parameter ?>">
                                                        < </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link d-flex form-inline" href="report_dog.php?page=<?php echo $i; ?><?= $page_parameter ?>"><?php echo $i; ?></a></li>
                                                <?php } ?>
                                                <li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>"><a class="page-link" href="report_dog.php?page=<?= $page + 1 ?><?= $page_parameter ?>">></a></li>
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