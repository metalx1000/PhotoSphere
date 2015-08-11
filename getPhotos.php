<?php
$pid = $_GET['pid'];
$dir    = "tours/$pid/photos/";
$files = array_diff(scandir($dir), array('..', '.'));
foreach ($files as &$image) {
  echo "$image,";
}
?>
