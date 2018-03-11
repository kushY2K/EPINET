<!-- Fetch Record first --> 

<?php
include("auth_session.php");
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

//Find record ID of record to fetch
$record_id2fetch = $_GET["my"];
$basin_name = "Frontier Basin, Dehradun";//Fetch from session
//echo $record_id2fetch;

$myArray = array();
$result = mysqli_query($connection, "SELECT month_year,highlights,dm_geology,dm_seismic,dm_welllogs,dm_geochem,dm_geolab,dm_reservoir,dm_production,dm_drilling, software_activities, other_activities, constraints, remarks FROM data_header WHERE record_id=$record_id2fetch");
$r_data_header = $result->fetch_array(MYSQL_BOTH);


$result = mysqli_query($connection, "SELECT dm_geology,dm_seismic,dm_welllogs,dm_geochem,dm_geolab,dm_reservoir,dm_production,dm_drilling FROM data_header WHERE record_id=$record_id2fetch");
//Below array contains order in which Data Management fields are fetched
$a_data_mgmt = ["Geology","Seismic","Well Logs","Geo-Chemistry","Geo-Lab","Reservoir","Production","Drilling"];
$r_datamgmt = $result->fetch_array(MYSQL_BOTH);



$result1=mysqli_query($connection,"SELECT ubhi,ubhi_added_during_month,total_volume,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified,data_gaps_filled FROM data_sites WHERE record_id=$record_id2fetch");

 $result2 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled FROM data_basin WHERE record_id=$record_id2fetch and data_class='leased_objects' ");

 // Log data 

 $result3 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='original_logs_in_psl'");

  $result4 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled,  data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='composite_logs_in_pse'");

   $result5 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled,  data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='processed_logs_in_pse'");
    

    /*Seismic Data*/

   $result6 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='2d_navigation_data'");

   $result7 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='3d_navigation_data'");

   $result8= mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='2d_segy_data'");

   $result9 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='3d_segy_data'");
    
    $result10 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='merged_3d_data'");

    $result11 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='vsp_td_curve'");

     $result12 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='vsp_segy_data'");

      //Geo-Lab Data
     $result13 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='palynology'");

     $result14 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='paleontology'");

     $result15 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='sedimentology'");



      //Geo-Chemical Data

     $result16 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='source_rock'");

     $result17= mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='oil'");

     $result18 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='water'");
     
     $result19 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='gas'");
     
     $result20 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='surface_surveys'");
     
     $result21 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='core_studies'");

     $result22 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='pvt_analysis'");
 

    //Reservoir Data
     $result23 = mysqli_query($connection, "SELECT data_class, total_volume,data_loaded_month_wells,data_loaded_month_records, cumulative_data_loaded_wells,cumulative_data_loaded_records,  cumulative_data_validated_wells,data_gaps_identified_wells,data_gaps_filled_wells FROM data_basin_reservoir_data WHERE record_id=$record_id2fetch ");


     //Drilling Data
     $result24 = mysqli_query($connection,"SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled FROM  data_sites_drilling_data WHERE record_id=$record_id2fetch");

// foreach ($r_data_header as $key => $value) {
//   if($value){
//     //echo $key.":".$value."<br>";
//
//   }
// }


?>

<!-- HTML Document begins -->

<html>
<head>

  <title>EPINET - Monthly Report</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap-theme.min.css">

  <script src="assets/jquery-2.1.1.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <style>
        th {
          text-align: center;
        }
   </style>>     
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="mpr_home.php">EPINET Monthly Progress Report</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="mpr_draft.php">Create/Edit Draft</a></li>
          <li><a href="mpr_archive.php">View MPRs</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="auth_logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav> <!-- NAVBAR ENDS -->

  <br><br><br>

<div class="container">

<div class="row"> <!-- Header -->
  <div class="col-md-3">
  </div>
  <div class="col-md-6 text-center">
<?php
next($r_data_header);
echo "<h2>Oil & Natural Gas corporation Limited</h2>";
echo "<h2>EPINET Monthly Progress Report</h2>";
echo "<h2>$basin_name</h2>";
echo "<h2>";
echo date("F - Y",strtotime(current($r_data_header)));
echo "</h2>";
?>
</div> 
<div class="col-md-3">
</div>
</div> <!-- Header row -->

