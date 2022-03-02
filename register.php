<?php
session_start();
include('api/server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="">
    <div class="header">
        <h3>สมัครสมาชิก</h3>
    </div>
    <form method="post" action="api/register_db.php">
        <?php include('api/errors.php'); ?>
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
        <div>
            <label for="usernmae" class="col-form-label">ชื่อผู้ใช้งาน : </label>
            <input type="text" class="form-control" name="username" placeholder="โปรดกรอกชื่อผู้ใช้เพื่อเข้าสู่ระบบ" required>
        </div>
        <div>
            <label for="email" class="col-form-label">อีเมล์ : </label>
            <input type="email" class="form-control" name="email" placeholder="โปรดกรอกอีเมล์" required>
        </div>
        <div>
            <label for="password_1" class="col-form-label">รหัสผ่าน : </label>
            <input type="password" class="form-control" name="password_1" placeholder="โปรดกรอกรหัสผ่าน" required>
        </div>
        <div>
            <label for="password_2" class="col-form-label">ยืนยันรหัสผ่าน : </label>
            <input type="password" class="form-control" name="password_2" placeholder="กรอกรหัสผ่านอีกครั้ง" required>

        </div>
        <div>
            <button type="submit" name="reg_user" class="btn">สมัครสมาชิก</button>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <p>มีบัญชีแล้ว? <a href="login.php">ล็อคอิน</a>
                    <p>
            </div>
            <div class="col-md-6 text-center">
                <a href="index.php">Homepage</a>
            </div>
        </div>

    </form>
</body>

</html>