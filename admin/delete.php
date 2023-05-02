<?php

// Delete Button Functionlity 
require_once "../config.php";

$id = $_GET['id'];
$sql = "DELETE FROM employee_record WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    echo "Data deleted!"; 

      header("Location:index.php");
 } else {
  echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 mysqli_close($conn);



?>