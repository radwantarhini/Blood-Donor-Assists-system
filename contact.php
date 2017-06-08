<?php
include("config.php"); // configurations

ob_start();

$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("contactus.html");
$cmps246->display("footer.html");

?>
