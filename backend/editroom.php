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
            <div class="card">
              <!-- <div class="header"> -->
              <h4 class="title">แก้ไขห้องพักสุนัข </h4>
              <hr>
              <?php
              $room_id = $_GET['room_id'];
              $sql = "SELECT * FROM room WHERE room_id ='$room_id' ";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($query)) {

              ?>
                <form id="editRoom">
                  <input type="hidden" name="room_id" value="<?= $row['room_id']; ?>" id="inputroomid">
                  <div class="col-md-12">
                    <label for="inputroomname" class="form-label">ประเภทห้องพัก</label>
                    <input name="room_type" value="<?= $row['room_type']; ?>" type="text" class="form-control" id="inputroomtype" placeholder="กรอกประเภทห้องพัก" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputroomquantity" class="form-label">จำนวนห้องพัก</label>
                    <select name="room_quantity" class="form-control" id="inputroomquantity">
                      <option value="<?= $row['room_quantity']; ?>"><?= $row['room_quantity']; ?></option>
                      <?php

                      for ($i = 1; $i <= 100; $i++) {
                      ?>

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="inputroomprice" class="form-label">อัตราบริการ/วัน</label>
                    <input name="room_price" value="<?= $row['room_price']; ?>" type="text" class="form-control" id="inputroomprice" placeholder="กรอกจำนวนห้องพัก" required>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                  </div>
                </form>
              <?php } ?>
              <?php include 'layout/footer.php'; ?>
              <script>
                $("#editRoom").submit(function(e) {
                  e.preventDefault()
                  var formData = new FormData(this)
                  jQuery.ajax({
                    url: "../api/room/editroomdb.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                      var output = jQuery.parseJSON(data);
                      if (output.success) {
                        swal("แก้ไขข้อมูลห้องพักสำเร็จ", " ", "success").then(function() {
                          window.location = "base_room.php"
                        })
                      } else {
                        swal(" " + output.msg, " ", "error")
                      }
                    }
                  })
                })
              </script>
</body>

</html>