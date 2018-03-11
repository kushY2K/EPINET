
<?php
include("auth_session.php");
error_reporting(-1);
ini_set('display_errors', 'On');

require("fpdf/WriteHTML.php");


$record_id2fetch = $_GET["my"];
$basin_name = "Frontier Basin, Dehradun";        //Fetch from session



$pdf= new PDF_HTML();
$pdf->AddPage("L","A3");
$pdf->SetFont("Arial","",16);
//$pdf->Cell(100,10,"",1,0,"C");
$record_id2fetch = $_GET["my"];
$basin_name = "Frontier Basin, Dehradun";        //Fetch from session


$myArray = array();
$result = mysqli_query($connection, "SELECT month_year,highlights,dm_geology,dm_seismic,dm_welllogs,dm_geochem,dm_geolab,dm_reservoir,dm_production,dm_drilling, software_activities, other_activities, constraints, remarks FROM data_header WHERE record_id=$record_id2fetch");
$row = $result->fetch_array(MYSQL_BOTH);

$result = mysqli_query($connection, "SELECT dm_geology,dm_seismic,dm_welllogs,dm_geochem,dm_geolab,dm_reservoir,dm_production,dm_drilling FROM data_header WHERE record_id=$record_id2fetch");
//Below array contains order in which Data Management fields are fetched
$a_data_mgmt = ["Geology","Seismic","Well Logs","Geo-Chemistry","Geo-Lab","Reservoir","Production","Drilling"];
$r_datamgmt = $result->fetch_array(MYSQL_BOTH);

$result = mysqli_query($connection, "SELECT software_activities,other_activities,constraints,remarks FROM data_header WHERE record_id=$record_id2fetch");
$a_soft_act=["Software Activities","Other Activities","Constraints","Remarks"];
$r_softact = $result->fetch_array(MYSQL_BOTH);


$result1=mysqli_query($connection,"SELECT ubhi,ubhi_added_during_month,total_volume,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified,data_gaps_filled FROM data_sites WHERE record_id=$record_id2fetch");

$result2 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled FROM data_basin WHERE record_id= $record_id2fetch AND data_class='leased_objects'");

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
 
     $result25 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='field_production'");
	 
	 $result26 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='field_water_injection'");
	 
	 $result27 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='work_over_history'");
	 
	 $result28	= mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='wss'");
    
	 $result29 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='gas_utilization'");
	
	 $result30 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='value_added_product'");
	 
	 $result31 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='pipeline_data'");
	 
	 $result32 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='artificial_lift'");
	 
	 $result33 = mysqli_query($connection, "SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled, data_class FROM data_basin WHERE record_id= $record_id2fetch AND data_class='production_testing'");
	 //Reservoir Data
     $result23 = mysqli_query($connection, "SELECT data_class, total_volume,data_loaded_month_wells,data_loaded_month_records, cumulative_data_loaded_wells,cumulative_data_loaded_records,  cumulative_data_validated_wells,data_gaps_identified_wells,data_gaps_filled_wells FROM data_basin_reservoir_data WHERE record_id=$record_id2fetch ");


     //Drilling Data
     $result24 = mysqli_query($connection,"SELECT total_volume,data_loaded_month,cumulative_data_loaded,cumulative_data_validated,data_gaps_identified, data_gaps_filled FROM  data_sites_drilling_data WHERE record_id=$record_id2fetch");
	
	 
	 $d=date("F - Y",strtotime(current($row)));
	 
	 
$pdf->WriteHTML("<p align='center'> <b>Oil & Natural Gas Corporation Limited  <br> EPINET MONTHLY Progress Report <br> $basin_name.<br>  $d <br> <br></b></p>");
//$pdf->WriteHTML("<p align='center'> $basin_name </p> <br>");
//$pdf->WriteHTML("<p align='center'> $d </p> <br>");
next($row);
next($row);


$pdf->WriteHTML("<u><b><h1>Highlights</h1> </b></u> <br> <br>");
foreach (explode("\n",current($row)) as $point)
 $pdf->WriteHTML("$point <br>");
$pdf->WriteHTML("<br> <br> ");
$pdf->Ln();
$pdf->WriteHTML("<u><b>Well Data</b></u> <br>");

$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(40,10,$row['id'],1,0,'C');	
$pdf->Cell(40,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result1)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');

$pdf->Ln();
$pdf->Cell(40,10,"Site Name",1,0,'C');
$pdf->Cell(40,10,"UBHI",1,0,'C');
$pdf->Cell(60,10,"UBHI Added during month",1,0,'C');
$pdf->Cell(40,10,"Total Volume",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');
$pdf->Cell(40,10,"Dehradun",1,0,'C');


$pdf->Cell(40,10,$row['ubhi'],1,0,'C');

$pdf->Cell(60,10,$row['ubhi_added_during_month'],1,0,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C'); 

$pdf->ln();
}
$pdf->Ln();
$pdf->SetFont("Arial","",16);
$pdf->WriteHTML("<u><b>Leased Object</b></u> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result2)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');
$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
 
$pdf->Ln(); 
$pdf->SetFont("Arial","",16);
$pdf->WriteHTML("<u><b>Log Data</b></u> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result3)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result4)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}


$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result5)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');

$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Seismic Data</b></u> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result6)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result7)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result8)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result9)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result10)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result11)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}

