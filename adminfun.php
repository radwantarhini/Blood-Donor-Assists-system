<?php
include("config.php"); // configurations

ob_start();

// Assist Messages Part
$sql_assist=" SELECT *  FROM  assist ";
$result_assist = mysqli_query($mysqli,$sql_assist);
$assists = array();
$count_assist=1;
while($row_assist = mysqli_fetch_assoc($result_assist))
  {
      $assist = array();
      $assist["count"] = $count_assist++;
      $assist["amount"] =  $row_assist["amount"];
      $assist["message"] =  $row_assist["message"];
      $assist["date"] =     $row_assist["date"];
      $assist["did"]=   $row_assist["did"];
      $assist["id"] =   $row_assist["id"];
      $assist["active"] =   $row_assist["active"];
      $did =$row_assist["did"];
      $result2_assist = mysqli_query($mysqli,"SELECT *  FROM  donor where id='$did' ");
      $donor =  mysqli_fetch_assoc($result2_assist);
      $assist["firstname"] =   $donor["firstname"];
      $assist["lastname"] =    $donor["lastname"];
      $assist["phone"] =       $donor["phone"];
      $assist["gender"] =      $donor["gender"];
      $assist["birth"] =       $donor["birth"];
      $assists[] =  $assist;
  }
    $cmps246->assign("assists", $assists);

  if(isset($_POST["submit_assist"]) && isset($_POST["assist_active"]))
  {
    $assist_id = $_POST["assist_id"];
    $assist_update ="UPDATE assist SET active = 1 WHERE id = $assist_id" ;
     mysqli_query($mysqli,$assist_update);
     header("Refresh:0");
  }else if(isset($_POST["submit_assist"]) && isset($_POST["assist_deactive"])){
    $assist_id = $_POST["assist_id"];
    $assist_update ="UPDATE assist SET active = 0 WHERE id = $assist_id" ;
    mysqli_query($mysqli,$assist_update);
    header("Refresh:0");
  }


  // Users Manager Part
  $user_sql=" SELECT *  FROM  donor where type=0";
  $result_user = mysqli_query($mysqli,$user_sql);
  $user_donors = array();
  $count_user=1;
  while($row_user = mysqli_fetch_assoc($result_user))
    {
        $user_donor = array();
        $user_donor["count"] =  $count_user++;
        $user_donor["firstname"] = $row_user["firstname"];
        $user_donor["lastname"] =  $row_user["lastname"];
        $user_donor["username"] =    $row_user["username"];
        $user_donor["email"]= $row_user["email"];
        $user_donor["type"] =   $row_user["type"];
       $user_donor["id"] =   $row_user["id"];
        $user_donors[] =  $user_donor;
    }
    $cmps246->assign("user_donors", $user_donors);

    if(isset($_POST["submit_user"]) && isset($_POST["user_delete"]))
    {
      $user_id = $_POST["user_id"];
      $user_delete ="DELETE FROM donor WHERE id =$user_id" ;
      mysqli_query($mysqli,$user_delete);
      header("Refresh:0");
    }


    //Admin Statstics
  $donor_stat_sql  =" SELECT *  FROM  donor where type=0";
  $assist_stat_sql =" SELECT *  FROM  donor where type=1";
  $donor_stat_query = mysqli_query($mysqli,$donor_stat_sql);
  $assist_stat_query = mysqli_query($mysqli,$assist_stat_sql);
  $donor_stat=   mysqli_num_rows($donor_stat_query);
  $assist_stat=  mysqli_num_rows($assist_stat_query);
  $cmps246->assign("donor_stat", $donor_stat);
  $cmps246->assign("assist_stat", $assist_stat);

  $admin_setting_result = mysqli_query($mysqli, " SELECT *  FROM  setting ");
  $admin_setting =  mysqli_fetch_assoc($admin_setting_result);
  $cmps246->assign("admin_setting", $admin_setting);
  if(isset($_POST["submit_admin"]))
  {

    $new_email = $_POST["email"];
    $new_title = $_POST["title"];
    mysqli_query($mysqli,"UPDATE setting SET title='$new_title', email='$new_email'");
    header("Refresh:0");
}

?>
