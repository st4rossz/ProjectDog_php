<?php
include 'layout/header.php';
?>

<body class="">
  <div class="wrapper">
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
            <div class="card">
              <!-- <div class="header"> -->
              <h4 class="title">ยืนยันเข้าใช้บริการ </h4>

              <hr>
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-responsive table-full-width">
                <table class="table table-bordered">
                  <thead>
                    <tr align="center">
                      <th>รหัสเข้าใช้บริการ</th>
                      <th>วันที่เลือกใช้บริการ</th>
                      <th>สถานะบริการ</th>
                      <th>รหัสสุนัข</th>
                      <th>ชื่อบริการ</th>
                      <!-- <th>dog_sickness</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $sql = "SELECT * FROM deposit WHERE room_id IS NULL ";
                    $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id WHERE us_status = 0";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["us_id"] ?> </th>
                        <td><?= $row["us_date"] ?></td>
                        <td><?= $row["us_status"]?></td>
                        <td><?= $row["dog_id"]?></td>
                        <td><?= $row["service_id"] ?></td>
                        <td><a class="btn btn-primary btn-lg" href="../api/_updateus_status.php?us_id=<?= $row["us_id"] ?>">เข้ารับบริการ</a>
                        <!-- <td><a href=""></a></td> -->
                        <!-- <td>
                          <a class="btn btn-warning" href="editstore.php?store_id=<?= $row["store_id"] ?>">แก้ไข</a>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button>
                        <a href="../api/store/delstore.php?store_id=<?= $row['store_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a>
                        </td> -->
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