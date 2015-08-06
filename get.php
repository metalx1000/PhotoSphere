<?php
include('connect.php');
include('tables.php');

$pid=$_GET[pid];

//$result = mysqli_query($con,"SELECT * FROM $table");
$result = mysqli_query($con,"SELECT * FROM $table WHERE pid='$pid'");
$rows = array();
while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($con);
?>
