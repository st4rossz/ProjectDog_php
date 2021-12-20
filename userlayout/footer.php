<footer class="footer footer-black  footer-white ">
  <div class="container-fluid">
    <div class="row">

    </div>
</footer>
</div>
</div>

<!-- ADD DOG MODAL FOR USER -->
<div class="modal fade" id="uadddog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โปรดกรอกข้อมูลสุนัข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/dog/uadddog.php">
          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" id="">
          <div class="form-group">
            <label for="" class="col-form-label">ชื่อสุนัข : </label>
            <input type="text" class="form-control" name="dog_name" id="inputdog_name" placeholder="กรอกชื่อสุนัข" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">พันธุ์สุนัข : </label>
            <input type="text" class="form-control" name="dog_type" id="inputdog_type" placeholder="พันธุ์สุนัข" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">น้ำหนักสุนัข : </label>
            <input type="text" class="form-control" name="dog_weight" id="inputdog_weight" placeholder="กิโลกรัม" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">อายุสุนัข : </label>
            <input type="text" class="form-control" name="dog_age" id="inputdog_age" placeholder="ปี" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">โรคประจำตัว,อาหารที่แพ้ : </label>
            <input type="text" class="form-control" name="dog_sickness" id="inputdog_sickness" placeholder="โรคประจำตัว,อาหารที่แพ้">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary btn-lg">เพิ่ม</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- USE DEPOSIT MODAL PROCESS_5 -->
<div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">จองห้องพักสุนัข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/deposit.php">
          <!-- <div class="form-group">
                        <label for="" class="col-form-label">บริการ : </label>
                        <input type="text" class="form-control" name="service_name" id="inputservice_name"
                            placeholder="กรอกบริการ" required>
          </div> -->
          <div class="form-group">
            <label for="" class="col-form-label">สุนัขของท่าน : </label>
            <select name="dog_id" class="form-control" id="">
              <option value="">เลือกสุนัขของท่าน</option>
              <?php
              $sql = "SELECT * FROM dog WHERE user_id = '$user_id'";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["dog_id"]; ?>"><?php echo $row["dog_name"]; ?> , [<?php echo $row["dog_id"]; ?>]</option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">วันที่เริ่มเข้าพัก : </label>
            <input type="date" class="form-control" name="dep_sdate" id="dep_sdate" placeholder="วันที่เริ่มเข้าพัก" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">วันที่สิ้นสุดการเข้าพัก : </label>
            <input type="date" class="form-control" name="dep_edate" id="dep_edate" placeholder="วันที่สิ้นสุดการเข้าพัก" required>
          </div>
          <!-- <button onclick="myFunction()">Try it</button>
                    <div id="myDIV">
                        This is my DIV element.
                    </div>
                    <script>
                    function myFunction() {
                        var x = document.getElementById("myDIV");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                    </script> -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">ปิด</button> -->
        <button type="submit" class="btn btn-primary btn-lg">ยืนยันการใช้บริการ</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- USE SERVICE MODAL PROCESS_5 -->
<div class="modal fade" id="useservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เลือกบริการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/useservice.php">
          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" id="">
          <div class="form-group">
            <label for="" class="col-form-label">สุนัขของท่าน : </label>
            <select name="dog_id" class="form-control" id="" >
              <option value="">เลือกสุนัขของท่าน</option>
              <?php
              $sql = "SELECT * FROM dog WHERE user_id = '$user_id'";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["dog_id"]; ?>"> <?php echo $row["dog_name"]; ?> , [<?php echo $row["dog_id"]; ?>] </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">เลือกบริการ : </label>
            <select name="service_id" class="form-control" id="" required>
              <option value="">เลือกบริการ</option>
              <?php
              $sql = "SELECT * FROM service";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["service_id"]; ?>"><?php echo $row["service_name"]; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">วันเข้าใช้บริการ : </label>
            <input type="date" class="form-control" name="us_date" id="us_date" placeholder="วันเข้าใช้บริการ" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-lg">เพิ่มบริการ</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!--   Core JS Files   -->
<script src="backend/assets/js/core/jquery.min.js"></script>
<script src="backend/assets/js/core/popper.min.js"></script>
<script src="backend/assets/js/core/bootstrap.min.js"></script>
<script src="backend/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="backend/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="backend/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="backend/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="backend/assets/demo/demo.js"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>