<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require("../config.php");

if(isset($_POST["submit"]) && !empty($_POST["email"])){

  $fname = $_POST["first_name"];
  // echo !empty($_POST['first_name'])? $fname = $_POST['first_name']: $error_fname = 'name not found';
  $lname = $_POST["last_name"];
  $email = $_POST["email"];
  
  $parts = explode("@",$email );
  $username = $parts[0];
  
  $phone = $_POST["phone"];
  $jobtitle =$_POST["jobtitle"];
  $password = $_POST["password"];
  $hash= password_hash($password, PASSWORD_DEFAULT);
  // $passwordConfirmation = $_POST["passwordconfirmation"];
  $gender=  $_POST["flexRadioDefault"];
  
// Image
  // $filetoupload = $_FILES["image"];
  // move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/" .$_FILES["image"]["name"]);
  // $image =$_FILES["image"]["name"];

  $pgpic = $_FILES["image"]["name"];
    $extension = pathinfo($pgpic, PATHINFO_EXTENSION);
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif", ".heic");
    $roompic = $pgpic . '.' . $extension;
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $roompic);

// Check Username
  $checkuid = mysqli_query($conn, "SELECT * FROM employee_record where username = '$username' OR email = '$email'");
  $row= mysqli_fetch_assoc($checkuid);

// Insert Database
  if($row == null){
    $sql = "INSERT INTO `employee_record` (first_name, last_name, username, email, phone, jobtitle, password, gender, image)
            VALUES('$fname', '$lname', '$username', '$email', '$phone', 
            '$jobtitle', '$hash', '$gender', '$roompic')";
    $result= mysqli_query($conn, $sql);


    // $sql_sine_in = "INSERT INTO `sign_up`(username, email, password) VALUES('$username', '$email', '$hash')"; 
    // $result_sine_in = mysqli_query($conn, $sql_sine_in);

  echo "<script>alert('Sucessfully Account Created'); window.location='index.php'</script>";
  // header("location: '../index.php'");
}
else{
  echo "<script>alert('Email/Username already exists')</script>";
}
}


?>
