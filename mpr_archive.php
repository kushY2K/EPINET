<?php
include('auth_session.php'); // Check if logged in
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
  <link rel="stylesheet" href="assets/datatables.min.css">

  <script src="assets/jquery-2.1.1.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/datatables.min.js"></script>
  <script src="js/mpr_archive.js"></script>
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
          <li class="active"><a href="#">View MPRs</a></li>
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
          <p id="waitmsg">Loading...</p>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <!-- First Row : Heading -->
    <div class="row">
      <div class="col-md-8">
        <div class="h1">View MPR</div>
      </div>
      <div class="col-md-4">
        <br>
        <!-- <button type="submit" class="btn btn-sm btn-warning" onclick="test()" id="btn_test">Test</button> -->
      </div>
    </div>

    <!-- Second Row : Table -->
    <div class="row">
      <div class="col-md-12">
        <table id="mprtable" class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Month & Year</th>
              <th>Date of Submission</th>
              <th>Status</th>
              <th>View</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>

  </div> <!-- Main container -->

</body>
</html>
