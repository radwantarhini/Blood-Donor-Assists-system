<?php
include("config.php"); // configurations

ob_start();
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("register.html");
$cmps246->display("footer.html");

if (isset($_POST["submit"]))
{

$query = mysqli_query($mysqli,"INSERT INTO donor(username,password,email,phone,firstname,lastname,gender,birth,country,city,bloodgroup)
VALUES('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["gender"]."','".$_POST["birth"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["bloodgroup"]."')");

if($query)
{
	header("location:index.php");
}


}


?>
