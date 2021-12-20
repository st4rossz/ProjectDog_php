
<?php
include 'layout/header.php';
?>

<body class="">
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
            <div class="card">
              <!-- <div class="header"> -->
              <h4 class="title">เพิ่มข้อมูลสุนัข</h4>
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
                   <!-- ปุ่มเพิ่มร้าน -->
                   <div class="d-flex">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#adddog" data-whatever="@mdo">เพิ่มข้อมูลสุนัข</button>
                </div>
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered ">
                  <thead>
                    <tr>
                      <th>รหัสสุนัข</th>
                      <th>ชื่อสุนัข</th>
                      <th>พันธ์ุสุนัข</th>
                      <th>น้ำหนักสุนัข</th>
                      <th>อายุสุนัข</th>
                      <th>แพ้ยา/แพ้อาหาร</th>
                      <th>รหัสเจ้าของ</th>
                      <!-- <th>user_id</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM dog ";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <th scope="row"> <?= $row["dog_id"] ?> </th>
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["dog_type"] ?></td>
                        <td><?= $row["dog_weight"] ?></td>
                        <td><?= $row["dog_age"] ?></td>
                        <td><?= $row["dog_sickness"] ?></td>
                        <td><?= $row["user_id"] ?></td>
                        <td>
                          <a class="btn btn-warning" href="editdog.php?dog_id=<?= $row["dog_id"] ?>">แก้ไข</a>
                        <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button> -->
                        <a href="../api/dog/deldog.php?dog_id=<?= $row['dog_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a>
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