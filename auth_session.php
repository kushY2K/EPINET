<?php

include("db_connect.php"); // Establishing Connection with Server
session_start(); // Starting Session

// // Storing Session
// $user_check=$_SESSION['login_user'];
//
// // SQL Query To Fetch Complete Information Of User
// $ses_sql=mysqli_query($connection, "select username from user where username='$user_check'");
// $row = mysqli_fetch_assoc($ses_sql);
// $login_session=$row['username'];

if(!isset($_SESSION['login_user'])){
  //mysql_close($connection); // Closing Connection
  header('Location: index.php'); // Redirecting To Home Page
}
else{
  //echo "Logged in!";
}
?>
