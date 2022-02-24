<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "พาร์สเวิร์ดไม่ตรงกัน !");
        $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน!";
    }

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email ='$email' ";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] === $username) {
            array_push($errors, "Username ถูกใช้แล้ว!");
        }
        if ($result['email'] === $email) {
            array_push($errors, "Email ถูกใช้แล้ว!");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $sql = "INSERT INTO user (username, email, password) VALUES('$username','$email','$password')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        echo "<script>";
        echo "alert(\"สมัครสมาชิกเสร็จสิ้น!\");";
        echo "window.location=\"../login.php\"";
        echo "</script>";
    } else {
        array_push($errors, "มีชื่อผู้ใช้ / อีเมล์อยู่แล้ว!");
        $_SESSION['error'] = "มีชื่อผู้ใช้ / อีเมล์อยู่แล้ว!";
        header("location: ../register.php");
    }
}
