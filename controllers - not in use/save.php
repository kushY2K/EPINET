<?php
include("connect.php");
session_start();

$table = $_POST["table"];
$var = $_POST["var"];
$val = $_POST["val"];
$draft = $_POST["draft"];

//echo $table[0];
$n = sizeof($table);
$record_id=$_SESSION["record_id"];
//$record_id=234;
echo $record_id."<br>";
$i=0;

for($i=0;$i<$n;$i++){
  $update_query = "update $table[$i] set $var[$i]='$val[$i]' where record_id=$record_id";
  echo $update_query."<br>";
  $result = mysqli_query($connection, $update_query);
  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}

if($draft =="0"){
  $sub_date = date("Y-m-d H:i:s");
  $update_query="update data_header set draft = 0,submission_date='$sub_date' where record_id=$record_id ";
  echo $update_query;
  $result = mysqli_query($connection, $update_query);

  if(mysqli_error($connection)){
    //Change this later
    echo mysqli_error($connection);
  }
}
else{
  //Do nothing
}

?>
