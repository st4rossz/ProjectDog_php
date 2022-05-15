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
              <h4 class="title" style="color: black;">ข้อมูลบริการ</h4>
            </div>
            <hr>
            <div class="col-md-12">
              <div class="card">
                <div class="content table-full-width">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr align="center">
                        <th>รหัส</th>
                        <th>ชื่อประเภทบริการ</th>
                        <th>อัตราบริการ(บาท)</th>
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
                            <a onclick="deleteService(<?= $row['service_id'] ?>)" class="btn btn-danger text-white">ลบ</a>
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
          <?php include 'layout/footer.php'; ?>
          <script>
            $("#addService").submit(function(e) {
              e.preventDefault()
              var formData = new FormData(this)
              jQuery.ajax({
                url: "../api/service/addservice.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                  var output = jQuery.parseJSON(data);
                  if (output.success) {
                    swal("เพิ่มข้อมูลบริการสำเร็จ", " ", "success").then(function() {
                      location.reload()
                    })
                  } else {
                    swal(" " + output.msg, " ", "error")
                  }
                }
              })
            })

            function deleteService(id) {
              swal({
                  title: "แจ้งเตือน",
                  text: "ลบแล้วกู้คืนไม่ได้",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.post('../api/service/delservice.php', {
                      id: id
                    }, function(data) {
                      if (data.success) {
                        swal("แจ้งเตือน", "ลบบริการนี้สำเร็จ", "success").then(function() {
                          location.reload()
                        })
                      }
                    }, 'json')
                  }
                });
            }
          </script>
</body>

</html>