$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result12)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Geo-Lab Data</b></u> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result13)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result14)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result15)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Geo-Chemical Data</u></b> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result16)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result17)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result18)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result19)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
//$pdf->Cell(100,10,"",1,0,"C");

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result20)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result21)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result22)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Production Data</u></b> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result25)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result26)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result27)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');


$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result28)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result29)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result30)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result31)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result32)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
}
$pdf->Ln();
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result33)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(40,10,"total_volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');

$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C');
$pdf->Ln(); 
 
}
$pdf->Ln();



$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Reservoir Data</u></b> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);

while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result23)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');




$pdf->WriteHTML($row['data_class']);
$pdf->WriteHTML("<br> <br>");

$pdf->Cell(30,10,"total volume",1,0,'C');
$pdf->Cell(50,10,"data_loaded_month wells",1,0,'C');
$pdf->Cell(60,10,"data_loaded_month records",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded wells",1,0,'C');
$pdf->Cell(65,10,"cumulative_data_loaded records",1,0,'C');
$pdf->Cell(65,10,"cumulative_data_validated wells",1,0,'C');
$pdf->Cell(43,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(33,10,"data_gaps_filled",1,1,'C');


$pdf->Cell(30,10,$row['total_volume'],1,0,'C');

$pdf->Cell(50,10,$row['data_loaded_month_wells'],1,0,'C');

$pdf->Cell(60,10,$row['data_loaded_month_records'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded_wells'],1,0,'C');

$pdf->Cell(65,10,$row['cumulative_data_loaded_records'],1,0,'C');

$pdf->Cell(65,10,$row['cumulative_data_validated_wells'],1,0,"C");

$pdf->Cell(43,10,$row['data_gaps_identified_wells'],1,0,'C');

$pdf->Cell(33,10,$row['data_gaps_filled_wells'],1,1,'C');



$pdf->Ln();
}
$pdf->SetFont("Arial","",16);
$pdf->Ln();
$pdf->WriteHTML("<u><b>Drilling Data</u></b> <br>");
$pdf->Ln();
$pdf->SetFont("Arial","",12);
while($row=mysqli_fetch_array($result)){
$pdf->Cell(50,10,$row['id'],1,0,'C');	
$pdf->Cell(50,10,$row['record_id'],1,0,'C');
}
while($row=mysqli_fetch_array($result24)){
//$pdf->Cell(50,10,$row['id'],1,0,'C');	
//$pdf->Cell(50,10,$row['record_id'],1,0,'C');



$pdf->Cell(40,10,"Site Name",1,0,'C');

$pdf->Cell(40,10,"Total Volume",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_loaded",1,0,'C');
$pdf->Cell(60,10,"cumulative_data_validated",1,0,'C');
$pdf->Cell(60,10,"data_gaps_identified",1,0,'C');
$pdf->Cell(40,10,"data_gaps_filled",1,1,'C');
$pdf->Cell(40,10,"Dehradun",1,0,'C');




$pdf->Cell(40,10,$row['total_volume'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_loaded'],1,0,'C');

$pdf->Cell(60,10,$row['cumulative_data_validated'],1,0,"C");
  

$pdf->Cell(60,10,$row['data_gaps_identified'],1,0,'C');

$pdf->Cell(40,10,$row['data_gaps_filled'],1,0,'C'); 

$pdf->ln();
}
$pdf->Ln();
$pdf->WriteHTML("<br> <br> <br>");


$pdf->SetFont("Arial","",16);
$t_check=0;
$s = sizeof($a_data_mgmt);
for($j=0;$j<$s;$j++){
  if(!$r_datamgmt[$j])
    continue;
  elseif(!$t_check){
    $pdf->WriteHTML("<b><u>Data Management</u></b> <br> <br>");
    $t_check++;
  }
  $pdf->SetFont("Arial","",14);
    $pdf->WriteHTML("<b>$a_data_mgmt[$j]:</b>");
  
  $temp = explode("\n",$r_datamgmt[$j]);
  $n = sizeof($temp);
  for($i=0;$i<$n;$i++)
     $pdf->WriteHTML("$temp[$i] <br> <br>");
  
}
$t1_check=0;
$s1 = sizeof($a_soft_act);
for($j1=0;$j1<$s1;$j1++){
  if(!$r_softact[$j1])
    continue;
  elseif(!$t1_check){
    $pdf->WriteHTML("<b><u>Software Activities</u></b> <br>");
    $t1_check++;
  }
    $pdf->WriteHTML("<b>$a_soft_act[$j1]:</b>");
  
  $temp1 = explode("\n",$r_softact[$j1]);
  $n1 = sizeof($temp1);
  for($i1=0;$i1<$n1;$i1++)
     $pdf->WriteHTML("$temp[$i1] <br>");
  
}
$pdf->output();



?>









  



