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

  <script src="assets/jquery-2.1.1.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
   <style>
            
            img{
                float: right;
                margin: 10px;

            }
            p{
               text-align: justify;
              }


        </style>
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
        <a class="navbar-brand" href="#">EPINET Monthly Progress Report</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="mpr_draft.php">Create/Edit Draft</a></li>
          <li><a href="mpr_archive.php">View MPRs</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="auth_logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav> <!-- NAVBAR ENDS -->

  <br><br><br>
  <div class="container">

    <!-- First Row : Title & Buttons-->
   <!--  //<div class="row">
      <div class="col-md-8"> -->
        <div class="navbar-header" width="100%"><h1 style="text-align: center;">Welcome To EPINET Monthly Progress Report Dehradun</h1>
        <p>
            <a href="http://localhost/mpr"><img src="assets/ONGC-Dehradun.jpg" alt="Author" title="ONGC KDMIPE"/></a>
          <br>
          <br> 
          <br>
          <br> 
          <h4> Exploration & Production Information Network (EPINET) </h4></p>
         </div>
     <!--  </div>
    </div>
 -->
</div> <!-- Main container -->

</body>
</html>
