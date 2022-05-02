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
              <h4 class="title" style="color: black;">บันทึกการติดตามสุนัข (ฝากเลี้ยง)</h4>
            </div>
            <hr>
            <div class="card">
              <!-- <div class="header"> -->
              <!-- <h4 class="title" style="padding-left: 3%;">ข้อมูลสุนัข</h4> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <!-- ปุ่มเพิ่มร้าน -->
              <!-- <div class="d-flex">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#adddog" data-whatever="@mdo">เพิ่มข้อมูลสุนัข</button>
              </div> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <!-- <th>รหัส</th> -->
                      <th style="width: 10%;">ชื่อ</th>
                      <th style="width: 10%;">พันธ์ุ</th>
                      <th style="width: 10%;">น้ำหนัก(กิโลกรัม)</th>
                      <th style="width: 5%;">อายุ(ปี)</th>
                      <th style="width: 25%;">หมายเหตุ</th>
                      <th style="width: 30%;">รูปภาพสุนัข</th>
                      <th style="width: 10%;">เพิ่มเติม</th>
                      <!-- <th>user_id</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $sql = "SELECT * FROM dog ";
                    $sql = "SELECT *, dog.image FROM deposit INNER JOIN dog ON deposit.dog_id = dog.dog_id WHERE dep_status = 2";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["dog_type"] ?></td>
                        <td><?= $row["dog_weight"] ?></td>
                        <td><?= $row["dog_age"] ?></td>
                        <td><?= $row["deprec_detail"] ?></td>
                        <td>
                          <?php
                            if (!empty($row["image"])) {
                              echo '<img src="../api/dog/uploads/' . $row['image'] . '" style="width: 300px; height: 350px;" alt="">';
                            } else {
                              echo '<p style="color: red;"><i style="margin-right: 1%;" class="fa fa-times-circle-o fa-lg" aria-hidden="true" ></i>ยังไม่มีรูปสุนัข</p>';
                            }
                            ?>
                        </td>
                        <td>
                          <a class="btn btn-warning" href="add_dep_record.php?dep_id=<?= $row["dep_id"] ?>">เพิ่มบันทึก</a>
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