<?php
include("config.php"); // configurations


if (isset($_POST["submit"]))
{
  $bloodgroup = $_POST["bloodgroup"];
  $country = $_POST["country"];

  $sql=" SELECT *  FROM  donor where bloodgroup='$bloodgroup' and country='$country' and type=0";
}else {
$sql=" SELECT *  FROM  donor WHERE type=0";
}

$result = mysqli_query($mysqli,$sql);
$donors = array();
$count=1;
while($row = mysqli_fetch_assoc($result))
  {
      $donor = array();

      $donor["count"] = $count++;
      $donor["firstname"] = $row["firstname"];
      $donor["lastname"] =  $row["lastname"];
      $donor["gender"] =    $row["gender"];
      $donor["bloodgroup"]= $row["bloodgroup"];
      $donor["country"] =   $row["country"];
      $donor["city"]=       $row["city"];
      $donor["phone"]=       $row["phone"];
      $donors[] =  $donor;
  }



$cmps246->assign("donors", $donors);
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("donerlist.html");
$cmps246->display("footer.html");



?>
