<?php
   include('session.php');
   include('../dbconnect.php');
?>
<html>
   <head>
      <title>Peržiųra </title>
      <link href="../forms/styles.css" rel="stylesheet" type="text/css" media="screen"/>
   </head>
   <body>

     <br>
       <div class="nav">
         <ul>
           <li>
             <a href="new.php">PAGRINDINIS</a></li>
           <<li class="active"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">PERŽIŪRĖTI</a></li>
           <li><a href="registration.php">REGISRTUOTI</a></li>
         </ul>
       </div>
     <br>

      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "logout.php">Sign Out</a></h2>

      <?php
      $sqlprojekt = "SELECT * FROM projekt WHERE author_name='$login_session'";
      $resultprojekt = mysqli_query($con, $sqlprojekt);
      $number_of_results = mysqli_num_rows($resultprojekt);
      ?>
      <div align="center">
        <?php
        if ( $number_of_results==0 )
        {
            echo "<br> Jūs nesate užregistravęs jokių projektų! <br>";
        }
        else
        {?>
                <table>
                  <tr>
                    <th> Projekto pavadinimas </th>
                    <th> Aprašymas </th>
                    <th> Registracijos data </th>
                  </tr>
          <?php
            while ($row = mysqli_fetch_array($resultprojekt))
            {?>
                  <tr>
                    <td align="center"> <?php echo $row['pname']; ?> </a> </td>
                    <td align="center"> <?php echo $row['coment']; ?> </a> </td>
                    <td align="center"> <?php echo $row['data']; ?> </a> </td>
                  </tr>
                <br>
    <?php }
      ?>
    </table>
    <br>
<?php }
    ?>

      </div>

   </body>
</html>
