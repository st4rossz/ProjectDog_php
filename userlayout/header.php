<?php
session_start();
include 'api/server.php'
// if (!isset($_SESSION['username'])){
//     $_SESSION['msg'] = "You must log in first";
//     header('location: ../login.php');
// }

// if($_SESSION['status'] != 2){
//     echo "<script>";
//     echo "alert(\"คุณไม่ใช่ Admin!!\");";
//     echo "window.location=\"../login.php\"";
//     echo "</script>";
// }

// if (isset($_GET['logout'])){
//     session_destroy();
//     unset($_SESSION['username']);
//     header('location: ../login.php'); 
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    User
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="backend/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="backend/assets/demo/demo.css" rel="stylesheet" />
  <link href="css/bg.css" rel="stylesheet" />

  <!-- style.css.bg -->
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bg {
      /* The image used */
      background-image: url("images/testbg2.jpg");

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

      opacity: 1;
    }

    .numberCircle {
      font-family: Kanit extralight;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      text-align: center;
      font-size: 24px;
      border: 3px solid black;
      color: white;
      background: black;
      position: absolute;
      top: -30px;
      left: 50%;
      transform: translateX(-50%);
      /* box-shadow: 0px 0px 10px black; */
    }
  </style>
</head>