<?php
    session_start();
    include('api/server.php');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="header">
       <h2>Register</h2>
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
       <div class="input-group">
           <label for="username">Username</label>
           <input type="text" name="username" placeholder="กรอก Username">
       </div>
       <div class="input-group">
           <label for="email">Email</label>
           <input type="email" name="email" placeholder="กรอก E-mail">
       </div>
       <div class="input-group">
           <label for="password_1">Password</label>
           <input type="password" name="password_1" placeholder="กรอก Password">
       </div>
       <div class="input-group">
           <label for="password_2">Confirm Password</label>
           <input type="password" name="password_2"placeholder="ยืนยัน Password">
       </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>มีบัญชีแล้ว? <a href="login.php">ล็อคอิน</a></p>
   </form>
</body>

</html>