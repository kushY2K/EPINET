<?php
include("auth_session.php");

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
	
	//Store record_id in session variable
    $_SESSION["record_id"] = $new_record_id;
	
	//Execute query for data_header
    $insert_query_data_header="insert into data_header (record_id, basin_id, month_year, draft) VALUES ($new_record_id, $basin_id, '$sql_month_year' , 1)";
    $result_data_header = mysqli_query($connection, $insert_query_data_header);
	
	//Execute query for data_sites
	$sql_sites = "Select * from sites where basin_id=$basin_id";
	$result_sites = $connection->query($sql_sites);
	while($row_sites = $result_sites->fetch_assoc()) {
		$site_id = $row_sites["site_id"];
	$insert_query_data_sites="insert into data_sites (site_id, record_id, basin_id) VALUES ($site_id, $new_record_id, $basin_id)";
	$result_data_sites = mysqli_query($connection, $insert_query_data_sites);
	}
	
	//Execute query for data_basin leased_objects
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'leased_objects')";
	$result_data_baisn_lo = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin original_logs_in_psl
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'original_logs_in_psl')";
	$result_data_baisn_db = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin composite_logs_in_pse
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'composite_logs_in_pse')";
	$result_data_baisn_clp = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin processed_logs_in_pse
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'processed_logs_in_pse')";
	$result_data_baisn_plp = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin 2d_navigation_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, '2d_navigation_data')";
	$result_data_baisn_2dnd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin 3d_navigation_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, '3d_navigation_data')";
	$result_data_baisn_3dnd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin 2d_segy_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, '2d_segy_data')";
	$result_data_baisn_2dsd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin 3d_segy_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, '3d_segy_data')";
	$result_data_baisn_3dsd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin merged_3d_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'merged_3d_data')";
	$result_data_baisn_m3d = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin vsp_td_curve
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'vsp_td_curve')";
	$result_data_baisn_vtc = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin vsp_segy_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'vsp_segy_data')";
	$result_data_baisn_vsd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin palynology
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'palynology')";
	$result_data_baisn_p = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin paleontology
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'paleontology')";
	$result_data_baisn_pp = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin sedimentology
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'sedimentology')";
	$result_data_baisn_s = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin source_rock
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'source_rock')";
	$result_data_baisn_sr = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin oil
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'oil')";
	$result_data_baisn_o = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin water
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'water')";
	$result_data_baisn_w = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin gas
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'gas')";
	$result_data_baisn_g = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin surface_surveys
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'surface_surveys')";
	$result_data_baisn_ss = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin core_studies
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'core_studies')";
	$result_data_baisn_cs = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin pvt_analysis
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'pvt_analysis')";
	$result_data_baisn_pa = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin field_production
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'field_production')";
	$result_data_baisn_fp = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin field_water_injection
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'field_water_injection')";
	$result_data_baisn_fwi = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin workover_history
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'workover_history')";
	$result_data_baisn_wh = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin wss
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'wss')";
	$result_data_baisn_wss = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin gas_utilization
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'gas_utilization')";
	$result_data_baisn_gu = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin value_added_product
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'value_added_product')";
	$result_data_baisn_vap = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin pipeline_data
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'pipeline_data')";
	$result_data_baisn_pd = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin artificial_lift
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'artificial_lift')";
	$result_data_baisn_al = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin production_testing
	$insert_query_data_basin = "insert into data_basin (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'production_testing')";
	$result_data_baisn_pt = mysqli_query($connection, $insert_query_data_basin); 
	
	//Execute query for data_basin reservoir_data_pressure_data
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'pressure_data')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);

	//Execute query for data_basin reservoir_data_bean_study
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'bean_study')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);	
	
	//Execute query for data_basin reservoir_data_bhs_interpretation_data
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'bhs_interpretation_data')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);
	
	//Execute query for data_basin reservoir_data_bhs_sampling_data
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'bhs_sampling_data')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);
	
	//Execute query for data_basin reservoir_data_gas_lift_survey
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'gas_lift_survey')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);
	
	//Execute query for data_basin reservoir_data_echometer_survey
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'echometer_survey')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);
	
	//Execute query for data_basin reservoir_data_pvt_studies
	$insert_query_data_basin = "insert into data_basin_reservoir_data (record_id, basin_id, data_class) VALUES ($new_record_id, $basin_id, 'pvt_studies')";
	$result_data_baisn_rd = mysqli_query($connection, $insert_query_data_basin);
	
	//Execute query for data_sites_drilling_data
	$sql_sites_dd = "Select * from sites where basin_id=$basin_id";
	$result_sites_dd = $connection->query($sql_sites);
	while($row_sites_dd = $result_sites_dd->fetch_assoc()) {
		$site_id_dd = $row_sites_dd["site_id"];
	$insert_query_data_sites_dd="insert into data_sites_drilling_data (site_id, record_id, basin_id) VALUES ($site_id_dd, $new_record_id, $basin_id)";
	$result_data_sites_dd = mysqli_query($connection, $insert_query_data_sites_dd);
	}
	
	
	
    if(mysqli_error($connection)){
      //Change this later
      echo mysqli_error($connection);
    }

    //Return Month and year
    echo $new_month_year;

    
  }


}

/*-- FETCH MODE --*/
elseif($mode=="fetch"){
  //echo "fetching...";
	$basin_id=$_SESSION['basin_id'];
	$record_id = $_SESSION["record_id"]; //Get from session variable
	$myArray = array();
	$result_data_header = mysqli_query($connection, "SELECT * FROM data_header WHERE record_id=$record_id");
	while($row_data_header = $result_data_header->fetch_array(MYSQL_ASSOC)){
		$myArray['data_header'] = array($row_data_header);
    }
	$sql_sites="Select * from sites where basin_id=$basin_id";
	$result_sites=$connection->query($sql_sites);
	while($row_sites = $result_sites->fetch_array(MYSQL_ASSOC)){
		$site_id = $row_sites['site_id'];
		$myArray['sites'][] = array($row_sites);
		$sql_data_sites="select * from data_sites where site_id=$site_id and record_id=$record_id";
		$result_data_sites=$connection->query($sql_data_sites);
		$sql_data_sites_dd="select * from data_sites_drilling_data where site_id=$site_id and record_id=$record_id";
		$result_data_sites_dd=$connection->query($sql_data_sites_dd);
		while($row_data_sites = $result_data_sites->fetch_array(MYSQL_ASSOC)) {
			$myArray['data_sites'][] = array($row_data_sites);
		}
		while($row_data_sites_dd = $result_data_sites_dd->fetch_array(MYSQL_ASSOC)) {
			$myArray['data_sites_dd'][] = array($row_data_sites_dd);
		}
	}
	$result_data_basin = mysqli_query($connection, "SELECT * FROM data_basin WHERE record_id=$record_id");
	while($row_data_basin = $result_data_basin->fetch_array(MYSQL_ASSOC)){
		$myArray['data_basin'][] = array($row_data_basin);
    }
	$result_data_basin_rd = mysqli_query($connection, "SELECT * FROM data_basin_reservoir_data WHERE record_id=$record_id");
	while($row_data_basin_rd = $result_data_basin_rd->fetch_array(MYSQL_ASSOC)){
		$myArray['data_basin_rd'][] = array($row_data_basin_rd);
    }
	
  echo json_encode($myArray);
}

?>
