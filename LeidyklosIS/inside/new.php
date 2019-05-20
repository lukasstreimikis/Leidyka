<?php
   include('session.php');
?>
<html>
   <head>
      <title>Welcome </title>
      <link href="../forms/styles.css" rel="stylesheet" type="text/css" media="screen"/>
   </head>
   <body>

     <br>
       <div class="nav">
         <ul>
           <li class="active">
             <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">PAGRINDINIS</a></li>
           <li><a href="view.php">PERŽIŪRĖTI</a></li>
           <li><a href="registration.php">REGISRTUOTI</a></li>
         </ul>
       </div>
     <br>

      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "logout.php">Sign Out</a></h2>

   </body>
</html>
