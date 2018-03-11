<?php include("db_connect.php") ?>
<html>
<head>
<link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap-theme.min.css">

  <script src="assets/jquery-2.1.1.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
	
	
	
	 			$(".edit_well_data").change(function() {
				var site_id=$(this).attr('id');
			
			var	UBHI = $("#UBHI_"+site_id).val();
			var dataString = "site_id=" + site_id + "&UBHI=" + UBHI ;
			$.ajax({
			type : "POST" ,
			url : "db_save_well_data.php" ,
			data : dataString ,
			cache: false,
			success: function(html)
			{
			}
			
		});
		
	});
	
	
			
  });
  </script

</head>
<body>
<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th class="text-center"></th>
							<th class="text-center">Site Name</th>
							<th class="text-center">UBHI</th>
							<th class="text-center">UBHI Added</th>
							<th class="text-center">Total Volume</th>
							<th class="text-center">Data Loaded during the month</th>
							<th class="text-center">Cumulative Data Loaded</th>
							<th class="text-center">Cumulative Data Validated</th>
							<th class="text-center">Data Gaps Identified</th>
							<th class="text-center">Data Gaps Filled</th>
						</tr>
					</thead>
					<tbody>
					
						<?php	$basin_id = "2";//$_SESSION['basin_id'];
								$record_id="2021970";//$_SESSION["record_id"];
								$sql_sites = "Select * from sites where basin_id=$basin_id";
								$result_sites = $connection->query($sql_sites);
								$i=0; //for indexing of rows
								while($row_sites = $result_sites->fetch_assoc()) {
									$i++;
									$site_id = $row_sites["site_id"]; ?>
									<tr id="<?php echo $site_id ; ?>" class="edit_well_data">
										<td><?php echo $i ;?></td>
										<td> <?php echo $row_sites["site_name"] ;?></td>
										<?php	$sql_data_sites = "select * from data_sites where site_id = $site_id and record_id=$record_id";
												$result_data_sites = $connection->query($sql_data_sites);
												while($row_data_sites = $result_data_sites->fetch_assoc()) {
												$UBHI = $row_data_sites["ubhi"];
												$UBHI_added = $row_data_sites["ubhi_added_during_month"];
												$Total_volume = $row_data_sites["total_volume"];
												$Data_loaded_month = $row_data_sites["data_loaded_month"];
												$Cumulative_loaded = $row_data_sites["cumulative_data_loaded"];
												$Cumulative_validated = $row_data_sites["cumulative_data_validated"];
												$data_gaps_identified = $row_data_sites["data_gaps_identified"];
												$data_gaps_filled = $row_data_sites["data_gaps_filled"];
									
										?>
											/*<td><input type="text" class="form-control" value="<?php echo $UBHI ;?>" id="UBHI_<?php echo $site_id ; ?>" ></td>
											<td><input type="text" class="form-control" value="<?php echo $UBHI_added ;?>"  id="UBHI_added_<?php echo $site_id ; ?>"></td>
											<td><input type="text" class="form-control" value="<?php echo $Total_volume ;?>" id="Total_volume_<?php echo $site_id ; ?>"></td>
											*/<td><input type="text" class="form-control" value="<?php echo $Data_loaded_month ;?>" id="Data_loaded_month_<?php echo $site_id ; ?>"></td>
											<td><input type="text" class="form-control" value="<?php echo $Cumulative_loaded ;?>" id="Cumulative_loaded_<?php echo $site_id ; ?>"></td>
											<td><input type="text" class="form-control" value="<?php echo $Cumulative_validated ;?>" id="Cumulative_validated_<?php echo $site_id ; ?>"></td>
											<td><input type="text" class="form-control" value="<?php echo $data_gaps_identified ;?>" id="Data_identified_<?php echo $site_id ; ?>"></td>
											<td><input type="text" class="form-control" value="<?php echo $data_gaps_filled ;?>" id="Data_filled_<?php echo $site_id ; ?>"></td>
							
									</tr>
						<?php 	}	} ?>
					</tbody>
				</table>               