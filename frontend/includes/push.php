<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require("../config.php");

if(isset($_POST["submit"]) && !empty($_POST["email"])){
  $error= [];
  // $email=''; 
  $fname = $_POST["first_name"];
  !empty($_POST['first_name'])? $fname = $_POST['first_name']: $error[] = 'First name not enter';
  !empty($_POST['last_name'])? $lname = $_POST['last_name']: $error[] = ' Last name not enter';
  !empty($_POST['email']) ? $email = $_POST['email']: $error[] = ' Email not enter';

  //username
  $parts = explode("@",$email );
  $username = $parts[0];
  
  !empty($_POST['phone'])? $phone = $_POST['phone']: $error[] = ' Phone no is not enter';
  !empty($_POST['jobtitle'])? $jobtitle = $_POST['jobtitle']: $error[] = " Job title not enter";

  !empty ($_POST["password"])? $password = $_POST['password']: $error[]="Password is not enter";
  $hash= password_hash($password, PASSWORD_DEFAULT);

  !empty ($_POST["passwordConfirmation"])? $cpassword = $_POST['passwordConfirmation']: $error[]=" Conform Password is not enter";


  $gender=  $_POST["flexRadioDefault"];

  $pgpic = $_FILES["image"]["name"];
    $extension = pathinfo($pgpic, PATHINFO_EXTENSION);
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif", ".heic");
    $image = $pgpic . '.' . $extension;
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

// Insert Database
if($password == $_POST["passwordConfirmation"]){
if($error == null){
  $checkuid = mysqli_query($conn, "SELECT * FROM employee_record where username = '$username' OR email = '$email'");
  $row= mysqli_fetch_assoc($checkuid);
  if($row == null){
    if($error == null){
    $sql = "INSERT INTO `employee_record` (first_name, last_name, username, email, phone, jobtitle, password, gender, image)
            VALUES('$fname', '$lname', '$username', '$email', '$phone', 
            '$jobtitle', '$hash', '$gender', '$image')";
    $result= mysqli_query($conn, $sql);
    echo "<script>alert('Sucessfully Account Created'); window.location='../index.php'</script>";
    }
    else{
      echo "<script>alert('Email/Username already exists')</script>";
    }
  }
}
    else{
      foreach($error as $error) {
        echo "<script>alert('$error')</script>";
      }
    }
  }
  else{
    echo "<script>alert('Plese enter both password correct')</script>";
  }
}

?>
