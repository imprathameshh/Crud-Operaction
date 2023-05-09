<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include("../config.php");

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $currentpass = $_POST["currentpass"];
  $newpass = $_POST["newpass"];
  $confirmpass = $_POST["confirmpass"];


  if ($email) {
      $query = "SELECT `username`, `email`, `password` FROM `employee_record` WHERE `username` = '$email' OR `email`='$email'";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $hashed_password = $row['password'];

          if (password_verify($currentpass,$hashed_password)) {
              if ($newpass == $confirmpass) {
                  $new_hashed_password = password_hash($newpass, PASSWORD_DEFAULT);
                  $update_query = "UPDATE `employee_record` SET `password` = '$new_hashed_password' WHERE `email` = '$email' OR `username` = '$email' ";
                  $update_result = mysqli_query($conn, $update_query);

                  if ($update_result) {
                      echo "<script>if(!alert('Password Successfully Updated.')){document.location.href='index.php'};</script>";
                  } else {
                      die(mysqli_error($conn));
                  }
              } else {
                  echo "<script>alert('Password doesn\'t match')</script>";
              }
          } else {
              echo "<script>alert('Current password is incorrect')</script>";
          }
      } else {
          echo "<script>alert('Email Not Found')</script>";
      }
  }

}




?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Girish Sir Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css" />
  <link rel="stylesheet" href="includes/media.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <div class="login-wrap">
    <section class="login-block">
      <div class="container">
        <div class="row">
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
              </div>
            </div> 
          </div>
          <div class="col-md-4 login-sec ">
            <h2 class="text-center">Forget Password</h2>
            <form class="login-form" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1" class="text-uppercase pb-2">User Id</label>
                <input type="text" name="email" class="form-control" placeholder="">
              </div><br>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase pb-2">Current Password</label>
                <input type="password" name="currentpass" class="form-control" placeholder=""> 
              </div><br>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase pb-2">New Password</label>
                <input type="password" name="newpass" class="form-control" placeholder=""> 
              </div><br>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase pb-2">Confirm Password</label>
                <input type="password" name="confirmpass" class="form-control" placeholder=""> 
              </div><br>

          

              <div class="form-group mt-3 login-btn">
                <button type="submit" name="submit" class="btn btn-login width100">Reset Password</button>
              </div>
            </form>
            <div class="pt-3">
              <p>Don't have an account? <a href="registraction-form.php">Register Here</a></p>
            </div>
          </div>
        </div>
    </section>
  </div>
</body>
</html>
