<?php
include("auth_session.php");
//start data_header

$table = $_POST["table"];
$var = $_POST["var"];
$val = $_POST["val"];
$draft = $_POST["draft"];
$s_table = $_POST["s_table"];
$s_var = $_POST["s_var"];
$s_val = $_POST["s_val"];
$b_table = $_POST["b_table"];
$b_var = $_POST["b_var"];
$b_val = $_POST["b_val"];
$rd_table = $_POST["rd_table"];
$rd_var = $_POST["rd_var"];
$rd_val = $_POST["rd_val"];
$dd_table = $_POST["dd_table"];
$dd_var = $_POST["dd_var"];
$dd_val = $_POST["dd_val"];
//echo $table[0];
$n = sizeof($table);
$record_id=$_SESSION["record_id"];
$basin_id=$_SESSION['basin_id'];
//$record_id=234;
echo $record_id."<br>";
//data_header
for($i=0;$i<$n;$i++){
  $update_query = "update $table[$i] set $var[$i]='$val[$i]' where record_id=$record_id";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
//data_site
$m = sizeof($s_table);
for($i=0;$i<$m;$i++){
  $ss = explode('-', $s_var[$i]);
  $var1=$ss[0];
  $update_query = "update $s_table[$i] set $var1='$s_val[$i]' where record_id=$record_id and site_id=$ss[1]";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
//data_basin
$n = sizeof($b_table);
for($i=0;$i<$n;$i++){
  $ss = explode('-', $b_var[$i]);
  $var1=$ss[0];
  $update_query = "update $b_table[$i] set $var1='$b_val[$i]' where record_id=$record_id and data_class='$ss[1]' and basin_id=$basin_id";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
//data_basin_reservoir_data
$n = sizeof($rd_table);
for($i=0;$i<$n;$i++){
  $ss = explode('-', $rd_var[$i]);
  $var1=$ss[0];
  $update_query = "update $rd_table[$i] set $var1='$rd_val[$i]' where record_id=$record_id and data_class='$ss[1]' and basin_id=$basin_id";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
//drilling_data
$m = sizeof($dd_table);
for($i=0;$i<$m;$i++){
  $ss = explode('-', $dd_var[$i]);
  $var1=$ss[0];
  $update_query = "update $dd_table[$i] set $var1='$dd_val[$i]' where record_id=$record_id and site_id=$ss[1]";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
//for($i=0;$i<3;$i++){
//$ex =array("Volvo_1","BMW_2","Toyota_3");
//$ss = explode('_', $ex[$i]);
// $var1=$ss[0];
// print_r($var1);
// print_r($ss[1]);

//}

// end data_header




if($draft =="0"){
  $sub_date = date("Y-m-d H:i:s");
  $update_query_data_header="update data_header set draft = 0,submission_date='$sub_date' where record_id=$record_id ";
  echo $update_query_data_header;
  $result = mysqli_query($connection, $update_query_data_header);


  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
else{
  //Do nothing
}

?>
