<?php
include("adminfun.php"); // configurations

if(!isset($_SESSION['username']))
{
    header("location: login.php");
}else if($_SESSION['username']=='admin'){
$cmps246->display("head.html");
$cmps246->display("header.html");

global $page;
$page = $_GET["go"];
$cmps246->assign("go", $page);
 if($page=="assist"){
  $cmps246->display("admin/assist.html");
} else if($page=="users"){
  $cmps246->display("admin/users.html");
}else if($page=="admin"){
  $cmps246->display("admin/admin.html");
}

$cmps246->display("footer.html");
}
?>
