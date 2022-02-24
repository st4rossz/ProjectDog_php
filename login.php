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
  <title>ล็อคอิน</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="header">
    <h3>เข้าสู่ระบบ</h3>
  </div>
  <form method="post" action="api/login_db.php">
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
      <label for="username" class="col-form-label">ชื่อผู้ใช้งาน : </label>
      <input type="text" class="form-control" name="username" placeholder="โปรดกรอกชื่อผู้ใช้เพื่อเข้าสู่ระบบ" required>
    </div>
    <div>
      <label for="usernmae" class="col-form-label">รหัสผ่าน : </label>
      <input type="password" class="form-control" name="password" placeholder="กรอกรหัสผ่านเพื่อเข้าสู่ระบบ" required>
    </div>
    <div>
      <button type="submit" name="login_user" class="btn">ล็อคอิน</button>
    </div>
    <div class="row">
      <div class="col-md-6 text-center">
       <p>ยังไม่เป็นสมาชิก?<a href="register.php">สมัครเลย</a></p>
      </div>
      <div class="col-md-6 text-center">
         <a href="index.php">Homepage</a></p>
      </div>
    </div>

  </form>

  <!-- <div class="header">
    <h2>Login</h2>
  </div>

  <form method="post" action="api/login_db.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="กรอก Username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="กรอก Password">
    </div>
    <button type="submit" name="login_user" class="btn btn-primary">เข้าสู่ระบบ</button>
    <p>ยังไม่ได้เป็นสมาชิก?<a href="register.php">register</a></p>
  </form>
</body> -->

</html>