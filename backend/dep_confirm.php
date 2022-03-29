<?php
include 'layout/header.php';
?>

<body class="bodyfont">
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
            <div class="col-12">
              <h4 class="title" style="color: black;">ยืนยันการจอง</h4>
            </div>
            <hr>
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="header"> -->
                <!-- <p class="category">Here is a subtitle for this table</p> -->
                <!-- </div> -->
                <div class="content table-full-width">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr align="center">
                        <th style="width: 10%;">รหัสการจอง</th>
                        <th style="width: 15%;">ชื่อเจ้าของ</th>
                        <th style="width: 15%;">ชื่อสุนัข</th>
                        <th style="width: 20%;">วันที่ฝาก</th>
                        <th style="width: 20%;">วันที่ออก</th>
                        <th style="width: 5%;">จำนวนวัน</th>
                        <!-- <th>dog_sickness</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // $sql = "SELECT * FROM deposit WHERE room_id IS NULL ";
                      $sql = "SELECT * FROM deposit INNER JOIN dog ON deposit.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE dep_status = 0";
                      $query = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr align="center">
                          <th scope="row"> <?= $row["dep_id"] ?> </th>
                          <td><?= $row["username"] ?></td>
                          <td><?= $row["dog_name"] ?></td>
                          <td><?= $row["dep_sdate"] ?></td>
                          <td><?= $row["dep_edate"] ?></td>
                          <td><?= $row["dep_day"]; ?></td>
                          <!-- <td><a class="btn btn-primary btn-lg" href="../api/depositstatus/_updatedepstatus.php?user_id=<?= $row["user_id"] ?>">ยืนยัน</a></td> -->
                          <td><a class="btn btn-primary btn-lg" href="depositdetail.php?dep_id=<?= $row["dep_id"] ?>">รายละเอียด</a></td>
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