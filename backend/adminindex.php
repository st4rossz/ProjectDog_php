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
      // print_r($_SESSION);
      ?>
      <!-- End Navbar -->

      <!-- Content -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <h4 class="title" style="color: black;">ยืนยันการสมัคร</h4>
            <hr>
          </div>
          <hr>
          <div class="col-md-12">
            <div class="card">
              <div class="content table table-full-width">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr align="center">
                      <th style="width: 10%;">รหัสผู้ใช้</th>
                      <th style="width: 15%;">ชื่อผู้ใช้</th>
                      <th style="width: 15%;">อีเมล์ผู้ใช้</th>
                      <th style="width: 15%;">ชื่อ-สกุล</th>
                      <th style="width: 25%;">ที่อยู่</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM user WHERE status=0";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr align="center">
                        <th scope="row"> <?= $row["user_id"] ?> </th>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["fullname"] ?></td>
                        <td><?= $row["address"] ?></td>
                        <td>
                          <a class="btn btn-success btn-lg" href="../api/_approveuser.php?user_id=<?= $row["user_id"] ?>" onclick="javascript:return confirm('ยืนยันสิทธิ์ผู้ใช้ท่านนี้ใช่หรือไม่?');">อนุมัติ</a>
                          <a class="btn btn-danger btn-lg" href="../api/_declineuser.php?user_id=<?= $row["user_id"] ?>" onclick="javascript:return confirm('ต้องการลบคำขอนี้ใช่หรือไม่?');">ยกเลิก</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include 'layout/footer.php'; ?>
</body>

</html>