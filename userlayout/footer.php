<footer class="bg-dark text-center text-white" style="font-family: Kanit Thin; display: block;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <p>Contact Us :</p>
      <hr>
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/GoodDogHome/" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://gooddoghome.business.site/" role="button"><i class="fab fa-google"></i></a>

      <p style="font-size: 16px;">Tel : 084 974 4978</p>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

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
            <select name="dog_type" class="form-control" id="" required>
              <option value="">เลือกพันธุ์สุนัขของท่าน</option>
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
            <!-- <input type="text" class="form-control" name="dog_type" id="inputdog_type" placeholder="พันธุ์สุนัข" required> -->
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
            <!-- <input type="text" class="form-control" name="dog_weight" id="inputdog_weight" placeholder="กิโลกรัม" required> -->
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">อายุสุนัข (ปี) : </label>
            <select name="dog_age" class="form-control" id="" required>
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
            <label for="" class="col-form-label">โรคประจำตัว,อาหารที่แพ้ : </label>
            <input type="text" class="form-control" name="dog_sickness" id="inputdog_sickness" placeholder="โรคประจำตัว,อาหารที่แพ้">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-lg">เพิ่มสุนัข</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- USE DEPOSIT MODAL PROCESS_5 -->
<!-- <div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form method="post" action="api/deposit.php">
            <?php include 'api/errors.php' ?>
            <?php if (isset($_SESSION['error'])) : ?>
              <div class="error">
                <h3>
                  <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
              </div>
            <?php endif ?>
            <div class="form-group">
              <label for="" class="col-form-label">สุนัขของท่าน : </label>
              <select name="dog_id" class="form-control" id="" required>
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
            <button type="submit" name="bookdeposit" class="btn btn-primary btn-lg">ยืนยันการใช้บริการ</button>
          </form>
      </div>
    </div>
  </div>

</div>
<div class="modal-footer"> -->
<!-- <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">ปิด</button> -->
<!-- <button type="submit" name="bookdeposit" class="btn btn-primary btn-lg">ยืนยันการใช้บริการ</button>
  <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
  <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
</div>
</form>
</div>
</div>
</div> -->



<!-- Deposit -->
<div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บริการฝากเลี้ยงสุนัข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/deposit.php">
          <?php include 'api/errors.php' ?>
          <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
              <h3>
                <?php
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                  ?>
              </h3>
            </div>
          <?php endif ?>

          <?php
          $sql = "SELECT * FROM deposit";
          $query = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($query)) {
            ?>
            <input type="hidden" value="<?php echo $row["dep_id"]; ?>" name="dep_id" id='dep_id'>
          <?php } ?>
          <div class="form-group">
            <label for="" class="col-form-label">วันที่เริ่มเข้าพัก : </label>
            <input onchange="getData()" type="date" class="form-control" name="dep_sdate" id="dep_sdateid" placeholder="วันที่เริ่มเข้าพัก" required>
          </div>

          <div class="form-group">
            <label for="" class="col-form-label">วันที่สิ้นสุดการเข้าพัก : </label>
            <input onchange="getData()" type="date" class="form-control" name="dep_edate" id="dep_edateid" placeholder="วันที่สิ้นสุดการเข้าพัก" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" id="">
            <label for="" class="col-form-label">เลือกห้องพักสุนัข : </label>
            <select onchange="getData()" name="room_id" class="form-control" id="deproom_id" required>
              <option value="">เลือกประเภทห้อง</option>
              <?php
              $sql = "SELECT * FROM room";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["room_id"]; ?>"><?php echo $row["room_type"]; ?> ( <?php echo $row["room_price"]; ?> บาท/คืน )</option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" id="">
            <label for="" class="col-form-label">สุนัขของท่าน : </label>

            <select name="dog_id" class="form-control" id="" required>
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

          <!-- <div class="form-group">
            <label for="" class="col-form-label" id="">จำนวนห้องว่าง :</label>
            <label for="" class="col-md-2" id="">เล็ก :</label>
            <input type="text" class="col-md-2" name="" id="loadroom1" disabled>
            <label for="" class="col-md-2" id="">ใหญ่ :</label>
            <input type="text" class="col-md-2" name="" id="loadroom2" disabled>
            <label for="" class="col-md-2" id="">พิเศษ :</label>
            <input type="text" class="col-md-2" name="" id="loadroom3" disabled>
          </div> -->

          <div class="form-group">
            <label for="" class="col-form-label">จำนวนห้องว่าง : </label>
            <hr>
          </div>
          <div class="row g-3 align-items-center">
            <div class="col-md-2">
              <label for="" class="col-form-label" id="">เล็ก :</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" id="loadroom1" disabled>
            </div>
            <div class="col-md-2">
              <label for="" class="col-form-label" id="">ใหญ่ :</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" id="loadroom2" disabled>
            </div>
            <div class="col-md-2">
              <label for="" class="col-form-label" id="">พิเศษ :</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" id="loadroom3" disabled>
            </div>
          </div>
          <hr>

      </div>
      <div class="modal-footer">
        <button type="submit" name="bookdeposit" class="btn btn-primary btn-lg">ยืนยัน</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- UseService -->
