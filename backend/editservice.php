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
              <h4 class="title">แก้ไขข้อมูลบริการ </h4>
              <hr>
              <?php
              $service_id = $_GET['service_id'];
              $sql = "SELECT * FROM service WHERE service_id ='$service_id' ";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <form id="editService">
                  <input type="hidden" name="service_id" value="<?= $row['service_id']; ?>" id="inputserviceid">
                  <div class="col-md-12">
                    <label for="inputservicename" class="form-label">ชื่อบริการ</label>
                    <input name="service_name" value="<?= $row['service_name']; ?>" type="text" class="form-control" id="inputservicename" placeholder="บริการ" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputserviceprice" class="form-label">อัตราบริการ</label>
                    <input name="service_price" value="<?= $row['service_price']; ?>" type="text" class="form-control" id="inputserviceadd" placeholder="ราคา" required>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                  </div>
                </form>
              <?php } ?>
              <?php include 'layout/footer.php'; ?>
              <script>
                $("#editService").submit(function(e) {
                  e.preventDefault()
                  var formData = new FormData(this)
                  jQuery.ajax({
                    url: "../api/service/editservicedb.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                      var output = jQuery.parseJSON(data);
                      if (output.success) {
                        swal("แก้ไขข้อมูลบริการสำเร็จ", " ", "success").then(function() {
                          window.location = "base_service.php"
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