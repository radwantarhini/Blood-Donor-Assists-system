<?php
include("config.php"); // configurations

ob_start();

$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("aboutus.html");
$cmps246->display("footer.html");

?>
