<?php
include("config.php"); // configurations

ob_start();
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("add_assist.html");
$cmps246->display("footer.html");

if(!isset($_SESSION["username"])){
  header("location:login.php");

}else if($_SESSION["type"]==0){
  header("location:login.php");
}

if (isset($_POST["submit"]))
{

  $user = $_SESSION["username"]  ;
  $sql_user = "SELECT id FROM donor where username='$user'";

  $res = mysqli_query($mysqli,$sql_user);
  $usr =  mysqli_fetch_assoc($res);
  $query = mysqli_query($mysqli,"INSERT INTO assist(amount,message,did)
  VALUES('".$_POST["amount"]."','".$_POST["message"]."','".$usr["id"]."')");

if($query)
{
	header("location:index.php");
}


}


?>
