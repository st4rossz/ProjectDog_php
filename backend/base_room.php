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
              <h4 class="title" style="color: black;">ข้อมูลห้อง</h4>
            </div>
            <hr>
            <div class="col-md-12">
              <div class="card">
                <div class="content table-full-width">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr align="center">
                        <th>รหัสห้องพัก</th>
                        <th>ชื่อประเภทห้อง</th>
                        <th>จำนวนห้อง</th>
                        <th>อัตราบริการ/วัน(บาท)</th>
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
                            <a onclick="deleteRoom(<?= $row['room_id'] ?>)" class="btn btn-danger text-white">ลบ</a>
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
            $("#addRoom").submit(function(e) {
              e.preventDefault()
              var formData = new FormData(this)
              jQuery.ajax({
                url: "../api/room/addroom.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                  var output = jQuery.parseJSON(data);
                  if (output.success) {
                    swal("เพิ่มห้องพักสำเร็จ", " ", "success").then(function() {
                      location.reload()
                    })
                  } else {
                    swal(" " + output.msg, " ", "error")
                  }
                }
              })
            })

            function deleteRoom(id) {
              swal({
                  title: "แจ้งเตือน",
                  text: "ลบแล้วกู้คืนไม่ได้",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.post('../api/room/delroom.php', {
                      id: id
                    }, function(data) {
                      if (data.success) {
                        swal("แจ้งเตือน", "ลบห้องพักห้องนี้สำเร็จ", "success").then(function() {
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