<div class="modal fade" id="useservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บริการสปาร์สุนัข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/useservice.php">
          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" id="">

          <div class="form-group">
            <label for="" class="col-form-label">สุนัขของท่าน : </label>
            <select name="dog_id" class="form-control" id="">
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
            <select onchange="sendService(this.value)" name="service_id" class="form-control" id="" required>
              <option value="" selected disabled>เลือกบริการ</option>
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
            <label for="" class="col-form-label">ค่าบริการ :</label>
            <input type="text" class="form-control" name="show_price" id="us_price" disabled>
            <input type="hidden" class="form-control" name="price" id="us_price2">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">วันเข้าใช้บริการ : </label>
            <input type="date" class="form-control" name="us_date" id="us_date" placeholder="วันเข้าใช้บริการ" required>
          </div>
      </div>



      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
        <button type="reset" class="btn btn-dark btn-lg">ล้างค่า</button>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="aboutstore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดเพิ่มเติม</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">ปิด</button>
      </div>

    </div>
  </div>
</div>



<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<!-- SWITCH ALERT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
  $(function() {
    var today = new Date();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var year = today.getFullYear();
    var date = year + '-' + month + '-' + day;
    $('[id*=dep_sdateid]').attr('min', date);
  });

  $(function() {
    var today = new Date();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var year = today.getFullYear();
    var date = year + '-' + month + '-' + day;
    $('[id*=dep_edateid]').attr('min', date);
  });

  $(function() {
    var today = new Date();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var year = today.getFullYear();
    var date = year + '-' + month + '-' + day;
    $('[id*=us_date]').attr('min', date);
  });

  function sendService(id_service) {
    // console.log(id_service)
    $.post('api/service/priceload.php', {
      id_service: id_service
    }, function(data) {
      if (data.success) {
        document.getElementById("us_price").value = data.price
        document.getElementById("us_price2").value = data.price
      }
    }, 'json');
  }


  function getData() {
    var dep_sdateid = document.getElementById('dep_sdateid').value
    var dep_edateid = document.getElementById('dep_edateid').value
    var deproom_id = document.getElementById('deproom_id').value
    console.log(dep_sdateid, dep_edateid, deproom_id)
    $.post('api/roomload.php', {
      dep_sdateid: dep_sdateid,
      dep_edateid: dep_edateid,
      deproom_id: deproom_id
    }, function(data) {
      if (data.success) {
        console.log("ส่งข้อมูลได้")
        // document.getElementById("dep_roomshow").value = data.dc
        document.getElementById("loadroom1").value = data.cal1
        document.getElementById("loadroom2").value = data.cal2
        document.getElementById("loadroom3").value = data.cal3
      } else {
        console.log("ผิดพลาด")
      }
    }, 'json');
  }

  function gologin() {
    alert("โปรดล็อคอินก่อนเข้าใช้งาน");
    // window.location.href = 'userindex.php';
  }
</script>