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
            <div class="col-12" >
              <h4 class="title" style="color: black;">ข้อมูลบริการ</h4>
            </div>
            <hr>
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="header"> -->
              <!-- <h4 class="title">ข้อมูลบริการ</h4> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <!-- ปุ่มเพิ่มร้าน -->
              <!-- <div class="d-flex">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addservice" data-whatever="@mdo">เพิ่มข้อมูลบริการ</button>
              </div> -->
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th>รหัส</th>
                      <th>ชื่อประเภทบริการ</th>
                      <th>ราคา(บาท)</th>
                      <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addservice" data-whatever="@mdo">เพิ่มข้อมูลบริการ</button></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM service ";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["service_id"] ?> </th>
                        <td><?= $row["service_name"] ?></td>
                        <td><?= $row["service_price"] ?></td>
                        <td>
                          <a class="btn btn-warning" href="editservice.php?service_id=<?= $row["service_id"] ?>">แก้ไข</a>
                          <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstore" data-whatever="@mdo">แก้ไข</button> -->
                          <a href="../api/service/delservice.php?service_id=<?= $row['service_id'] ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" class="btn btn-danger">ลบ</a>
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