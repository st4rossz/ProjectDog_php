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
      <div class="content" style="font-family: Kanit Thin;">
        <div class="row">
          <div class="col-md-12">
            <div class="col-12">
              <h4 class="title" style="color: black;">ยืนยันการเข้าใช้บริการ</h4>
            </div>
            <hr>
            <div class="card">
              <!-- <div class="header"> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th>รหัสการจองบริการ</th>
                      <th>ชื่อสุนัข</th>
                      <th>วันที่เลือกใช้บริการ</th>
                      <th>ชื่อบริการ</th>
                      <th>สถานะบริการ</th>

                      <!-- <th>dog_sickness</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $sql = "SELECT * FROM deposit WHERE room_id IS NULL ";
                    $sql = "SELECT * FROM use_service INNER JOIN service ON (use_service.service_id = service.service_id) INNER JOIN dog ON use_service.dog_id = dog.dog_id WHERE us_status = 0";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["us_id"] ?> </th>
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["us_date"] ?></td>
                        <td><?= $row["service_name"] ?></td>
                        <td><?= $row["us_status"] ?></td>
                        <td><a class="btn btn-primary btn-lg" href="useserv_detail.php?us_id=<?= $row["us_id"] ?>">รายละเอียด</a>
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