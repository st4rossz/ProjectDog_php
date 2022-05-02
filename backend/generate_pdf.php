<?php
include '../api/server.php';
require '../vendor/autoload.php';

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
        * , th ,td , h2{
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
        <h2 style="font-size: 20px;">รายงาน</h2>
    </div>
    <table style="width: 100%">
            <thead>
            <tr align="center">
                <th style="width: 5%;">ชื่อสุนัข</th>
                <th style="width: 10%;">พันธ์ุ</th>
                <th style="width: 10%;">วันที่เข้าใช้บริการ</th>
                <th style="width: 10%;">วันที่สิ้นสุด</th>
                <th style="width: 5%;">ประเภทห้อง</th>
                <th style="width: 10%;">เจ้าของสุนัข</th>
                <th style="width: 20%;">รูปสุนัข</th>
                <th style="width: 10%;">สถานะ</th>
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

$sql = "SELECT *, dog.image FROM deposit 
    INNER JOIN room ON deposit.room_id = room.room_id 
    INNER JOIN dog ON deposit.dog_id = dog.dog_id 
    INNER JOIN user ON dog.user_id = user.user_id
    $where";
$query = mysqli_query($conn, $sql);
while ($result = mysqli_fetch_array($query)) {
    $html .= '<tr>
                    <td style="text-align:center;">' . $result["dog_name"] . '</td>
                    <td style="text-align:center;">' . $result["dog_type"] . '</td>
                    <td style="text-align:center;">' . $result["dep_sdate"] . '</td>
                    <td style="text-align:center;">' . $result["dep_edate"] . '</td>
                    <td style="text-align:center;">' . $result["room_type"] . '</td>
                    <td style="text-align:center;">' . $result["username"] . '</td>
                    <td style="text-align:center;">' . (!empty($result["image"]) ? '<img src="../api/dog/uploads/' . $result['image'] . '" style="width: 70px;" alt="">' : '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>') . '</td>
                    <td style="text-align:center;">' . $result["status_name"] . '</td>
                 </tr>';
}
$html .= '</tbody>
        </table>';
$mpdf->WriteHTML($html);
$file_name = 'gooddoghomeReport.pdf';
$mpdf->Output($file_name, 'D');
// $mpdf->Output();
