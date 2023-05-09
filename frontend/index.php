<!DOCTYPE html>
<html lang="en">
<?php
include("../config.php");

//Logging Page
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();

$username = $password ="";
$username_err= $password_err = "";
if(isset($_POST["submit"])){
  if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM employee_record WHERE username = '$username' or email = '$username'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($row != NULL){
    $_SESSION['id'] = $row['id'];
    //  $_SESSION["login"] = $row["login"];
    $_SESSION["jobtitle"] = $row["jobtitle"];
    (password_verify($password, $row["password"]));
     if(password_verify($password, $row["password"])){
      header("location: ../admin/index.php");
      echo "success";
      // echo "<script>alert('Invalid Username and Password'); window.location:'../admin/index.php'</script>";
     }
     else{
      echo "<script>alert('Invalid Username and Password'); window.location:'login.php'</script>";
     }
    }
    else{
      echo "<script>alert('Invalid and Password'); window.location:'login.php'</script>";
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
          <div class="col-md-4 login-sec">
            <h2 class="text-center">Muskan</h2>
            <form class="login-form" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1" class="text-uppercase pb-2">User Id</label>
                <input type="text" name="username" class="form-control" placeholder=""> <span><?php echo $username_err ?> </span>
              </div><br>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase pb-2">Password</label>
                <input type="password" name="password" class="form-control" placeholder=""> <span><?php echo $password_err ?> </span>
              </div><br>

              <div class="forgot-password">
                <a class="link-toggler" href="./forgetpassword.php">Forgot password?</a>
              </div>

              <div class="form-group mt-3 login-btn">
                <button type="submit" name="submit" class="btn btn-login width100">Login</button>
              </div>
            </form>
            <div class="pt-3">
              <p>Don't have an account? <a href="registraction-form.php">Register Here</a></p>
            </div>
            <!-- <div class="copy-text">Created by Endoxa</div> -->
          </div>
          <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
</body>
</html>
