<?php
require_once "../config.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM feedback WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Feedback Deleted'); window.location.href='feedback.php';</script>";

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

?>