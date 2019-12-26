<?php
session_start();

require_once './dbcon.php';

if(!isset($_SESSION['user_login'])) {
  header('location: login.php');
}

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="img/mlogo.png">
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
   integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/navbar-fixed.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">


  <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>





  <title>Students Management System</title>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SMS</a>

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li> <a href="logout.php"> <i class="fa fa-user"></i> Welcome: Sumon Hasan</a> </li>
        <li> <a href="registration.php"> <i class="fa fa-user-plus"></i> Add User</a> </li>
        <li> <a href="index.php?page=user-profile"> <i class="fa fa-user"></i> Profile</a> </li>
        <li> <a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a> </li>

      </ul>
    </div>

  </div>

</nav>


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <div class="list-group">
  <a href="index.php?page=dashboard" class="list-group-item active">

  <i class="fa fa-dashboard"></i> Dashboard
  </a>
  <a href="index.php?page=add-students" class="list-group-item"> <i class="fa fa-user-plus"></i> Add Studetns</a>

  <a href="index.php?page=all-students" class="list-group-item"> <i class="fa fa-users"></i> All Studetns</a>

  <a href="index.php?page=all-users" class="list-group-item"> <i class="fa fa-users"></i> All Users</a>

</div>
    </div>
    <div class="col-sm-9">
      <div class="content">




          <?php


          if(isset($_GET['page'])) {
            $page = $_GET['page'].'.php';
          }else {
            $page = "dashboard.php";
          }


          if(file_exists($page)) {
            require_once $page;
          }else {

            require_once '404.php';

          }

           ?>






      </div>
    </div>

  </div>

</div>



<footer class="footer-area">
  <p>Copyright &copy; 2018 Student Management System All Rights Are Reserved</p>
</footer>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>