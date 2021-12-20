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
              <h4 class="title">ยืนยันการจองห้อง </h4>

              <hr>
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th>รหัสสุนัข</th>
                      <th>จำนวนวันเข้าพัก</th>
                      <th>น้ำหนักสุนัข</th>
                      <th>พันธ์ุสุนัข</th>
                      <th>โรคประจำตัว,แพ้อาหาร</th>
                      <th>รหัสห้องพัก</th>
                      <!-- <th>dog_sickness</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $sql = "SELECT * FROM deposit WHERE room_id IS NULL ";
                    $sql = "SELECT * FROM deposit INNER JOIN dog ON deposit.dog_id = dog.dog_id";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["dog_id"] ?> </th>
                        <td><?= $row["dep_day"] ?></td>
                        <td><?= $row["dog_weight"]?></td>
                        <td><?= $row["dog_type"]?></td>
                        <td><?= $row["dog_sickness"] ?></td>
                        <td><?= $row["room_id"] ?></td>
                        <td><a class="btn btn-primary btn-lg" href="../api/_updatestatus.php?user_id=<?= $row["user_id"] ?>">ยืนยัน</a>
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