<?php
include("connect.php");
session_start();

$mode=$_POST["mode"];

/*-- CHECK MODE --*/
if($mode=="check"){
  
  //$basin_id= 1;
  $basin_id=$_SESSION['basin_id'];//Pick from session variable

  //$result = mysqli_query($connection, "select * from data_header where basin_id=$basin_id and draft=1");

  //Fetcing most recent record of current user
  $result = mysqli_query($connection, "SELECT * FROM data_header WHERE basin_id=$basin_id ORDER BY month_year DESC LIMIT 1");

  if($result){
    $row=mysqli_fetch_row($result);
    $record_id=$row[0];
    $month_year=strtotime($row[2]);
    $is_draft=$row[3];
  }

  // echo $record_id."-".$is_draft;

  if ($is_draft){ //If draft exists
    $send_month_year = date("F - Y",$month_year);
    echo "exists:$send_month_year";
    $_SESSION["record_id"] = $record_id;
    //echo $_SESSION["record_id"];
    //Store record_id in session variable
    //Fetch existing data in next AJAX request
  }

  /*-- CREATE DRAFT --*/
  else{ //If draft does not exist
    //Create draft

    //Update Record ID, Month and Year
    $new_month_year = date("F - Y", strtotime("+1 month", $month_year)); //Format for display
    $sql_month_year = date("Y-m-d H:i:s", strtotime($new_month_year)); //Format for SQL Query

    $new_record_id = $basin_id.date("mY", strtotime($new_month_year)); //Generate new Record ID

    //Execute query
    $insert_query="insert into data_header (record_id, basin_id, month_year, draft) VALUES ($new_record_id, $basin_id, '$sql_month_year' , 1)";
    $result = mysqli_query($connection, $insert_query);
    if(mysqli_error($connection)){
      //Change this later
      echo mysqli_error($connection);
    }

    //Return Month and year
    echo $new_month_year;

    //Store record_id in session variable
    $_SESSION["record_id"] = $new_record_id;
  }


}

/*-- FETCH MODE --*/
elseif($mode=="fetch"){
  //echo "fetching...";
  $record_id = $_SESSION["record_id"]; //Get from session variable
  $myArray = array();
  $result = mysqli_query($connection, "SELECT * FROM data_header WHERE record_id=$record_id");
  while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
  echo json_encode($myArray);
}

?>
