<?php
require_once'./dbcon.php';
session_start();

if(isset($_SESSION['user_login'])) {
  header('location: index.php');
}


if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $username_chack = mysqli_query ($linnk, "SELECT * FROM `users` WHERE `username` ='$username'");

  if (mysqli_num_rows($username_chack)>0) {
    $row = mysqli_fetch_assoc($username_chack);

    if ($row['password'] == md5($password)) {
        if ($row['status'] == 'active') {


            $_SESSION['user_login'] = $username;


        header('location: index.php');
        }else {
      $status_inactive = "your status inactive";
        }
    }else {

      $wrong_password = "This password wrong";
      }

  }else {
   $username_not_found = "This Username not Found";
  }
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
  <link rel="stylesheet" href="../css/animate.css">
  <title>Students Management System</title>
</head>
<body style="background: #f5f5f5">

  <div class="col-lg-12 text-center">
    <h1 class=" text-center">Students Management System</h1>
  </div>
  <div class="container ">

    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">



        <form name="form1" class="animated shake" action="login.php" method="POST">
          <h2 class="text-center">Admin Login Form</h2>

          <div class="text-center">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""  value=" <?php if (isset($username)) {
            echo $username;
            } ?> "/>

          </div>

          <div>
            <input type="password" name="password" class="form-control" placeholder="password" required=""  value=" <?php if (isset($password)) {
            echo $password;
            } ?> "/>

          </div>

          <div>
            <input type="submit" value="Login" name="login" class="btn btn-info pull-right"/>

          </div> <a href="../">Back</a>

        </form>


      </div>

    </div>
    <br>
    <?php if (isset($username_not_found)) {
      echo '<div class="alert alert-danger col-sm-4 offset-sm-4"> '.$username_not_found.'</div>';
    } ?>

    <?php if (isset($wrong_password)) {
      echo '<div class="alert alert-danger col-sm-4 offset-sm-4"> '.$wrong_password.'</div>';
    } ?>

    <?php if (isset($status_inactive)) {
      echo '<div class="alert alert-danger col-sm-4 offset-sm-4"> '.$status_inactive.'</div>';
    } ?>





  </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
