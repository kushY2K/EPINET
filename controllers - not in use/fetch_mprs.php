<?php
include("connect.php");
session_start();
$basin_id=1;

$myArray = array();
$result = mysqli_query($connection, "SELECT record_id, DATE_FORMAT(month_year, '%M - %Y') as month_year_format, DATE_FORMAT(submission_date, '%e-%b-%Y') as submission_date_format, draft FROM data_header WHERE basin_id=$basin_id ORDER BY month_year DESC");

while($row = $result->fetch_array(MYSQL_ASSOC)) {
  $myArray[] = $row;
}
echo json_encode($myArray);


?>
