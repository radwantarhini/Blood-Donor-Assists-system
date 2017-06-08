<?php
include("config.php"); // configurations

ob_start();



$sql=" SELECT *  FROM  assist ";
$result = mysqli_query($mysqli,$sql);
$assists = array();
$count=1;
while($row = mysqli_fetch_assoc($result))
  {
      $assist = array();
      $assist["count"] = $count++;
      $assist["amount"] =  $row["amount"];
      $assist["message"] =  $row["message"];
      $assist["date"] =     $row["date"];
      $assist["did"]=   $row["did"];
      $assist["id"] =   $row["id"];
     $assist["active"] =   $row["active"];
      $did =$row["did"];

      $result2 = mysqli_query($mysqli,"SELECT *  FROM  donor where id='$did' ");
      $donor =  mysqli_fetch_assoc($result2);
      $assist["firstname"] =   $donor["firstname"];
      $assist["lastname"] =    $donor["lastname"];
      $assist["phone"] =       $donor["phone"];
      $assist["gender"] =      $donor["gender"];
      $assist["birth"] =       $donor["birth"];
      $assists[] =  $assist;
  }
  $cmps246->assign("assists", $assists);
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("assist.html");
$cmps246->display("footer.html");





?>