<div class="row"> <!-- Highlights -->
<?php
next($r_data_header);
echo "<h3><u>Highlights</u></h3>";
echo "<ul>";
foreach (explode("\n",current($r_data_header)) as $point)
  echo "<li>$point</li>";
echo "</ul>";
?>
</div> <!-- Highlights row -->



 

<div class="row"><!-- WELL DATA -->
 <h3><u>Well data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th>
  <th>RECORD ID</th> -->
  <th>Site Name</th>
  <th>UBHI</th>
  <th>ubhi_added_during_month</th>
  <th>  total_volume</th>
  <th> cumulative_data_loaded</th>
  <th>cumulative_data_validated</th>
  <th>data_gaps_identified</th>
  <th>data_gaps_filled</th>
  
  </tr>
  <?php while($row=mysqli_fetch_array($result1)):?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>
 
 
  <td><?php echo $row['record_id'];?></td> -->
  <td>Dehradun</td>
  <td><?php echo $row['ubhi'];?></td>
  <td align="center"> <?php echo $row['ubhi_added_during_month'];?></td> 
  <td><?php echo $row['total_volume'];?></td>
  <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  <?php endwhile;?> 
  </table>
</div><!-- WELL DATA -->



<div class="row"><!-- LEASED OBJECT -->
 <h3><u>Leased Object</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th>
  <th>RECORD ID</th> -->
    <th>total_volume</th>
  <th>data_loaded_month</th>
    <th> cumulative_data_loaded</th>
  <th>cumulative_data_validated</th>
  <th>data_gaps_identified</th>
  <th>data_gaps_filled</th>
  
  </tr>
  <?php $row=mysqli_fetch_array($result2)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>
 
 
  <td><?php echo $row['record_id'];?></td> -->
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   
  </table>
</div><!-- LEASED OBJECT -->



<div class="row"><!-- Log Data -->
 <h3><u>Log Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th> -->
  <th>data_class</th> 
    <th>total_volume</th>
  <th>data_loaded_month</th>
    <th> cumulative_data_loaded</th>
  <th>cumulative_data_validated</th>
  <th>data_gaps_identified</th>
  <th>data_gaps_filled</th>
  
  </tr>
  <?php $row=mysqli_fetch_array($result3)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result4)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  <?php $row=mysqli_fetch_array($result5)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  </table>
</div><!-- LOG DATA -->
  
  
<div class="row"><!-- Seismic Data -->
 <h3><u>Seismic Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th> -->
  <th>Data Class</th> 
    <th>Total Volume(No. of surveys)</th>
  <th>Data Loaded during the month</th>
    <th>Cumulative Data Loaded</th>
  <th>Cumulative Data Validated</th>
  <th>Data Gaps Identified</th>
  <th>  Data Gaps Filled</th>
  
  </tr>
  <?php $row=mysqli_fetch_array($result6)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result7)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  <?php $row=mysqli_fetch_array($result8)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result9)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result10)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result11)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result12)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  </table>
</div><!--  Seismic Data -->


<div class="row"><!-- Geo-Lab Data
 -->
 <h3><u>Geo-Lab Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th> -->
  <th>Data Class</th> 
    <th>Total Volume</th>
  <th>Data Loaded during the month</th>
    <th>Cumulative Data Loaded</th>
  <th>Cumulative Data Validated</th>
  <th>Data Gaps Identified</th>
  <th>  Data Gaps Filled</th>
  
  </tr>
  <?php $row=mysqli_fetch_array($result13)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result14)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  <?php $row=mysqli_fetch_array($result15)?>
  <tr>
   <td><?php echo $row['data_class'];?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
 
  </table>
</div><!--  Seismic Data -->

