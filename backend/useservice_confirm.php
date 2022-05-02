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
              <h4 class="title" style="color: black;">ยืนยันการเข้าใช้บริการ (สปาร์สุนัข)</h4>
            </div>
            <hr>
            <div class="card">
              <div class="content table-full-width">
                <table class="table table-striped table-bordered ">
                  <thead>
                    <tr align="center">
                      <th style="width: 20%;">รูปสุนัข</th>
                      <th style="width: 5%;">ชื่อสุนัข</th>
                      <th style="width: 10%;">พันธ์ุ</th>
                      <th style="width: 10%;">วันที่จองบริการ</th>
                      <th style="width: 5%;">ประเภทบริการ</th>
                      <th style="width: 10%;">เจ้าของสุนัข</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM use_service INNER JOIN service ON use_service.service_id = service.service_id INNER JOIN dog ON use_service.dog_id = dog.dog_id INNER JOIN user ON dog.user_id = user.user_id WHERE us_status = 1";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr align="center">
                        <td>
                          <?php
                          if (!empty($row["image"])) {
                            echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 300px; height: 350px;" alt="">';
                          } else {
                            echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ลูกค้าท่านนี้ยังไม่ได้ทำการเพิ่มรูปสุนัข</p>';
                          }
                          ?>
                        </td>
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["dog_type"] ?></td>
                        <td><?= $row["us_date"] ?></td>
                        <td><?= $row["service_name"] ?></td>
                        <td><?= $row["fullname"] ?></td>

                        <td style="width: 15%;">
                          <a class="btn btn-lg btn-primary" href="useserv_detail.php?us_id=<?= $row["us_id"] ?>">รายละเอียด</a>
                        </td>
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