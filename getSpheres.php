<?php
$pid = $_GET['pid'];
$dir    = "tours/$pid/spheres/";
$files = array_diff(scandir($dir), array('..', '.'));
foreach ($files as &$image) {
  echo "$image,";
}
?>
