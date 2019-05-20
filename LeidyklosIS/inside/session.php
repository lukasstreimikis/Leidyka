<?php

    $con = mysqli_connect("localhost","root","");
    mysqli_select_db($con, "database_12345");
    if(!isset($_SESSION))
    {
        session_start();
    }
   if (!empty($_SESSION['login_user']))
   {
      $user_check = $_SESSION['login_user'];
   }
   else
   {
      $user_check = $_SESSION['username'];
   }

   $ses_sql = mysqli_query($con,"SELECT username FROM users WHERE username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user']))
   {
      header("../../inside/logout.php");
      die();
   }
?>