<div class="row"><!-- Geo-Chemical Data
 -->
 <h3><u>Geo-Chemical Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th> -->
  <th>Data Class</th> 
    <th>Total Volume</th>
  <th>Data Loaded during the month</th>
    <th>Cumulative Data Loaded</th>
  <th>Cumulative Data Validated</th>
  <th>Data Gaps Identified</th>
  <th>  Data Gaps Filled</th>
  
  </tr>
  <?php $row=mysqli_fetch_array($result16)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo 'Source Rock (No. of wells)' ?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result17)?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>-->
 
 
  <td><?php echo 'Oil (No. of Samples)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  <?php $row=mysqli_fetch_array($result18)?>
  <tr>
   <td><?php echo 'Water (No. of Samples)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result19)?>
  <tr>
   <td><?php echo 'Gas (No. of Samples)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result20)?>
  <tr>
   <td><?php echo 'Surface Surveys (Area)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result21)?>
  <tr>
   <td><?php echo 'Core Studies (No. of Wells)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
   <?php $row=mysqli_fetch_array($result22)?>
  <tr>
   <td><?php echo 'PVT Analysis (No. of Wells)'?></td> 
   <td><?php echo $row['total_volume'];?></td>
    <td><?php echo $row['data_loaded_month'];?></td>
     <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td> 
  <td><?php echo $row['data_gaps_filled'];?></td>
  </tr>
  </table>
</div><!--  Geo-Chemical Data -->


<div class="row"><!-- Reservoir Data -->
 <h3><u>Reservoir Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th>
  <th>RECORD ID</th> -->
  <th>Data Class</th>
  <th>Total Volume - Wells</th>
  <th>Data Loaded during the month - Wells</th>
  <th>Data Loaded during the month - Records</th>
  <th>Cumulative Data Loaded - Wells</th>
  <th>Cumulative Data Loaded - Records/th>
  <th>Cumulative Data Validated - Wells</th>
  <th>Data Gaps Identified - Wells</th>
  <th>Data Gaps Filled - Wells</th>
  
  </tr>
  <?php while($row=mysqli_fetch_array($result23)):?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>
 
 
  <td><?php echo $row['record_id'];?></td> -->
    <td><?php echo $row['data_class'];?></td>
  <td><?php echo $row['total_volume'];?></td>
  <td align="center"> <?php echo $row['data_loaded_month_wells'];?></td> 
  <td><?php echo $row['data_loaded_month_records'];?></td>
  <td><?php echo $row['cumulative_data_loaded_wells'];?></td>
  <td><?php echo $row['cumulative_data_loaded_records'];?></td>
  <td><?php echo $row['cumulative_data_validated_wells'];?></td> 
  <td><?php echo $row['data_gaps_identified_wells'];?></td>
  <td><?php echo $row['data_gaps_filled_wells'];?></td>
  </tr>
  <?php endwhile;?> 
  </table>
</div><!-- Reservoir Data -->

<div class="row"><!-- Drilling Data -->
 <h3><u>Drilling Data</u></h3>
  <table   cellspacing="5" cellpadding="5" border="2" height="10%" width="100%" style="text-align: center" >
  <tr>
 <!--  <th>ID#</th>
  <th>RECORD ID</th> -->
  <th>Site Name</th>
  <th>Total Volume</th>
  <th>Data Loaded during the month</th>
  <th>Cumulative Data Loaded/th>
  <th>Cumulative Data Validated</th>
  <th>Data Gaps Identified</th>
  <th>Data Gaps Filled</th>
  
  </tr>
  <?php while($row=mysqli_fetch_array($result24)):?>
  <tr>
 <!--  <td> <?php echo $row['id'];?></td>
 
 
  <td><?php echo $row['record_id'];?></td> -->
  <td>Dehradun</td>
  <td><?php echo $row['total_volume'];?></td>
  <td align="center"> <?php echo $row['data_loaded_month'];?></td> 
  <td><?php echo $row['cumulative_data_loaded'];?></td>
  <td><?php echo $row['cumulative_data_validated'];?></td>
  <td><?php echo $row['data_gaps_identified'];?></td>
  <td><?php echo $row['data_gaps_filled'];?></td> 
   </tr>
  <?php endwhile;?> 
  </table>
</div><!-- Drilling Data -->



  


<div class="row"> <!-- Data Management -->
<?php
$t_check=0;
$s = sizeof($a_data_mgmt);
for($j=0;$j<$s;$j++){
  if(!$r_datamgmt[$j])
    continue;
  elseif(!$t_check){
    echo "<h3><u>Data Management</u></h3>";
    $t_check++;
  }
  echo "<h4>$a_data_mgmt[$j]</h4>";
  echo "<ul>";
  $temp = explode("\n",$r_datamgmt[$j]);
  $n = sizeof($temp);
  for($i=0;$i<$n;$i++)
    echo "<li>$temp[$i]</li>";
  echo "</ul>";
}
?>
</div> <!-- Data Management row -->





</div> <!-- container -->
</body>
</html>
