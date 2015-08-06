<?php
$host="localhost";
$user="root";
$pwd="root";
$db="test";
// Create connection
$con=mysqli_connect($host,$user,$pwd,$db);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
