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
          <div class="col-12">
            <h4 class="title" style="color: black;">บันทึกการติดตามสุนัข (ฝากเลี้ยง)</h4>
            <hr>
          </div>
          <div class="col-md-12">
            <div class="card">
              <?php
              $dep_id = $_GET['dep_id'];
              $sql = "SELECT * FROM deposit INNER JOIN dog ON deposit.dog_id = dog.dog_id WHERE dep_id = '$dep_id' ";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($query)) {

              ?>
                <form id="updateForm">
                  <input type="hidden" name="dep_id" value="<?= $row['dep_id']; ?>" id="inputdepid">
                  <input type="hidden" name="dog_id" value="<?= $row['dog_id']; ?>" id="inputdogid">
                  <?php
                  if (!empty($row['image'])) {
                    echo '<div class="col-md-12">';
                    echo '<label for="inputdogsickness" class="form-label">รูปภาพสุนัข</label>';
                    echo '<div class="col-md-6">';
                    echo '<img style="width: 350px; height: 400px;" src="../api/dog/uploads/' . $row["image"] . '">';
                    echo '</div>';
                  } else {
                    echo '<div class="col-md-12">';
                    echo '<h3 style="color: red; margin-top: 3%; margin-left: 2%;">"ผู้ใช้ท่านนี้ยังไม่มีการเพิ่มรูปสุนัข"</h3>';
                    echo '<div class="col-md-6">';
                    echo '</div>';
                  }
                  ?>
                  <!-- <div class="col-md-12">
                    <label for="inputdogsickness" class="form-label">รูปภาพสุนัข</label>
                    <div class="col-md-6">
                      <img class="w-50" src="../api/dog/uploads/<?= $row['image']; ?>" alt="">
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <label for="inputdogname" class="form-label">ชื่อสุนัข :</label>
                    <input name="dog_name" value="<?= $row['dog_name']; ?>" type="text" class="form-control" id="inputdogname" placeholder="ชื่อสุนัข" disabled>
                  </div>
                  <div class="col-md-12">
                    <label for="inputdogtype" class="form-label">พันธุ์สุนัข :</label>
                    <select name="dog_type" id="" class="form-control" disabled>
                      <option value="<?= $row['dog_type']; ?>"><?= $row['dog_type']; ?></option>
                      <?php
                      $sql2 = "SELECT * FROM dog_breed";
                      $query2 = mysqli_query($conn, $sql2);
                      while ($row2 = mysqli_fetch_array($query2)) {
                      ?>
                        <option value="<?php echo $row2["dogbreed_name"]; ?>"><?php echo $row2["dogbreed_name"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <!-- <input name="dog_type" value="<?= $row['dog_type']; ?>" type="text" class="form-control" id="inputdogtype" placeholder="พันธุ์สุนัข" required> -->
                  </div>
                  <div class="col-md-12">
                    <label for="inputdogweight" class="form-label">น้ำหนักสุนัข (กิโลกรัม) : </label>
                    <select name="dog_weight" class="form-control" id="" disabled>
                      <option value="<?= $row['dog_weight']; ?>"><?= $row['dog_weight']; ?></option>
                      <?php

                      for ($i = 1; $i <= 100; $i++) {
                      ?>

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <!-- <input name="dog_weight" value="<?= $row['dog_weight']; ?>" type="text" class="form-control" id="inputdogweight" placeholder="น้ำหนักสุนัข" required> -->
                  </div>
                  <div class="col-md-12">
                    <label for="" class="col-form-label">อายุสุนัข (ปี) : </label>
                    <select name="dog_age" class="form-control" id="" disabled>
                      <option value="<?= $row['dog_age']; ?>"><?= $row['dog_age']; ?></option>
                      <?php

                      for ($i = 1; $i <= 50; $i++) {
                      ?>

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php
                      }
                      ?>
                    </select>

                  </div>
                  <div class="col-md-12">
                    <label for="inputdogsickness" class="form-label">โรคประจำตัว,อาหารที่แพ้ :</label>
                    <input name="dog_sickness" value="<?= $row['dog_sickness']; ?>" type="text" class="form-control" id="inputdogsickness" disabled>
                    <hr>
                  </div>

                  <div class="col-md-12">
                    <label for="inputdogsickness" class="form-label">บันทึกการติดตามสุนัขครั้งก่อน :</label>
                  </div>
                  <div class="col-md-12" style="margin-bottom: 1%;">
                    <input value="<?= $row['deprec_topic']; ?>" type="text" class="form-control" id="inputdogname" disabled>
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" style="padding-left: 1%;" type="text" id="exampleFormControlTextarea1" rows="3" name="deprec_detail_show" disabled><?= $row['deprec_detail']; ?></textarea>
                    <hr>
                  </div>


                  <!-- ส่งข้อมูลอัพเดทการติดตาม -->
                  <div class="col-md-12">
                    <label for="inputdogsickness" class="form-label">กรอกบันทึกการติดตามสุนัขครั้งนี้ :</label>
                  </div>
                  <div class="col-md-12">
                    <div class="radio">
                      <label class="radio-inline ml-3"><input type="radio" value="deprec_weird" name="pref" checked> สุนัขมีอาการผิดปกติ </label>
                      <label class="radio-inline ml-5"><input type="radio" value="deprec_normal" name="pref"> สุนัขปกติดี </label>
                    </div>

                    <div class="col-md-4 ml-4">
                      <input type="checkbox" name="deprec_topic[]" value="กินน้ำเยอะ">
                      <label for="deprec_topic1"> กินน้ำเยอะ</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="หายใจเร็วผิดปกติ">
                      <label for="deprec_topic2"> หายใจเร็วผิดปกติ</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="มีอาการท้องเสีย">
                      <label for="deprec_topic3"> มีอาการท้องเสีย</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="อาเจียนบ่อย">
                      <label for="deprec_topic4"> อาเจียนบ่อย</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="มีอาการไอเรื้อรัง">
                      <label for="deprec_topic5"> มีอาการไอเรื้อรัง</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="มีอาการซึมเศร้า">
                      <label for="deprec_topic6"> มีอาการซึมเศร้า</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="ไม่ยอมกินข้าว">
                      <label for="deprec_topic7"> ไม่ยอมกินข้าว</label><br>
                      <input type="checkbox" name="deprec_topic[]" value="น้ำหนักลดลง">
                      <label for="deprec_topic8"> น้ำหนักลดลง</label><br>
                    </div>
                  </div>






                  <!-- <div class="form-check">
                      <input class="form-check-input" type="radio" name="deprec_topic1" id="flexRadioDefault1" value="อัพเดทสถานะสุนัข" checked>
                      <label style="margin-left: -2%;" class="form-check-label" for="flexRadioDefault1">
                        อัพเดทสถานะสุนัข
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="deprec_topic2" id="flexRadioDefault2" value="สุนัขมีความผิดปกติ">
                      <label class="form-check-label" style="margin-left: -2%;" for="flexRadioDefault2">
                        สุนัขมีความผิดปกติ
                      </label>
                    </div> -->
            </div>


            <div class="col-md-12">
              <label for="inputdogsickness" class="form-label">หมายเหตุ</label>
            </div>
            <div class="col-md-12">
              <textarea class="form-control" style="padding-left: 1%;" id="exampleFormControlTextarea1" rows="3" name="deprec_detail"></textarea>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btn-lg" style="font-family: Kanit Light; font-size: 18px;">บันทึก</button>
            </div>
            </form>
          <?php } ?>
          <?php include 'layout/footer.php'; ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script>
            $("#updateForm").submit(function(e) {
              e.preventDefault()
              var formData = $(this).serialize()
              $.post('../api/record/dep_record.php', formData, function(data) {
                if (data.success) {
                  swal("แจ้งเตือน", "อัปเดตบันทึกการติดตามสุนัขครั้งล่าสุดสำเร็จ", "success").then(function() {
                    window.location = "dep_record.php";
                  })
                } else {
                  swal("แจ้งเตือน", "ไม่สำเร็จ!", "error")
                }
              }, 'json')
            })
          </script>
</body>

</html>