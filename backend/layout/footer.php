<footer class="footer footer-black  footer-white ">
  <div class="container-fluid">
    <div class="row">

    </div>
</footer>
</div>
</div>

<!-- ADD STORE MODAL -->
<div class="modal fade" id="addstore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โปรดกรอกข้อมูลร้าน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../api/store/addstore.php">
          <div class="form-group">
            <label for="" class="col-form-label">ชื่อ : </label>
            <input type="text" class="form-control" name="store_name" id="inputstore_name" placeholder="กรอกชื่อร้าน" required>

          </div>
          <div class="form-group">
            <label for="" class="col-form-label">ที่อยู่ : </label>
            <textarea class="form-control" name="store_add" id="inputstore_add" placeholder="กรอกที่ตั้ง" required></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ยกเลิก</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ADD SERVICE MODAL -->
<div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โปรดกรอกข้อมูลบริการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addService">
          <div class="form-group">
            <label for="" class="col-form-label">ชื่อบริการ : </label>
            <input type="text" class="form-control" name="service_name" id="inputservice_name" placeholder="กรอกบริการที่ต้องการเพิ่ม" required>

          </div>
          <div class="form-group">
            <label for="" class="col-form-label">ราคา : </label>
            <input type="text" class="form-control" name="service_price" id="inputservice_price" placeholder="ราคา(บาท)" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ยกเลิก</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ADD ROOM MODAL -->
<div class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โปรดกรอกข้อมูลห้องพัก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addRoom">
          <div class="form-group">
            <label for="" class="col-form-label">ประเภทห้องพัก : </label>
            <input type="text" class="form-control" name="room_type" id="inputroom_type" placeholder="กรอกประเภทห้องที่ต้องการเพิ่ม" required>

          </div>
          <div class="form-group">
            <label for="" class="col-form-label">จำนวนห้อง : </label>
            <select name="room_quantity" class="form-control" id="">
              <option value="0">0</option>
              <?php

              for ($i = 1; $i <= 20; $i++) {
              ?>

                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">ราคาห้อง : </label>
            <input type="text" class="form-control" name="room_price" id="inputroom_price" placeholder="ราคาห้อง(บาท)" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ยกเลิก</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ADD DOG MODAL -->
<div class="modal fade" id="adddog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โปรดกรอกข้อมูลสุนัข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../api/dog/adddog.php">
          <div class="form-group">
            <label for="" class="col-form-label">ชื่อสุนัข : </label>
            <input type="text" class="form-control" name="dog_name" id="inputdog_name" placeholder="กรอกชื่อสุนัข" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">พันธุ์สุนัข : </label>
            <select name="dog_type" id="" class="form-control">
              <option value="">เลือกพันธุ์</option>
              <?php
              $sql = "SELECT * FROM dog_breed";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row["dogbreed_name"]; ?>"><?php echo $row["dogbreed_name"]; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">น้ำหนักสุนัข (กิโลกรัม) : </label>
            <select name="dog_weight" class="form-control" id="">
              <option value="0">0</option>
              <?php

              for ($i = 1; $i <= 100; $i++) {
              ?>

                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">อายุสุนัข (ปี) : </label>
            <select name="dog_age" class="form-control" id="">
              <option value="0">0</option>
              <?php

              for ($i = 1; $i <= 50; $i++) {
              ?>

                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">โรคประจำตัว,อาหารที่แพ้ (หากมี) : </label>
            <input type="text" class="form-control" name="dog_sickness" id="inputdog_sickness" placeholder="โรคประจำตัว,อาหารที่แพ้">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ยกเลิก</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });

  $("input[name=pref]").on("change", function() {
    if (this.value === "deprec_weird") {
      $("input[type=checkbox]").removeAttr("disabled");

    } else if (this.value === "deprec_normal") {
      $("input[type=checkbox]").attr("disabled", true);

    }
  })

  $("input[name=pref2]").on("change", function() {
    if (this.value === "usrec_weird") {
      $("input[type=checkbox]").removeAttr("disabled");

    } else if (this.value === "usrec_normal") {
      $("input[type=checkbox]").attr("disabled", true);

    }
  })
</script>