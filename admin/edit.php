<?php
//Get ID and Select Details and prin in Registration form
require_once("../config.php");

$id = $_GET["id"];
$sql = "SELECT * FROM employee_record WHERE id = '$id'";
$record = mysqli_query($conn, $sql );
$row = mysqli_fetch_array($record);
$oldimg = $row["image"];
$oldpwd = $row["password"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../frontend/includes/style-resgistraction.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<!-- Form Registration -->
  <body class="container">
    <div class="heading-sec">
      <h2 class="text-center pt-4">Edit User Registration</h2>
    </div>

    <div class="col-md-7 col-lg-6 ml-auto form-wrap">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">

          <!-- First Name -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md">
                <i class="fa fa-user text-muted"></i>
              </span>
            </div>
            <input id="firstName" type="text" name="first_name" placeholder="First Name"
              class="form-control bg-white border-left-0 " value="<?php echo $row["first_name"] ?>" require>
          </div>

          <!-- Last Name -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 ">
                <i class="fa fa-user text-muted"></i>
              </span>
            </div>
            <input id="lastName" type="text" name="last_name" placeholder="Last Name"
              class="form-control bg-white border-left-0 border-md" value="<?php echo $row["last_name"] ?>" require>
          </div>

          <!-- Email Address -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-envelope text-muted"></i>
              </span>
            </div>
            <input id="email" type="email" name="email" placeholder="Email Address"
              class="form-control bg-white border-left-0 border-md" value="<?php echo $row["email"] ?>" require>
          </div>

          <!-- Phone Number -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-phone-square text-muted"></i>
              </span>
            </div>
            <select id="countryCode" name="countryCode" style="max-width: 80px"
              class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
              <option value="">+91</option>
              <option value="">+12</option>
              <option value="">+15</option>
              <option value="">+18</option>
            </select>
            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number"
              class="form-control bg-white border-md border-left-0 pl-3" value="<?php echo $row["phone"] ?>" require>
          </div><br>

          <!-- Job -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa-solid fa-briefcase"></i> </span>
            </div>
            <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md" value="<?php echo $row["jobtitle"] ?>" require>
              <option value="-1" selected disabled>Choose your Department</option>
              <option value="1">Designer</option>
              <option value="2">Developer</option>
              <option value="3">Manager</option>
              <option value="4">Accountant</option>
            </select>
          </div>

          <!-- Password -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="password" type="password" name="password" placeholder="Password"
              class="form-control bg-white border-left-0 border-md" value="<?php echo $oldpwd ?>">
          </div>

          <!-- Password Confirmation -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password"
              class="form-control bg-white border-left-0 border-md">
          </div>

          <!-- Select File  -->
          <div class="d-flex pb-2 select-file">
            <img src="../images/<?php echo $row["image"]; ?>" alt="">
            <p> Select image to upload : </p> 
            <input type="file" name="image" id="fileToUpload" class="input-file" >
          </div>

          <!-- Submit Button -->
          <div class=" form-group col-lg-12 mx-auto mb-0 ">
            <input name="submit" type="submit" class="btn btn-primary btn-block py-2 btn-create-account "></input>
          </div>
        </div>
      </form>
    <?php  include("update.php") ?>
    </div>
    </div>
  </body>
</html>