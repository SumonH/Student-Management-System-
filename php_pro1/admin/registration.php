
<?php
require_once'./dbcon.php';
session_start();

 if(isset($_POST ['registration'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $c_password = $_POST['c_password'];
   $photo = $_FILES['photo']['name'];

  $photo = explode('.', $_FILES['photo']['name']);
  $photo = end($photo);
  $photo_name = $username .'.'.$photo;


  $input_error = array();


if(empty($name)){
  $input_error['name']= "The Name field is required";
}

if(empty($email)){
  $input_error['email']= "The Email field is required";
}
if(empty($username)){
  $input_error['username']= "The Username field is required";
}
if(empty($password)){
  $input_error['password']= "The Password field is required";
}
if(empty($c_password)){
  $input_error['c_password']= "The C_Password field is required";
}
if (count($input_error) == 0) {
  $email_chack = mysqli_query($linnk,"SELECT * FROM `users` WHERE `email` = '$email';");

  if (mysqli_num_rows($email_chack) == 0) {
  $username_chack = mysqli_query($linnk,"SELECT * FROM `users` WHERE `username` = '$username';");
  if (mysqli_num_rows($username_chack) == 0) {



     if (strlen($username)>7) {
      if (strlen($password)>7) {

          if ($password==$c_password) {


            $password = md5($password);



              $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";

              $result = mysqli_query($linnk,$query);
              if ($result) {
                $_SESSION['data_insert_success'] = "Data Insert Success!";
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                header('location: registration.php');

              }else {
                $_SESSION['data_insert_error'] = "Data Insert Error!";
              }




          }else {
            $password_not_match = "Conform Password Not Match";
          }

      }else {
       $password_l = "Password More  Than 8 Characters";
      }
     }else {
     $username_l = "Username More  Than 8 Characters";
     }





}else{

$username_error = "This Username Already Exists";
}
  }else {
  $email_error = "This Email Address Allredy Exists";
  }

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
<body>
  <div class="container">
    <h1>User Registration Form</h1>

    <?php if (isset($_SESSION['data_insert_success'])) {
      echo   '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';
    } ?>



    <?php if (isset($_SESSION['data_insert_error'])) {
      echo   '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';
    } ?>


    <hr>
    <div class="row">
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <label for="name" class="control-label col-sm-1">Name</label>
              <div class="col-sm-4">
                <input class="form-control"id="name" type="text" name="name" placeholder="Enter Your Name" value=" <?php if (isset($name)) {echo $name;} ?>" />

                <label class="error"> <?php if (isset($input_error['name'])) {echo $input_error['name'];} ?> </label>

              </div>
          </div>

          <div class="form-group">
            <label for="email" class="control-label col-sm-1">Email</label>
              <div class="col-sm-4">
                <input class="form-control"id="email" type="text" name="email" placeholder="Enter Your Email" value=" <?php if (isset($email)) {echo $email;} ?>"/>

                <label class="error"> <?php if (isset($input_error['email'])) {echo $input_error['email'];} ?> </label>

                  <label class="error"> <?php if (isset($email_error)) {echo $email_error;} ?> </label>

              </div>
          </div>
          <div class="form-group">
            <label for="username" class="control-label col-sm-1">Username</label>
              <div class="col-sm-4">
                <input class="form-control"id="username" type="text" name="username" placeholder="Enter Your Username"  value=" <?php if(isset($username)){echo $username;} ?>"/>

                <label class="error"> <?php if (isset($input_error['username'])) {echo $input_error['username'];} ?> </label>



                <label class="error"> <?php if (isset($username_error)) {echo $username_error;} ?> </label>


                  <label class="error"> <?php if (isset($username_l)) {echo $username_l;} ?> </label>

              </div>
          </div>
          <div class="form-group">
            <label for="password" class="control-label col-sm-1">Password</label>
              <div class="col-sm-4">
                <input class="form-control"id="password" type="text" name="password" placeholder="Enter Your Password" value=" <?php if (isset($password)) {echo $password;} ?>" />

                <label class="error"> <?php if (isset($input_error['password'])) {echo $input_error['password'];} ?> </label>



                  <label class="error"> <?php if (isset($password_l)) {echo $password_l;} ?> </label>

              </div>
          </div>

          <div class="form-group">
            <label for="c_password" class="control-label col-sm-1">Conform Password</label>
              <div class="col-sm-4">
                <input class="form-control"id="c_password" type="text" name="c_password" placeholder="Enter Your Conform Password"  value=" <?php if (isset($c_password)) {echo $c_password;} ?>"/>


                <label class="error"> <?php if (isset($input_error['c_password'])) {echo $input_error['c_password'];} ?> </label>




                  <label class="error"> <?php if (isset($password_not_match)) {echo $password_not_match;} ?> </label>





              </div>
          </div>

          <div class="form-group">
            <label for="photo" class="control-label col-sm-1">Photo</label>
              <div class="col-sm-4">
                <input id="photo" type="file" name="photo" />

              </div>
          </div>

          <div class="col-sm-4 offset-sm-1">
            <input type="submit" name="registration" value="Registration" class="btn btn-primary">

          </div>

        </form>
        <p>if you have account? then place <a href="login.php">Login</a> </p>
        <hr>

        <footer>
          <p>Copyright &copy;2k18- <?= date('Y')?> All Rights Reserved</p>
        </footer>
      </div>

    </div>

  </div>

  </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
