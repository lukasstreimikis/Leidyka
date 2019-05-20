<!DOCTYPE HTML>
<html>
<head>
  <title>Leidykla</title>
  <link href="forms/styles.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
   <header>
   <img src="forms/foto/leidykla.png" height="150" width="550" class="center" />
   </header>
   <br>
   <br>
     <div class="nav">
       <ul>
         <li class="active">
           <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">PAGRINDINIS</a></li>
         <li><a href="forms/naujienos.php">NAUJIENOS</a></li>
         <li><a href="forms/leidiniai.php">LEIDINIAI</a></li>
       <li><a href="forms/apmokejimas.php">APMOKĖJIMAS</a></li>
         <li><a href="forms/apie.php">APIE</a></li>
        <li><a href="forms/login/login.php">PRISIJUNGIMAS</a></li>
       </ul>
     </div>
   <br>
   </div>
<br>
  <div id="turiniovidus">
    <font color="black">
	<img src="forms/foto/bookcover.jpg" class="center" /> <br>
  <img src="forms/foto/lor.jpg" class="center" />
    </font>
  </div>
</div>
    </div>
   </div>
<br>
<footer>
  <?php
    include ('forms/footer.html');
   ?>
</footer>
</body>
</html>
