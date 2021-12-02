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
              <h4 class="title">Member Approve</h4>
              <hr>
              <!-- <p class="category">Here is a subtitle for this table</p> -->
              <!-- </div> -->
              <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM user WHERE status=0";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <th scope="row"> <?= $row["id"] ?> </th>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["status"] ?></td>
                        <td><a class="btn btn-primary btn-lg" href="../api/_updatestatus.php?userid=<?= $row["id"] ?>">ยืนยัน</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
              <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title">Email Statistics</h5>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-body ">
                  <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                  <div class="legend">
                    <i class="fa fa-circle text-primary"></i> Opened
                    <i class="fa fa-circle text-warning"></i> Read
                    <i class="fa fa-circle text-danger"></i> Deleted
                    <i class="fa fa-circle text-gray"></i> Unopened
                  </div>
                  <hr>
                  <div class="stats">
                    <i class="fa fa-calendar"></i> Number of emails sent
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-title">NASDAQ: AAPL</h5>
                  <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                  <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                  <div class="chart-legend">
                    <i class="fa fa-circle text-info"></i> Tesla Model S
                    <i class="fa fa-circle text-warning"></i> BMW 5 Series
                  </div>
                  <hr />
                  <div class="card-stats">
                    <i class="fa fa-check"></i> Data information certified
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <?php
        include 'layout/footer.php';
        ?>
</body>

</html>