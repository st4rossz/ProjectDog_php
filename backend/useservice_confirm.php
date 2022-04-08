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
              <h4 class="title" style="color: black;">ยืนยันการเข้าใช้บริการ (สปาร์สุนัข)</h4>
            </div>
            <hr>
            <div class="card">
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th style="width: 10%;">รหัสการจองบริการ</th>
                      <th style="width: 20%;">เจ้าของ</th>
                      <th style="width: 15%;">ชื่อสุนัข</th>
                      <th style="width: 20%;">วันที่เลือกใช้บริการ</th>
                      <th style="width: 20%;">ชื่อบริการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM use_service INNER JOIN service ON (use_service.service_id = service.service_id) INNER JOIN dog ON (use_service.dog_id = dog.dog_id) INNER JOIN user ON (dog.user_id = user.user_id) WHERE us_status = 0";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["us_id"] ?> </th>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["us_date"] ?></td>
                        <td><?= $row["service_name"] ?></td>
                        <td><a class="btn btn-primary btn-lg" href="useserv_detail.php?us_id=<?= $row["us_id"] ?>">รายละเอียด</a>
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