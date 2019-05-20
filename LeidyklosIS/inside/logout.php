<?php
    $status = session_status();
    if($status == PHP_SESSION_NONE){
        //There is no active session
        session_start();
    }else
    if($status == PHP_SESSION_DISABLED){
        //Sessions are not available
    }else
    if($status == PHP_SESSION_ACTIVE){
        //Destroy current and start new one
        session_destroy();
    }
    header("Location:../index.php");
   // if(session_destroy())
   // {
   //    header("Location: ../forms/login/login.php");
   // }
?>
<html>
   <head>
      <title>Goodbye </title>
   </head>
   <body>
      <h2><a href = "../index.php">Sign Out</a></h2>
   </body>
</html>
