<?php
   include('session.php');
   include('../dbconnect.php');
?>
<html>
   <head>
      <title>Registracija </title>
      <link href="../forms/styles.css" rel="stylesheet" type="text/css" media="screen"/>
   </head>
   <body>

     <br>
       <div class="nav">
         <ul>
           <li>
             <a href="new.php">PAGRINDINIS</a></li>
           <li><a href="view.php">PERŽIŪRĖTI</a></li>
           <li class="active"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">REGISRTUOTI</a></li>
         </ul>
       </div>
     <br>

      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
      <?php
      $startregisterp=0;
        include('reg.html');
        if ( isset($_POST['Registuoti']) )
        {
          if (empty(trim($_POST['name'])))
          {
             echo "<p> Projekto pavadinimas yra privalomas! <p>";
          }
          else
          {
            $projectname = $_POST['name'];
            if (!preg_match("/^[a-zA-Z ]*$/",$projectname))
            {
              echo "<p> Neteisingai ivedėte projekto pavadinimą! <p>";
            }
            elseif ( strlen($projectname) < 2 )
            {
              echo "<p> Neteisingai ivedėte projekto pavadinimą, jis negali buti toks trumpas! <p>";
            }
            elseif ( strlen($projectname) > 100)
            {
              echo "<p> Neteisingai ivedėte projekto pavadinimą, jis negali buti toks ilgas! <p>";
            }
            else
            {
              ++$startregisterp;
            }
          }
          if (empty(trim($_POST['coment'])))
          {
             echo "<p> Projekto pavadinimas yra privalomas! <p>";
          }
          else
          {
            $projectcoment = $_POST['coment'];
            if ( strlen($projectcoment) < 2 )
            {
              echo "<p> Neteisingai ivedėte projekto pavadinimą, jis negali buti toks trumpas! <p>";
            }
            elseif ( strlen($projectcoment) > 100)
            {
              echo "<p> Neteisingai ivedėte projekto pavadinimą, jis negali buti toks ilgas! <p>";
            }
            else
            {
              ++$startregisterp;
            }
          }
        }
        if ( $startregisterp == 2 && isset($_POST['Registuoti']) )
        {
            $startregisterp=0;
            $projectnameEND = ucfirst(trim($_POST["name"]));
            $projectcomentEND = trim($_POST["coment"]);
            if (!$con)
            {
              die("Connect failed:" . mysqli_connect_error());
            }
            $sqlsameproject = "SELECT * FROM projekt WHERE pname='$projectnameEND'  OR coment='$projectcomentEND' ";
            if($sameprojektresults = mysqli_query($con, $sqlsameproject))
            {
                $number_of_same_resultsp = mysqli_num_rows($sameprojektresults);
            }
            else
            {
              $number_of_same_resultsp = 0;
            }
            if ( $number_of_same_resultsp > 0 )
            {
              echo "<p> Projektas tokiu pavadinimu jau yra uzregistruotas! <p>";
            }
            else
            {
              $sqlproject = "INSERT INTO projekt (author_name, pname, coment) VALUES ('$login_session', '$projectnameEND', '$projectcomentEND')";
              if (mysqli_query($con, $sqlproject))
              {
                echo "<br> Duomenys buvo sėkmingai įvesti <br>";
              }
              else
              {
                  echo "<br> Erroe: " . $sqlproject . "<br>" . mysqli_error($con);
              }
            }
        }
       ?>

   <footer>
   <div id="apacia">
       <div id="apaciatekstui">
           <div id="apaciatekstui1">
         </div>
           <div id="apaciatekstui2">
             <h3>Kontaktai</h3>
             <ul>
               <li style="font-size: 10">Pramonės pr. 20, Kaunas</a></li>
               <li style="font-size: 10">Tel. +370 111 1111</li>
               <li><span class="class2"><a href="http://www.facebook.com/">Facebook grupė</a></span></li>
             </ul>
           </div>
           <div id="apaciatekstui3">
           </div>
   		<br>
           <h4 style="font-family:arial;"><center>©2019|Leidykla.tk</center></h4>
       </div>
   </div>
   </footer>
 </body>
</html>
