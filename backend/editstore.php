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
              <h4 class="title">แก้ไขข้อมูลร้าน </h4>
              <hr>
              <?php
              $store_id = $_GET['store_id'];
              $sql = "SELECT * FROM store WHERE store_id ='$store_id' ";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($query)) {

              ?>
                <form id="editStore">
                  <input type="hidden" name="store_id" value="<?= $row['store_id']; ?>" id="inputstoreid">
                  <div class="col-md-12">
                    <label for="inputstorename" class="form-label">ชื่อร้าน :</label>
                    <input name="store_name" value="<?= $row['store_name']; ?>" type="text" class="form-control" id="inputstorename" placeholder="กรอกชื่อร้าน" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputstoreadd" class="form-label">ที่อยู่ร้าน :</label>
                    <input name="store_add" value="<?= $row['store_add']; ?>" type="text" class="form-control" id="inputstoreadd" placeholder="กรอกที่อยู่ร้าน" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputstoretel" class="form-label">เบอร์โทร :</label>
                    <input name="store_tel" value="<?= $row['store_tel']; ?>" type="tel" class="form-control" id="inputstoretel" placeholder="กรอกเบอร์โทร" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputstoreemail" class="form-label">อีเมล์ :</label>
                    <input name="store_email" value="<?= $row['store_email']; ?>" type="email" class="form-control" id="inputstoreemail" placeholder="กรอกอีเมล์" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputstorelogo" class="form-label">โลโก้ร้าน :</label>
                    <input type="file" name="store_logo" id="inputstorelogo" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success" value="upload">บันทึก</button>
                  </div>
                </form>
              <?php } ?>
              <?php
              include 'layout/footer.php';
              ?>
              <script>
                $("#editStore").submit(function(e) {
                  e.preventDefault()
                  var formData = new FormData(this)
                  jQuery.ajax({
                    url: "../api/store/editstoredb.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                      var output = jQuery.parseJSON(data);
                      if (output.success) {
                        swal("แก้ไขข้อมูลร้านสำเร็จ", " ", "success").then(function() {
                          window.location = "base_store.php"
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