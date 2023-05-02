<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require("../config.php");

if(isset($_POST["submit"]) && !empty($_POST["email"])){
  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $email = $_POST["email"];
  
  $parts = explode("@",$email );
  $username = $parts[0];
  
  $phone = $_POST["phone"];
  $jobtitle =$_POST["jobtitle"];
  
  $password = $_POST["password"];
  $hash= password_hash($password , PASSWORD_DEFAULT);
  // $passwordConfirmation = $_POST["passwordconfirmation"];
  $gender=  $_POST["flexRadioDefault"];
  $filetoupload = $_FILES["image"];
  
// Image
  move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" .$_FILES["image"]["name"]);
  $image =$_FILES["image"]["name"];

// Check Username
  $checkuid = mysqli_query($conn, "SELECT * FROM employee_record where username = '$username' OR email = '$email'");
  $row= mysqli_fetch_assoc($checkuid);

// Insert Database
  if($row == null){
    $sql = "INSERT INTO `employee_record` (first_name, last_name, username, email, phone, jobtitle, password, gender, image)
            VALUES('$fname', '$lname', '$username', '$email', $phone, $jobtitle, '$hash', '$gender', '$image')";
    $result= mysqli_query($conn, $sql);
    $sql_sine_in = "INSERT INTO `sign_up`(username, email, password) VALUES('$username', '$email', '$hash')"; 
    $result_sine_in = mysqli_query($conn, $sql_sine_in);

  echo "<script>alert('Sucessfully Account Created')</script>";
}
else{
  echo "<script>alert('Email/Username already exists')</script>";
}
}


















?>
