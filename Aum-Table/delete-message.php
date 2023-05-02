<?php
require_once "../config.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM send_msg WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
	    $_SESSION['message'] = "Data deleted!"; 

        header("Location:messages-recived.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

?>