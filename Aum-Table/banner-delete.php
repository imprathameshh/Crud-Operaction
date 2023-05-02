<?php
require_once "../config.php";
error_reporting(0);

// if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM banner WHERE id=$id";
	$data=mysqli_query($conn,$sql);
	if($data){
		echo "<script>alert('Blog Deleted'); window.location.href='banner.php';</script>";
		
	}else{
		echo "Failed To Deleted";
	}
?>