<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$connection = mysqli_connect("localhost","root","password","mpr_db");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// For testing only
// $result = mysqli_query($connection, "select * from basins");
//
// if ($result)
// {
//   echo "success";
//   while ($row=mysqli_fetch_row($result))
//     {
//     printf ("%s (%s)\n",$row[0],$row[1]);
//     }
// }

?>
