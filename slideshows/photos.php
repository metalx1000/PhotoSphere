<?php
$pid = $_GET['pid'];
$dir    = "../tours/$pid/photos/";
$files = array_diff(scandir($dir), array('..', '.'));
foreach ($files as &$image) {
  echo "<img src='$dir$image' alt='' width='2048' height='1536' />\n";
}

?>
