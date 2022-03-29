<?php
session_start();
include('../api/server.php');
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
}

if ($_SESSION['status'] != 2) {
  echo "<script>";
  echo "alert(\"คุณไม่ใช่ Admin!!\");";
  echo "window.location=\"../login.php\"";
  echo "</script>";
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <script src="jquery-3.6.0.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="assets/demo/demo.css" rel="stylesheet" /> -->

  <style>
    * {
      margin: 0;
      padding: 0;
      user-select: none;
      box-sizing: border-box;
    }

    .bodyfont{
      font-family: Kanit Light;
      font-size: 17px;
    }

    .sidebar {
      position: fixed;
      height: 100%;
      left: 0;
    }

    .sidebar .text {
      color: black;
      font-size: 25px;
      font-family: Kanit thin;
      text-align: center;
      letter-spacing: 1px;
      padding-top: 5px;
      text-transform: uppercase;
      
    }

    nav ul {
      height: 100%;
      width: 100%;
      list-style: none;
    }

    nav ul li {
      line-height: 60px;
      /* border-bottom: 0.1rem solid #EE5A24; */
    }

    nav ul li a {
      position: relative;
      color: #EE5A24;
      text-decoration: none;
      font-size: 16px;
      padding-left: 20px;
      font-weight: 500;
      display: block;
      width: 100%;
      font-family: Kanit regular;
      
    }

    nav ul li a:hover {
      color: white;
      background: #f8c291;
      border-left-color: #eb2f06;
    }

    nav ul ul {
      position: static;

    }

    nav ul .base-show.show {
      position: static;
    }

    nav ul .serv-show.show1 {
      display: block;
    }

    nav ul ul li {
      line-height: 42px;
      border-bottom: none;
    }

    nav ul ul li a {
      font-size: 15px;
      color: #EE5A24;
      padding-left: 90px;
    }

    nav ul li a span {
      position: absolute;
      top: 30%;
      right: 10px;
      font-size: 12px;
      transition: transform 0.4s;
    }

    nav ul li a span.rotate {
      transform: translateY(-50%) rotate(-180deg);
    }
  </style>
</head>