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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/navbar-fixed.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Students Management System</title>
</head>
<body>
  <div class="container">
    <br>
    <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
    <br>
    <br>
    <h1 class="text-center">Welcome to Students Management System</h1>
    <br>
    <br>


    <div class="row">
      <div class="col-sm-4 col-md-offset-4">
        <form action="" method="POST">
            <table class="table table-bordered">
              <tr>
                <td colspan="2" class="text-center"> <label>Student Information</label> </td>
              </tr>

              <tr>
                <td><label for="choose">Choose Class</label></td>
                <td>
                  <select class="form-control" id="choose" name="choose">
                    <option value=""> Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>

                  </select>
                </td>
              </tr>

              <tr>
                <td><label for="roll">Roll</label> </td>
                <td> <input class="form-control" type="text" name="roll" pattern="[0-9]{6}"/> </td>
              </tr>

              <tr>

                <td colspan="2" class="text-center"><input class="btn btn-defailt " type="submit" name="show_info" value="show info"> </td>
              </tr>
            </table>
        </form>

      </div>
    </div>

    <br><br>


    <?php
    require_once './admin/dbcon.php';
    if (isset($_POST['show_info'])) {

      $choose = $_POST['choose'];
      $roll = $_POST['roll'];

        $result =  mysqli_query($linnk, "SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll';");


        if (mysqli_num_rows($result)==1) {

          $row = mysqli_fetch_assoc($result);



          ?>

          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <table class="table table-bordered">
                <tr>
                  <td rowspan="4">
                    <img style="width:150px" src="admin/student_img/<?= $row ['photo'] ?>  " class="img-thumbnail" alt="">
                  </td>
                  <td>Name</td>
                  <td><?= ucwords($row['name'])  ?></td>
                </tr>
                <tr>

                  <td>Roll</td>
                  <td><?=$row['roll']  ?></td>
                </tr>
                <tr>

                  <td>Class</td>
                  <td><?=$row['class']  ?></td>
                </tr>
                <tr>

                  <td>City</td>
                  <td><?= ucwords($row['city'])  ?></td>
                </tr>


              </table>

            </div>
          </div>
          <?php
        }else {


      ?>

      <script type="text/javascript">

      alert('Data Not Found')

      </script>

      <?php
        }


    }




     ?>







  </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
