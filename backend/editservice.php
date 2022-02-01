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
      <div class="content" style="font-family: Kanit Thin;">
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
            while($row = mysqli_fetch_assoc($query)){

            ?>
            <form method="POST" action="../api/service/editservicedb.php">
                    <input type="hidden" name="service_id" value="<?= $row['service_id']; ?>" id="inputserviceid">
                    <div class="col-md-12">
                        <label for="inputservicename" class="form-label">ชื่อบริการ</label>
                        <input name="service_name" value="<?= $row['service_name']; ?>" type="text" class="form-control" id="inputservicename" placeholder="บริการ" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputserviceprice" class="form-label">ราคาบริการ</label>
                        <input name="service_price" value="<?= $row['service_price']; ?>" type="text" class="form-control" id="inputserviceadd" placeholder="ราคา" required>
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