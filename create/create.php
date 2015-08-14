<?php
include("../connect.php");
include('../tables.php');
$_POST = array_map('strip_tags', $_POST);
$_POST = array_map('htmlspecialchars', $_POST);
$pid=generateString();
$result = mysqli_query($con,"SELECT * FROM $table WHERE pid='$pid' ");

mkdir("../tours/$pid");
mkdir("../tours/$pid/spheres");
mkdir("../tours/$pid/photos");
mkdir("../tours/$pid/thumbs");
mkdir("../tours/$pid/agent");
copy("res/agent.jpg","../tours/$pid/agent/agent.jpg");

$sql="INSERT INTO $table (pid) VALUES ('$pid')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

foreach($_POST as $key => $value) {
    echo 'Current value in $_POST["' . $key . '"] is : ' . $value . '<br>';
    $entry = mysqli_real_escape_string($con, $value);
    $sql="UPDATE $table SET $key='$entry' WHERE pid='$pid'";
    mysqli_query($con,$sql);
}
mysqli_close($con);

function generateString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
