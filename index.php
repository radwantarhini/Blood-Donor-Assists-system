<?php
include("config.php"); // configurations

ob_start();
$message_box = "<center><a href='register.php'><img src='template/images/misc/slide.jpg' width='400px' alt='' /></a></center>" ;



$sql =" SELECT * FROM event Limit 2";
$result_event = mysqli_query($mysqli,$sql);
$events = array();
while($row = mysqli_fetch_assoc($result_event))
  {
      $event = array();


      $event["id"] = $row["id"];
      $event["title"] = $row["title"];
      $event["description"] = $row["description"];
      $event["date"]  = $row["date"];

      $events[] =  $event;
  }



$cmps246->assign("events", $events);
$cmps246->assign("message_box", $message_box);
$cmps246->assign("box_title", "welcome");
$cmps246->display("head.html");
$cmps246->display("header.html");
$cmps246->display("box.html");
$cmps246->display("footer.html");
?>
