<?php
$servername="localhost";
$username="root";
$password="";
$dbname="muskan";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    // echo "<h4><b><center>Connection Established.</center></b></h4>";
}
else{
    echo "<h4><b><center>Connection Failed</center></b></h4>". mysqli_connect_errno($conn);
}
?>