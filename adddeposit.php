<?php
include('userlayout/header.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$user_id = $_SESSION['user_id'];

?>

<body class="">
    <?php include('userlayout/nav.php') ?>
    <div class="container-fluid bg-warning">
        <div class="row" style="padding-top: 25px;">
            <div class="col-12 text-center">
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

    <?php include('userlayout/footer.php') ?>
</body>

</html>