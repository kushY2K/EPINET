<?php
include('auth_session.php'); // Check if logged in
include('db_connect.php');
$record_id=$_SESSION["record_id"];
?>

<!DOCTYPE html>
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
  <script src="js/mpr_draft.js"></script>

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
          <li class="active"><a href="#">Create/Edit Draft</a></li>
          <li><a href="mpr_archive.php">View MPRs</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="auth_logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav> <!-- NAVBAR ENDS -->

  <br><br><br>

  <div id="wait-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Please wait...</h4>
        </div>
        <div class="modal-body">
          <div class="progress progress-striped active">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <p id="waitmsg">Working on request...</p>
        </div>
      </div>
    </div>
  </div>


  <div class="container">

    <!-- First Row : Title & Buttons-->
    <div class="row">
      <div class="col-md-8">
        <div class="h1">Edit MPR</div>
      </div>
      <div class="col-md-4">
        <br>
        <button type="submit" class="btn btn-sm btn-info" onclick="saveMPR(1)" id="btn_savedraft">Save Draft</button>
        <button type="submit" class="btn btn-sm btn-danger" onclick="saveMPR(0)" id="btn_submit">Submit MPR</button>
      </div>
    </div>

    <!-- Second Row : Month & Year -->
    <div class="row">
      <div class="col-md-12">
        <div class="h3" id="month_year">Month - Year</div>
      </div>
    </div>
    <br>

    <!-- Third Row : Message box -->
    <div class="row" id="msg-box" style="display:none">
      <div class="col-md-6 alert alert-dismissible alert-info" id="msg-class">
        <button type="button" onclick="$('#msg-box').hide();" class="close">&times;</button>
        <p id="msg-response"></p>
      </div>
    </div>

    <!-- Fourth Row -->
    <div class="row">

      <!-- Tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_highlights" aria-controls="highlights" role="tab" data-toggle="tab">Highlights</a></li>
        <li role="presentation"><a href="#tab_data_pop_updt_st" aria-controls="data_pop_updt_st" role="tab" data-toggle="tab">Data Population/Updation Status</a></li>
        <li role="presentation"><a href="#tab_data_mgmt" aria-controls="data_mgmt" role="tab" data-toggle="tab">Data Management Activities</a></li>
        <li role="presentation"><a href="#tab_soft_others" aria-controls="soft_others" role="tab" data-toggle="tab">Software & Other Activities</a></li>
      </ul>

      <!-- Tab contents -->
      <form role="form" class="form-horizontal">
        <div class="tab-content">

          <!-- First Tab -->
          <div role="tabpanel" class="tab-pane active" id="tab_highlights"><br>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Highlights</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="highlights"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
          </div> <!-- Highlights Tab -->

          <!-- Second Tab -->
		  <!-- Data Population/updation status Tab-->
          <div role="tabpanel" class="tab-pane" id="tab_data_pop_updt_st">
		  <br>
			<div class="form-group">
              <div class="col-sm-12">
			  <!-- well data -->
              <label class=""><h3>1.Well Data</h3></label><br><br>
				<table class="table table-responsive table-bordered table-striped" id="welldata">
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
					<tbody id="tablebody">
										
					</tbody>
				</table>               
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
				<!--End of well data -->
				
				<!-- Leased Objects -->
				
				<label class=""><h3>2.Leased Objects</h3></label><br><br>
				<table class="table table-responsive table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center"></th>
							<th class="text-center">Total Volume</th>
							<th class="text-center">Data Loaded during the month</th>
							<th class="text-center">Cumulative Data Loaded</th>
							<th class="text-center">Cumulative Data Validated</th>
							<th class="text-center">Data Gaps Identified</th>
							<th class="text-center">Data Gaps Filled</th>
						</tr>
					</thead>
					<tbody>
						<tr id="leased_objects">
						<td>Leased Objects</td>
						</tr>
					</tbody>
					</table>
					
					<!-- Leased Objects -->
					
					<!-- Log data -->
						<label class=""><h3>3.Log Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped" id="log_data">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume</th>
									<th class="text-center">Data Loaded during the month</th>
									<th class="text-center">Cumulative Data Loaded</th>
									<th class="text-center">Cumulative Data Validated</th>
									<th class="text-center">Data Gaps Identified</th>
									<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
							<tbody>
								<tr id="original_logs_in_psl">
									<td>Original Logs in PSL</td>
								</tr>
								<tr id="composite_logs_in_pse">
									<td>Composite Logs in PSE</td>
								</tr>
								<tr id="processed_logs_in_pse">
									<td>Processed Logs in PSE</td>
								</tr>
							</tbody>
						</table>
					<!-- Log data -->
					
					<!-- Seismic Data -->
						<label class=""><h3>4.Seismic Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume(No. of surveys)</th>
									<th class="text-center">Data Loaded during the month</th>
									<th class="text-center">Cumulative Data Loaded</th>
									<th class="text-center">Cumulative Data Validated</th>
									<th class="text-center">Data Gaps Identified</th>
									<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
							<tbody>
								<tr id="2d_navigation_data">
									<td>2D Navigation Data</td>
								</tr>
								<tr id="3d_navigation_data">
									<td>3D Navigation Data</td>
								</tr>
								<tr id="2d_segy_data">
									<td>2D SegY Data</td>
								</tr>
								<tr id="3d_segy_data">
									<td>3D SegY Data</td>
								</tr>
								<tr id="merged_3d_data">
									<td>Merged 3D Data</td>
								</tr>
								<tr id="vsp_td_curve">
									<td>VSP TD Curve</td>
								</tr>
								<tr id="vsp_segy_data">
									<td>VSP SegY Data</td>
								</tr>
							</tbody>
						</table>
					<!-- Seismic Data -->
					
					<!-- Geo-Lab Data -->
						<label class=""><h3>5.Geo-Lab Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume</th>
									<th class="text-center">Data Loaded during the month</th>
									<th class="text-center">Cumulative Data Loaded</th>
									<th class="text-center">Cumulative Data Validated</th>
									<th class="text-center">Data Gaps Identified</th>
									<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
							<tbody>
								<tr id="palynology">
									<td>Palynology</td>
								</tr>
								<tr id="paleontology">
									<td>Paleontology</td>
								</tr>
								<tr id="sedimentology">
									<td>Sedimentology</td>
								</tr>
							</tbody>
						</table>
					<!-- Geo-Lab Data -->
					
					<!-- Geo-Chemical Data -->
						<label class=""><h3>6.Geo-Chemical Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume</th>
									<th class="text-center">Data Loaded during the month</th>
									<th class="text-center">Cumulative Data Loaded</th>
									<th class="text-center">Cumulative Data Validated</th>
									<th class="text-center">Data Gaps Identified</th>
									<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
							<tbody>
								<tr id="source_rock">
									<td>Source Rock (No. of wells)</td>
								</tr>
								<tr id="oil">
									<td>Oil (No. of Samples)</td>
								</tr>
								<tr id="water">
									<td>Water (No. of Samples)</td>
								</tr>
								<tr id="gas">
									<td>Gas (No. of Samples)</td>
								</tr>
								<tr id="surface_surveys">
									<td>Surface Surveys (Area)</td>
								</tr>
								<tr id="core_studies">
									<td>Core Studies (No. of Wells)</td>
								</tr>
								<tr id="pvt_analysis">
									<td>PVT Analysis (No. of Wells)</td>
								</tr>
							</tbody>
						</table>
					<!-- Geo-Chemical Data -->
					
					<!-- Production Data -->
						<label class=""><h3>7.Production Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume</th>
									<th class="text-center">Data Loaded during the month</th>
									<th class="text-center">Cumulative Data Loaded</th>
									<th class="text-center">Cumulative Data Validated</th>
									<th class="text-center">Data Gaps Identified</th>
									<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
							<tbody>
								<tr id="field_production">
									<td>Field Production</td>
								</tr>
								<tr id="field_water_injection">
									<td>Field Water Injection</td>
								</tr>
								<tr id="workover_history">
									<td>Workover History</td>
								</tr>
								<tr id="wss">
									<td>WSS</td>
								</tr>
								<tr id="gas_utilization">
									<td>Gas Utilization</td>
								</tr>
								<tr id="value_added_product">
									<td>Value Added Product</td>
								</tr>
								<tr id="pipeline_data">
									<td>Pipeline Data</td>
								</tr>
								<tr id="artificial_lift">
									<td>Artificial Lift</td>
								</tr>
								<tr id="production_testing">
									<td>Production Testing</td>
								</tr>
							</tbody>
						</table>
					<!-- Production Data -->
					
					<!-- Reservoir Data -->
						<label class=""><h3>8.Reservoir Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Total Volume - Wells</th>
									<th class="text-center">Data Loaded during the month - Wells</th>
									<th class="text-center">Data Loaded during the month - Records</th>
									<th class="text-center">Cumulative Data Loaded - Wells</th>
									<th class="text-center">Cumulative Data Loaded - Records</th>
									<th class="text-center">Cumulative Data Validated - Wells</th>
									<th class="text-center">Data Gaps Identified - Wells</th>
									<th class="text-center">Data Gaps Filled - Wells</th>
								</tr>
							</thead>
							<tbody>
								<tr id="pressure_data">
									<td>Pressure Data</td>
								</tr>
								<tr id="bean_study">
									<td>Bean Study</td>
								</tr>
								<tr id="bhs_interpretation_data">
									<td>BHS Interpretation Data</td>
								</tr>
								<tr id="bhs_sampling_data">
									<td>BHS Sampling Data</td>
								</tr>
								<tr id="gas_lift_survey">
									<td>Gas Lift Survey</td>
								</tr>
								<tr id="echometer_survey">
									<td>Echometer Survey</td>
								</tr>
								<tr id="pvt_studies">
									<td>PVT Studies(Lab Data)</td>
								</tr>
							</tbody>
						</table>
					<!-- Reservoir Data -->
					
					<!-- Drilling data -->
						<label class=""><h3>9.Drilling Data</h3></label><br><br>
						<table class="table table-responsive table-bordered table-striped" id="drillingdata">
							<thead>
								<tr>
								<th class="text-center"></th>
								<th class="text-center">Site Name</th>
								<th class="text-center">Total Volume</th>
								<th class="text-center">Data Loaded during the month</th>
								<th class="text-center">Cumulative Data Loaded</th>
								<th class="text-center">Cumulative Data Validated</th>
								<th class="text-center">Data Gaps Identified</th>
								<th class="text-center">Data Gaps Filled</th>
								</tr>
							</thead>
						<tbody>
						
					</tbody>
				</table>               
     		<!-- Drilling data -->
					
					
					
					
        </div>
    </div>
			

          </div> <!-- End of Data Population/updation status Tab-->

          <!-- Data Management Activities Tab -->
          <div role="tabpanel" class="tab-pane" id="tab_data_mgmt"><br>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Geology</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_geology"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Seismic</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_seismic"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Well Logs</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_welllogs"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Geo-Chemistry</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_geochem"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Geo-Lab</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_geolab"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Reservoir</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_reservoir"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Production</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_production"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Drilling</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="dm_drilling"></textarea>
                <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
          </div> <!-- Data Management Activities Tab -->

          <!-- Software & Other Activities Tab -->
          <div role="tabpanel" class="tab-pane" id="tab_soft_others"><br>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Software Activities</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="software_activities"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Other Activities</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="other_activities"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Constraints</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="constraints"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-sm-2 control-label">Remarks</label>
              <div class="col-sm-10">
                <textarea class="form-control data_header" rows="5" id="remarks"></textarea>
              </div>
            </div>
          </div> <!-- Software & Other Activities Tab -->

        </div> <!-- Tab content -->
      </form>
    </div> <!-- Row -->
  </div> <!-- Main container -->

</body>
</html>
