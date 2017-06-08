
<?php
session_start();
include("libs/Smarty.class.php");

// Smarty Template Engine Configuration
$cmps246 = new Smarty;
$cmps246->addTemplateDir("./template");
$template_dir = "template/";
$cmps246->assign("template_dir", $template_dir);


//  MySqli Connection Configuration
$HOST        = 'localhost';
$DBUSER      = 'root';
$DBPASS      = '';
$DB          = 'cops';
$mysqli = new mysqli("$HOST","$DBUSER","$DBPASS","$DB");
if(mysqli_connect_error())
   {
    printf("Connect ERROR !",mysqli_connect_error());
    exit();
    }


    if(isset($_SESSION['username'])){

    	$user = $_SESSION['username'];
    	$sql_type = "SELECT * FROM donor where username='$user'";
    	$restype= mysqli_query($mysqli,$sql_type);
        $row_type = mysqli_fetch_assoc($restype);
    	$_SESSION['type'] = $row_type['type'];



    }

// WebApplication Configuration
$title = "MiDCare System";
$cmps246->assign("title", $title);
