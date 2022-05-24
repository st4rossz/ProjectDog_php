<?php
include '../api/server.php';
require '../vendor/autoload.php';

$get = $_GET['action'];


switch ($get) {
    case 'report_deposit':

        $mpdf = new \Mpdf\Mpdf();
        //custom font
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/assets/fonts',
            ]),
            'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' =>  'THSarabunNew Bold.ttf',
                ]
            ],
        ]);
        $html = '<style>
                * , th ,td , h2 ,p ,b{
                    font-family: "sarabun" !important;
                    font-size: 14px;
                }
                p{
                    text-align: justify;
                }
                h1{
                    text-align: center;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                </style>';

        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];
        }
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'all') {
                $status = "ทั้งหมด";
            } elseif ($_GET['status'] == '0') {
                $status = "รอชำระเงิน";
            } elseif ($_GET['status'] == '1') {
                $status = "ชำระเงินแล้ว/รอเข้าใช้บริการ";
            } elseif ($_GET['status'] == '2') {
                $status = "กำลังใช้บริการ";
            } else {
                $status = "สิ้นสุดการให้บริการ";
            }


            $html .=
                '
            <div style="text-align:center;">
                <img src="../images/logo.jpg" style="width: 70px;" alt="">
                <h2 style="font-size: 20px;">ร้าน Good Dog Home</h2>
                <h2 style="font-size: 20px;">รายงานฝากเลี้ยงสถานะ : ' . $status . '</h2> ';
            if (isset($_GET['start'])) {
                $date_start = $_GET['start'];
                $date_end = $_GET['end'];
                if ($_GET['start']) {
                    $html .= '<h2 style="font-size: 20px;">  ภายในวันที่ : ' . $date_start .  '  ถึงวันที่  : ' . $date_end . '</h2> ';
                }
            }
            $html .= '
            </div>';
        }

        $html .= '
            <table style="width: 100%">
                    <thead>
                    <tr align="center">
                        <th style="width: 5%;">ลำดับ</th>
                        <th style="width: 4%;">รหัสการเข้าใช้บริการ</th>
                        <th style="width: 10%;">ชื่อลูกค้า</th>
                        <th style="width: 20%;">วันที่เข้าพัก</th>
                        <th style="width: 20%;">วันที่มารับกลับ</th>
                        <th style="width: 10%;">จำนวนวัน</th>
                        <th style="width: 10%;">ราคา/วัน</th>
                        <th style="width: 10%;">ราคารวม</th>';
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "all") {
                $html .= '<th style="width: 10%;">สถานะ: ' . $result["status_name"] . '</th> ';
            }
        }
        $html .= '
                    </tr>
                </thead>
                <tbody>';

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
        $i = 1;
        $sql = "SELECT *,dog.image FROM deposit 
        INNER JOIN room ON deposit.room_id = room.room_id 
        INNER JOIN dog ON deposit.dog_id = dog.dog_id 
        INNER JOIN user ON dog.user_id = user.user_id
        $where";
        $total = 0;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        while ($result = mysqli_fetch_array($query)) {
            $html .= '<tr>
                            <td style="text-align:center;">' . $i++ . '</td>
                            <td style="text-align:center;">' . $result["dep_id"] . '</td>
                            <td style="text-align:center;">' . $result["username"] . '</td>
                            <td style="text-align:center;">' . $result["dep_sdate"] . '</td>
                            <td style="text-align:center;">' . $result["dep_edate"] . '</td>
                            <td style="text-align:center;">' . $result["dep_day"] . '</td>
                            <td style="text-align:center;">' . $result["room_price"] . '</td>
                            <td style="text-align:center;">' . number_format($result["dep_price"], 2) . '</td> ';
            if (isset($_GET['status'])) {
                if ($_GET['status'] == "all") {
                    $html .= '<td style="text-align:center;">' . $result["status_name"] . '</td> ';
                }
            }
            $html .= '
                        </tr>';
            $total += $result["dep_price"];
        }

        $html .= '</tbody>
                </table>';
        $where0 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where0 .= "dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end' AND dep_status = '0'";
        } elseif (!isset($_GET['start'])) {
            $where0 .= "dep_status = '0'";
        }

        $where1 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where1 .= "dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end' AND dep_status = '1'";
        } elseif (!isset($_GET['start'])) {
            $where1 .= "dep_status = '1'";
        }

        $where2 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where2 .= "dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end' AND dep_status = '2'";
        } elseif (!isset($_GET['start'])) {
            $where2 .= "dep_status = '2'";
        }

        $where3 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where3 .= "dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end' AND dep_status = '3'";
        } elseif (!isset($_GET['start'])) {
            $where3 .= "dep_status = '3'";
        }

        $where10 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where10 .= "dep_sdate BETWEEN '$date_start' AND '$date_end' AND dep_edate BETWEEN '$date_start' AND '$date_end' AND dep_status = '10'";
        } elseif (!isset($_GET['start'])) {
            $where10 .= "dep_status = '10'";
        }

        $html .= '<p style="text-align: right;"><b>ทั้งหมด</b> ' . number_format($row) . ' รายการ
        <b>เป็นจำนวนเงิน</b> ' . number_format($total, 2) . ' บาท</p>';
        $sql_report = "SELECT * FROM deposit $where AND dep_deliver = 'ต้องการ' ";
        $query_deposit = mysqli_query($conn, $sql_report);

        $sql_report = "SELECT * FROM deposit $where AND dep_deliver = 'ลูกค้ามารับสุนัข' ";
        $query_get = mysqli_query($conn, $sql_report);


        $sql_s0 = "SELECT * FROM deposit WHERE  $where0"; // ไม่ได้เลือกวันที่ status=0
        $query_s0 = mysqli_query($conn, $sql_s0);
        $sql_p0 = "SELECT *, sum(dep_price) as total FROM deposit WHERE $where0 ";  // ไม่ได้เลือกวันที่ status=0
        $query_p0 = mysqli_query($conn, $sql_p0);
        $result_p0 = mysqli_fetch_array($query_p0);

        $sql_s1 = "SELECT * FROM deposit WHERE  $where1"; // ไม่ได้เลือกวันที่ status=1
        $query_s1 = mysqli_query($conn, $sql_s1);
        $sql_p1 = "SELECT *, sum(dep_price) as total FROM deposit WHERE $where1 ";  // ไม่ได้เลือกวันที่ status=1
        $query_p1 = mysqli_query($conn, $sql_p1);
        $result_p1 = mysqli_fetch_array($query_p1);

        $sql_s2 = "SELECT * FROM deposit WHERE  $where2"; // ไม่ได้เลือกวันที่ status=2
        $query_s2 = mysqli_query($conn, $sql_s2);
        $sql_p2 = "SELECT *, sum(dep_price) as total FROM deposit WHERE $where2 ";  // ไม่ได้เลือกวันที่ status=2
        $query_p2 = mysqli_query($conn, $sql_p2);
        $result_p2 = mysqli_fetch_array($query_p2);

        $sql_s3 = "SELECT * FROM deposit WHERE  $where3"; // ไม่ได้เลือกวันที่ status=3
        $query_s3 = mysqli_query($conn, $sql_s3);
        $sql_p3 = "SELECT *, sum(dep_price) as total FROM deposit WHERE $where3 ";  // ไม่ได้เลือกวันที่ status=3
        $query_p3 = mysqli_query($conn, $sql_p3);
        $result_p3 = mysqli_fetch_array($query_p3);

        $sql_s10 = "SELECT * FROM deposit WHERE  $where10"; // ไม่ได้เลือกวันที่ status=10
        $query_s10 = mysqli_query($conn, $sql_s10);
        $sql_p10 = "SELECT *, sum(dep_price) as total FROM deposit WHERE $where10 ";  // ไม่ได้เลือกวันที่ status=10
        $query_p10 = mysqli_query($conn, $sql_p10);
        $result_p10 = mysqli_fetch_array($query_p10);

        // $sql_s0 = "SELECT * FROM deposit $where AND dep_status = '0'";
        // $query_s0 = mysqli_query($conn, $sql_s0);

        // $sql_p0 = "SELECT *, sum(dep_price) as total FROM deposit $where AND dep_status = '0'";
        // $query_p0 = mysqli_query($conn, $sql_p0);
        // $result_p0 = mysqli_fetch_array($query_p0);

        // $sql_s1 = "SELECT * FROM deposit $where";
        // $query_s1 = mysqli_query($conn, $sql_s1);
        // $row_s1 = mysqli_num_rows($query_s1);
        // $sql_p1 = "SELECT *, sum(dep_price) as total FROM deposit $where";
        // $query_p1 = mysqli_query($conn, $sql_p1);
        // $result_p1 = mysqli_fetch_array($query_p1);

        if (isset($_GET['status'])) {
            if ($_GET['status'] == "all") {
                $html .= '<p style="text-align: right;"><b>รายการรอชำระเงิน : </b> ' . mysqli_num_rows($query_s0) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p0['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>ชำระเงินแล้ว/รอเข้าใช้บริการ : </b> ' . mysqli_num_rows($query_s1) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p1['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>กำลังใช้บริการ : </b> ' . mysqli_num_rows($query_s2) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p2['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>สิ้นสุดให้บริการ : </b> ' . mysqli_num_rows($query_s3) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p3['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>ยกเลิกบริการ : </b> ' . mysqli_num_rows($query_s10) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p10['total'], 2) . ' บาท </p> ';
            } elseif ($_GET['status'] == "3") {
                $html .= '<p style="text-align: right;"><b>ทางร้านนำสุนัขไปส่ง : </b> ' . mysqli_num_rows($query_deposit) .  ' รายการ</p> ';
                $html .= '<p style="text-align: right;"><b>ลูกค้ามารับสุนัขเอง : </b> ' . mysqli_num_rows($query_get) . ' รายการ</p> ';
            }
        }
        $html .= ' ';


        $mpdf->WriteHTML($html);
        $file_name = 'deposit_report.pdf';
        $mpdf->Output($file_name, 'D');
        $mpdf->Output();

        break;



    case 'report_service':
        $mpdf = new \Mpdf\Mpdf();
        //custom font
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/assets/fonts',
            ]),
            'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' =>  'THSarabunNew Bold.ttf',
                ]
            ],
        ]);
        $html = '<style>
                * , th ,td , h2 ,p ,b{
                    font-family: "sarabun" !important;
                    font-size: 14px;
                }
                p{
                    text-align: justify;
                }
                h1{
                    text-align: center;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                </style>';


        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];
        }
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'all') {
                $status = "ทั้งหมด";
            } elseif ($_GET['status'] == '0') {
                $status = "รอชำระเงิน";
            } elseif ($_GET['status'] == '1') {
                $status = "ชำระเงินแล้ว/รอเข้าใช้บริการ";
            } elseif ($_GET['status'] == '2') {
                $status = "กำลังใช้บริการ";
            } else {
                $status = "สิ้นสุดการให้บริการ";
            }


            $html .=
                '
            <div style="text-align:center;">
                <img src="../images/logo.jpg" style="width: 70px;" alt="">
                <h2 style="font-size: 20px;">ร้าน Good Dog Home</h2>
                <h2 style="font-size: 20px;">รายงานสปาสถานะ : ' . $status . '</h2>';
            if (isset($_GET['start'])) {
                $date_start = $_GET['start'];
                $date_end = $_GET['end'];
                if ($_GET['start']) {
                    $html .= '<h2 style="font-size: 20px;">  ภายในวันที่ : ' . $date_start .  '  ถึงวันที่  : ' . $date_end . '</h2> ';
                }
            }
            $html .= '
            </div>';
        }
        $html .= '
            <table style="width: 100%">
                    <thead>
                    <tr align="center">
                        <th style="width: 5%;">ลำดับ</th>
                        <th style="width: 5%;">รหัสการเข้าใช้บริการ</th>
                        <th style="width: 20%;">ชื่อลูกค้า</th>
                        <th style="width: 15%;">วันที่ให้บริการ</th>
                        <th style="width: 25%;">ชื่อบริการ</th>
                        <th style="width: 15%;">ราคารวม</th>';
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "all") {
                $html .= '<th style="width: 10%;">สถานะ: ' . $result["status_name"] . '</th> ';
            }
        }
        $html .= '
                    </tr>
                </thead>
                <tbody>';

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
        $i = 1;
        $sql = "SELECT * FROM use_service
        INNER JOIN dog ON use_service.dog_id = dog.dog_id
        INNER JOIN user ON dog.user_id = user.user_id
        INNER JOIN service ON use_service.service_id = service.service_id 
        $where ORDER BY us_id";
        $total = 0;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        while ($result = mysqli_fetch_array($query)) {
            $html .= '<tr>
                            <td style="text-align:center;">' . $i++ . '</td>
                            <td style="text-align:center;">' . $result["us_id"] . '</td>
                            <td style="text-align:center;">' . $result["username"] . '</td>
                            <td style="text-align:center;">' . $result["us_date"] . '</td>
                            <td style="text-align:center;">' . $result["service_name"] . '</td>
                            <td style="text-align:center;">' . number_format($result["us_price"], 2) . '</td> ';
            if (isset($_GET['status'])) {
                if ($_GET['status'] == "all") {
                    $html .= '<td style="text-align:center;">' . $result["status_name"] . '</td> ';
                }
            }
            $html .= '
                        </tr>';
            $total += $result["us_price"];
        }

        $html .= '</tbody>
                </table>';
        $where0 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where0 .= "us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end' AND us_status = '0'";
        } elseif (!isset($_GET['start'])) {
            $where0 .= "us_status = '0'";
        }
        $where1 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where1 .= "us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end' AND us_status = '1'";
        } elseif (!isset($_GET['start'])) {
            $where1 .= "us_status = '1'";
        }
        $where2 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where2 .= "us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end' AND us_status = '2'";
        } elseif (!isset($_GET['start'])) {
            $where2 .= "us_status = '2'";
        }
        $where3 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where3 .= "us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end' AND us_status = '3'";
        } elseif (!isset($_GET['start'])) {
            $where3 .= "us_status = '3'";
        }
        $where10 = "";
        if (isset($_GET['start'])) {
            $date_start = $_GET['start'];
            $date_end = $_GET['end'];

            $where10 .= "us_date BETWEEN '$date_start' AND '$date_end' AND us_date BETWEEN '$date_start' AND '$date_end' AND us_status = '10'";
        } elseif (!isset($_GET['start'])) {
            $where10 .= "us_status = '10'";
        }


        $html .= '<p style="text-align: right;"><b>ทั้งหมด</b> ' . number_format($row) . ' รายการ
        <b>เป็นจำนวนเงิน</b> ' . number_format($total, 2) . ' บาท</p>';

        $sql_s0 = "SELECT * FROM use_service WHERE  $where0"; // ไม่ได้เลือกวันที่ status=0
        $query_s0 = mysqli_query($conn, $sql_s0);
        $sql_p0 = "SELECT *, sum(us_price) as total FROM use_service WHERE $where0 ";  // ไม่ได้เลือกวันที่ status=0
        $query_p0 = mysqli_query($conn, $sql_p0);
        $result_p0 = mysqli_fetch_array($query_p0);

        $sql_s1 = "SELECT * FROM use_service WHERE  $where1"; // ไม่ได้เลือกวันที่ status=1
        $query_s1 = mysqli_query($conn, $sql_s1);
        $sql_p1 = "SELECT *, sum(us_price) as total FROM use_service WHERE $where1 ";  // ไม่ได้เลือกวันที่ status=1
        $query_p1 = mysqli_query($conn, $sql_p1);
        $result_p1 = mysqli_fetch_array($query_p1);

        $sql_s2 = "SELECT * FROM use_service WHERE  $where2"; // ไม่ได้เลือกวันที่ status=2
        $query_s2 = mysqli_query($conn, $sql_s2);
        $sql_p2 = "SELECT *, sum(us_price) as total FROM use_service WHERE $where2 ";  // ไม่ได้เลือกวันที่ status=2
        $query_p2 = mysqli_query($conn, $sql_p2);
        $result_p2 = mysqli_fetch_array($query_p2);

        $sql_s3 = "SELECT * FROM use_service WHERE  $where3"; // ไม่ได้เลือกวันที่ status=2
        $query_s3 = mysqli_query($conn, $sql_s3);
        $sql_p3 = "SELECT *, sum(us_price) as total FROM use_service WHERE $where3 ";  // ไม่ได้เลือกวันที่ status=2
        $query_p3 = mysqli_query($conn, $sql_p3);
        $result_p3 = mysqli_fetch_array($query_p3);

        $sql_s10 = "SELECT * FROM use_service WHERE  $where10"; // ไม่ได้เลือกวันที่ status=10
        $query_s10 = mysqli_query($conn, $sql_s10);
        $sql_p10 = "SELECT *, sum(us_price) as total FROM use_service WHERE $where10 ";  // ไม่ได้เลือกวันที่ status=10
        $query_p10 = mysqli_query($conn, $sql_p10);
        $result_p10 = mysqli_fetch_array($query_p10);

        if (isset($_GET['status'])) {
            if ($_GET['status'] == "all") {
                $html .= '<p style="text-align: right;"><b>รายการรอชำระเงิน : </b> ' . mysqli_num_rows($query_s0) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p0['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>ชำระเงินแล้ว/รอเข้าใช้บริการ : </b> ' . mysqli_num_rows($query_s1) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p1['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>กำลังใช้บริการ : </b> ' . mysqli_num_rows($query_s2) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p2['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>สิ้นสุดให้บริการ : </b> ' . mysqli_num_rows($query_s3) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p3['total'], 2) . ' บาท </p> ';
                $html .= '<p style="text-align: right;"><b>ยกเลิกบริการ : </b> ' . mysqli_num_rows($query_s10) .  ' รายการ
                <b>เป็นจำนวนเงิน</b> ' . number_format($result_p10['total'], 2) . ' บาท </p> ';
            } elseif ($_GET['status'] == "3") {
                $html .= '<p style="text-align: right;"><b>ทางร้านนำสุนัขไปส่ง : </b> ' . mysqli_num_rows($query_deposit) .  ' รายการ</p> ';
                $html .= '<p style="text-align: right;"><b>ลูกค้ามารับสุนัขเอง : </b> ' . mysqli_num_rows($query_get) . ' รายการ</p> ';
            }
        }
        $html .= ' ';


        $mpdf->WriteHTML($html);
        $file_name = 'useservice_report.pdf';
        $mpdf->Output($file_name, 'D');
        $mpdf->Output();
        break;


    case 'report_dog':
        $mpdf = new \Mpdf\Mpdf();
        //custom font
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/assets/fonts',
            ]),
            'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' =>  'THSarabunNew Bold.ttf',
                ]
            ],
        ]);
        $html = '<style>
                * , th ,td , h2 ,p ,b{
                    font-family: "sarabun" !important;
                    font-size: 14px;
                }
                p{
                    text-align: justify;
                }
                h1{
                    text-align: center;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                </style>';

        $html .= '
            <div style="text-align:center;">
                <img src="../images/logo.jpg" style="width: 70px;" alt="">
                <h2 style="font-size: 20px;">ร้าน Good Dog Home</h2>
                <h2 style="font-size: 20px;">รายงานสุนัข</h2>
            </div>
            <table style="width: 100%">
                    <thead>
                    <tr align="center">
                        <th style="width: 5%;">ลำดับ</th>
                        <th style="width: 5%;">ชื่อสุนัข</th>
                        <th style="width: 20%;">พันธุ์สุนัข</th>
                        <th style="width: 15%;">อายุ</th>
                        <th style="width: 25%;">ชื่อเจ้าของสุนัข</th>
                    </tr>
                </thead>
                <tbody>';

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
        $i = 1;
        $sql = "SELECT * FROM dog
        INNER JOIN user ON dog.user_id = user.user_id
        $where";
        $total = 0;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        while ($result = mysqli_fetch_array($query)) {
            $html .= '<tr>
                            <td style="text-align:center;">' . $i++ . '</td>
                            <td style="text-align:center;">' . $result["dog_name"] . '</td>
                            <td style="text-align:center;">' . $result["dog_type"] . '</td>
                            <td style="text-align:center;">' . $result["dog_age"] . '</td>
                            <td style="text-align:center;">' . $result["username"] . '</td>
                        </tr>';
        }

        $html .= '</tbody>
                </table>';
        $html .= '<p style="text-align: right;"><b>จำนวนสุนัขทั้งหมด</b> ' . number_format($row) . ' ตัว</p>';

        $mpdf->WriteHTML($html);
        $file_name = 'dog_report.pdf';
        $mpdf->Output($file_name, 'D');
        $mpdf->Output();
        break;

    default:
        # code...
        break;
}
