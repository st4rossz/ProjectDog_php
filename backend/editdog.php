<?php
include 'layout/header.php';
?>
<body class="">
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
              <h4 class="title">แก้ไขข้อมูลสุนัข </h4>
            <hr>
            <?php
            $dog_id = $_GET['dog_id'];
            $sql = "SELECT * FROM dog WHERE dog_id ='$dog_id' ";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($query)){

            ?>
            <form method="POST" action="../api/dog/editdogdb.php">
                    <input type="hidden" name="dog_id" value="<?= $row['dog_id']; ?>" id="inputdogid">
                    <div class="col-md-12">
                        <label for="inputdogname" class="form-label">ชื่อสุนัข</label>
                        <input name="dog_name" value="<?= $row['dog_name']; ?>" type="text" class="form-control" id="inputdogname" placeholder="ชื่อสุนัข" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputdogtype" class="form-label">พันธุ์สุนัข</label>
                        <input name="dog_type" value="<?= $row['dog_type']; ?>" type="text" class="form-control" id="inputdogtype" placeholder="พันธุ์สุนัข" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputdogweight" class="form-label">น้ำหนักสุนัข</label>
                        <input name="dog_weight" value="<?= $row['dog_weight']; ?>" type="text" class="form-control" id="inputdogweight" placeholder="น้ำหนักสุนัข" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputdogage" class="form-label">อายุ</label>
                        <input name="dog_age" value="<?= $row['dog_age']; ?>" type="text" class="form-control" id="inputdogage" placeholder="อายุ" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputdogsickness" class="form-label">โรคประจำตัว,อาหารที่แพ้</label>
                        <input name="dog_sickness" value="<?= $row['dog_sickness']; ?>" type="text" class="form-control" id="inputdogsickness" placeholder="กรอกโรคประจำตัว,อาหารที่แพ้" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
            </form>
            <?php } ?>
    <?php
        include 'layout/footer.php';
    ?>
</body>

</html>