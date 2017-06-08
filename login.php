<?php
include("config.php"); // configurations

ob_start();
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("login.html");
$cmps246->display("footer.html");

if(isset($_SESSION['username']))
{
    header("location: index.php");
}

if (isset($_POST["submit"]))
{
  $password = $_POST["login_password"];
  $username = $_POST["login_username"];

  $query = mysqli_query($mysqli,"SELECT * FROM donor where username='$username' and password ='$password' ");
  $count = mysqli_num_rows($query);
  if($count>0)
  {
    $_SESSION['username'] = $username;
    header("location: index.php");
  }

}


?>
