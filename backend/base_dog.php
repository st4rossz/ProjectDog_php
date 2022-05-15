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
            <div class="col-12" >
              <h4 class="title" style="color: black;">ข้อมูลสุนัข</h4>
            </div>
            <hr>
            <div class="card">
              <div class="content table-full-width">
                <table class="table table-striped table-bordered ">
                  <thead>
                    <tr align="center">
                      <th>ชื่อ</th>
                      <th>พันธ์ุ</th>
                      <th>น้ำหนัก(กิโลกรัม)</th>
                      <th>อายุ(ปี)</th>
                      <th>แพ้ยา/แพ้อาหาร</th>
                      <th>ชื่อเจ้าของ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM dog INNER JOIN user ON dog.user_id = user.user_id";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr align="center">
                        <td><?= $row["dog_name"] ?></td>
                        <td><?= $row["dog_type"] ?></td>
                        <td><?= $row["dog_weight"] ?></td>
                        <td><?= $row["dog_age"] ?></td>
                        <td><?= $row["dog_sickness"] ?></td>
                        <td><?= $row["username"] ?></td>
                        <td>
                          <a class="btn btn-warning" href="editdog.php?dog_id=<?= $row["dog_id"] ?>">แก้ไข</a>

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