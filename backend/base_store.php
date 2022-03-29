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
            <div class="col-12" style="">
              <h4 class="title" style="color: black;">ข้อมูลร้าน</h4>
            </div>
            <hr>
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="header"> -->
              <!-- <h4 class="title">ข้อมูลร้าน </h4> -->

              <!-- ปุ่มเพิ่มร้าน
              <div class="d-flex">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addstore" data-whatever="@mdo">เพิ่ม</button>
              </div> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->

              <div class="content table table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th>ชื่อ</th>
                      <th>ที่อยู่</th>
                      <th>เบอร์โทร</th>
                      <th>อีเมล์</th>
                      <th>โลโก้</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM store ";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["store_name"] ?> </th>
                        <td><?= $row["store_add"] ?></td>
                        <td><?= $row["store_tel"] ?></td>
                        <td><?= $row["store_email"] ?></td>
                        <td><img src="../api/store/uploads/<?= $row['store_logo'];?>" style="width: 300px; height: 300px;" alt=""></td>
                        <td>
                          <a class="btn btn-warning" href="editstore.php?store_id=<?= $row["store_id"] ?>">แก้ไข</a>
                          <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button> -->
                          <!-- <a href="../api/store/delstore.php?store_id=<?= $row['store_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a> -->
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