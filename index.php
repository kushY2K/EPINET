<?php
include('auth_login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: mpr_home.php");
}
?>

<html>
<head>

  <!-- This is the main LOGIN page -->

  <title>EPINET - Monthly Report</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap-theme.min.css">

  <script src="assets/jquery-2.1.1.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="js/login_validation.js" type="text/javascript"></script>  
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <!-- First Row : Title & Buttons-->
    <div class="row">
      <div class="col-md-8 col-md-offset-5">
        <div class="h1">Login</div>
      </div>
    </div>

    <form class="form-horizontal" name="login_form" method="post">
      <div class="row">
        <div class="col-md-5 col-md-offset-3">

            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                  <input type="inputEmail" class="form-control" id="t_username" placeholder="Username" name="username">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="t_password" placeholder="Password" name="password">
                </div>
              </div>
            </fieldset>

        </div>
      </div>

      <div class="row">
        <div class="col-md-8 col-md-offset-7">
          <button class="btn btn-md  btn-info" name="submit" type="submit" value="Login" onclick=validate()>Login</button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="h6" id="msg"></div>
        </div>
      </div>

    </form>

  </div> <!-- Main container -->

</body>
</html>
