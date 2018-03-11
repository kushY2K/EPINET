<?php

include("db_connect.php");
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password']))
  {
    $error = "Username or Password field cannot be empty!";
    echo $error;
  }
  else
  {
    // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];

    // To protect MySQL injection for Security purpose
    // $username = stripslashes($username);
    // $password = stripslashes($password);
    // $username = mysql_real_escape_string($username);
    // $password = mysql_real_escape_string($password);

    // SQL query to fetch information of registerd users and finds user match.
    $result = mysqli_query($connection, "select * from user where password='$password' AND username='$username'");
    // $rows = mysqli_num_rows($query);
    //echo $result;
    if ($result)
    {
      $row=mysqli_fetch_assoc ($result);
      $_SESSION['login_user']=$row['username']; // Initializing Session
      $_SESSION['basin_id']=$row['basin_id']; //Set Basin ID of current user
      header("location: mpr_draft.php"); // Redirecting to home page
    }
    else {
      $error = "Username or Password is invalid!";
      echo $error;
    }
    mysqli_close($connection); // Closing Connection
  }
}
?>
