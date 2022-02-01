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
      <div class="content" style="font-family: Kanit Thin;">
        <div class="row">
        <div class="col-md-12">
            <div class="col-12">
              <h4 class="title" style="color: black;">ข้อมูลห้อง</h4>
            </div>
            <hr>
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="header"> -->
              <!-- <h4 class="title">ข้อมูลห้อง</h4> -->

              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <!-- ปุ่มเพิ่มร้าน -->
              <!-- <div class="d-flex">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addroom" data-whatever="@mdo">เพิ่มข้อมูลห้องพักสุนัข</button>
              </div> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th>รหัสห้องพัก</th>
                      <th>ชื่อประเภทห้อง</th>
                      <th>จำนวนห้อง</th>
                      <th>ราคา/วัน(บาท)</th>
                      <th><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addroom" data-whatever="@mdo">เพิ่มประเภทห้อง</button></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM room ";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["room_id"] ?> </th>
                        <td><?= $row["room_type"] ?></td>
                        <td><?= $row["room_quantity"] ?></td>
                        <td><?= $row["room_price"] ?></td>
                        <td>
                          <a class="btn btn-warning" href="editroom.php?room_id=<?= $row["room_id"] ?>">แก้ไข</a>
                          <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button> -->
                          <a href="../api/room/delroom.php?room_id=<?= $row['room_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a>
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