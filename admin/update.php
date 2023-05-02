<?php 

require_once("../config.php");

if($_SERVER["REQUEST_METHOD"] =="POST"){

  // Update Image 
  move_uploaded_file($_FILES["image"]["tmp_name"], "../images/". $_FILES["image"]["name"]);

  //Update All
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $image = $_POST['image'];
  $jobtitle = $_POST['jobtitle'];

  // Update password not null
  if(empty($_POST["password"])){
  $password = $_POST["oldpwd"];
  }else{
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);
  }

  // Update Image not null  
  if(strlen($image)>0){
      $oldimg = $image;
  }

  //Query of Updata
  $sql = "UPDATE employee_record SET first_name='$fname', last_name='$lname', email='$email', phone='$phone', image='$image', jobtitle='$jobtitle'
  WHERE id = $id";

// Update Query and push
if(mysqli_query($conn, $sql)){
  echo "<script>alert('Date Update'); window.location='index.php';</script>";
}else{
  echo "Unsuccessful";
}
}


?>