<!DOCTYPE HTML>
<html>
<head>
  <title>Prisijungimas</title>
  <link href="../styles.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
  <header>
    <img src="./leidykla1.png" height="150" width="550" class="center" />
  </header>
<br>
<br>
  <div class="nav">
    <ul>
      <li >
	      <a href="../../index.php">PAGRINDINIS</a></li>
      <li><a href="../naujienos.php">NAUJIENOS</a></li>
      <li><a href="../leidiniai.php">LEIDINIAI</a></li>
	  <li><a href="../apmokejimas.php">APMOKĖJIMAS</a></li>
      <li><a href="../apie.php">APIE</a></li>
	   <li class="active"><a href="login.php">PRISIJUNGIMAS</a></li>
    </ul>
  </div>

  <?php
    include ('../../dbconnect.php');
    session_start();
    $everyone = 4;
    $startregistration = 0;
    $name = $email = $phone = $username = $password = $pass = "";

    if (isset($_POST['Prisijungti']))                              // prisijungimo tikrinimas
    {
      if ( !empty($_POST['usernameS']) && !empty( $_POST['passwordS']) )
      {
          $nameS = $_POST["usernameS"];
          $passwordS = $_POST["passwordS"];

          // $nameS = mysqli_real_escape_string($con, $_POST["usernameS"]);
          // $passwordS = mysqli_real_escape_string($con, $_POST["passwordS"]);
          if (!$con)
          {
            die("Connect failed:" . mysqli_connect_error());
          }
          $sqluser = "SELECT id FROM users WHERE username='$nameS' AND password='$passwordS'";
          $result = mysqli_query($con, $sqluser);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          //$active = $row['active'];                                  // nezinau ar sito reikia
          $count = mysqli_num_rows($result);

          if ( $count ==1 )
          {
            $_SESSION['login_user'] = $nameS;

            include("../../inside/welcome.php");

             // echo  "<p> Teisingai ivedėte prisijungimo varda ir slaptažodį! <p>";
          }
          else
          {
            echo  "<p> Neteisingai ivedėte prisijungimo varda ar slaptažodį! <p>";
          }
       }
       else
       {
         echo  "<p> Jeigu norite prisijungti turite įvesti prisijungimo varda ir slaptažodį! <p>";
       }
    }

    elseif (isset($_POST['Registruotis']))                          // registracijos tikrinimas
    {
      if (!empty(trim( $_POST['name'])))
      {
          $name = $_POST["name"];
          if (!preg_match("/^[a-zA-ZĄąČčĘęĖėĮįŠšŲųŪūŽž ]*$/",$name))
          {
             echo  "<p> Neteisingai ivedėte varda ir pavarde! <p>";
          }
          elseif ( strlen($name) < 2 )
          {
            echo "<p> Neteisingai ivedėte varda ir pavarde, jis negali būti toks trumpas! <p>";
          }
          elseif ( strlen($name) > 100)
          {
            echo "<p> Neteisingai ivedėte varda ir pavarde, jis negali būti toks ilgas! <p>";
          }
          else
          {
               ++$startregistration;
          }
       }
       else
       {
         echo  "<p> Būtinai turite įvesti savo varda ir pavarde! <p>";
       }
       if (!empty(trim( $_POST['mail'])))
       {
          $email = $_POST["mail"];
          if (!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/",$email))
          {
             echo  "<p> Neteisingai ivedėte el. paštą! <p>";
          }
          elseif ( strlen($email) < 2 )
          {
            echo "<p> Neteisingai ivedėte el. paštą, jis negali būti toks trumpas! <p>";
          }
          elseif ( strlen($email) > 100)
          {
            echo "<p> Neteisingai ivedėte el. paštą, jis negali būti toks ilgas! <p>";
          }
          else
          {
               ++$startregistration;
          }
       }
       else
       {
         echo  "<p> Būtinai turite įvesti el. paštą! <p>";
       }
       if (!empty(trim( $_POST['phone'])))
       {
          $phone = $_POST["phone"];
          if (!preg_match("/^[0-9]*$/",$phone))
          {
             echo  "<p> Neteisingai ivedėte telefono numerį, jį gali sudaryti tik skaičiai! <p>";
          }
          elseif ( strlen($phone) < 5 )
          {
            echo "<p>Neteisingai ivedėte telefono numerį, jis negali būti toks trumpas! <p>";
          }
          elseif ( strlen($phone) > 20)
          {
            echo "<p> Neteisingai ivedėte telefono numerį, jis negali būti toks ilgas! <p>";
          }
          else
          {
               ++$startregistration;
          }
       }
       else
       {
         echo  "<p> Būtinai turite įvesti telefono numerį! <p>";
       }
       if (!empty(trim( $_POST['username'])))
       {
          $username = $_POST["username"];
          if (!preg_match("/^[a-zA-Z1234567890]*$/",$username))
          {
             echo "<p> Neteisingai ivedėte prisijungimo varda, jį gali sudaryti tik raidės ir skaičiai! <p>";
          }
          elseif ( strlen($username) < 5 && strlen($username) > 100 )
          {
            echo "<p>Neteisingai ivedėte prisijungimo varda, jis turi b8ti netumpesnis negu 5 ženklai ir neilgesnis negu 100 ženklų! <p>";
          }
          else
          {
               ++$startregistration;
          }
        }
        else
        {
           echo  "<p> Būtinai turite įvesti savo prisijungimo varda! <p>";
        }
        if (!empty(trim( $_POST['password'])) && !empty(trim( $_POST['pass'])) && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['password']) )
        {
              // at least one lowercase char
              // at least one uppercase char
              // at least one digit
              // at least one special sign of @#-_$%^&+=§!?
            $password = $_POST["password"];
            $pass = $_POST["pass"];
            if ( $pass != $password )
            {
               echo  "<p> Neteisingai pakartojote slaptažodį! <p>";
            }
            elseif ( strlen($password) < 5 && strlen($password) > 20 )
            {
              echo "<p> Neteisingai ivedėte slaptažodį, jį gali sudaryti nuo 5 iki 20 ženklaų! <p>";
            }
            else
            {
                 ++$startregistration;
            }
        }
        else
        {
          echo  "<p> Būtinai turite įvesti slaptažodį ir jį pakartoti, be to slaptažodį turi sudaryti nuo 8 iki 20 ražmenų į kuriuos turi įeiti: bent vienas mažas ir didelis žianklas, bent vienas skaičius ir bent vienas spacialus ženklas(@#-_$%^&+=§!)! <p>";
        }
    }
    // else                                                      // PATIKRINIMUI!!!!!
    // {
    //   echo "<p> Niekas nepasirinkta!!! </p>";
    // }
    if( isset($_POST['Registruotis']) && $startregistration == 5 )                        // cia tikrinu ar viskas suvesta gerai ir tada duomenis parduodu i duomenu baze
    {
        $number_of_same_results =0;
        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' OR phone = '$phone' OR name = '$name' ";  // istryniau LIMIT 1
        if ( $sameresult = mysqli_query($con, $user_check_query) )
        {
            $number_of_same_results = mysqli_num_rows($sameresult);
        }
        else
        {
          $number_of_same_results = 0;
        }
        if ( $number_of_same_results > 0 )
        {
            echo "<p> Vartotojas tokiais duomenimis jau egzistuoja! $number_of_same_results </p>";
        }
        else
        {
          $query = "INSERT INTO users (name, email, phone, username, password) VALUES('$name', '$email', '$phone', '$username', '$password')";
          if( mysqli_query($con, $query) )
          {
              // $_SESSION['username'] = $username;
              // $_SESSION['success'] = "<p> Dabar esate prisijunge! </p>";
              // //header('location: ../../inside/welcome.php');
              // include('../../inside/welcome.php');
              echo "<p> Jūs sėkmingai užsiregistravote! </p>";
          }
          else
          {
            echo "<br> Erroe: " . $query . "<br>" . mysqli_error($con);
          }
        }
    }
   ?>

<!-- </head>
    <body> -->
      <div class="login-wrap">
      <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Prisijungti</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registruotis</label>
        <div class="login-form">
          <form class="sign-in-htm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="group">
              <label for="user" class="label">Vartotojo vardas</label>
              <input id="usernameS" name="usernameS" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Slaptažodis</label>
              <input id="passwordS" name="passwordS" type="password" class="input" data-type="password" required>
            </div>
            <!-- <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Prisiminti?</label>
            </div> -->
            <div class="group">
              <input type="submit" class="button" name="Prisijungti" value="Prisijungti">
            </div>
            <div class="hr"></div>
            <!-- <div class="foot-lnk">
              <a href="#forgot">Pamiršai slaptažodį?</a>
            </div> -->
          </form>
          <form class="sign-up-htm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="group">
              <label for="user" class="label">vardas ir pavardė</label>
              <input id="name" name="name" type="text" class="input" placeholder="Petras Petraitis..." required>
            </div>
            <div class="group">
              <label for="user" class="label">el. paštas </label>
              <input id="mail" name="mail" type="email" class="input" placeholder="petras@petirco.lt..." required>
            </div>
            <div class="group">
              <label for="user" class="label">Jūsų telefono numeris</label>
              <input id="phone" name="phone" type="tel" class="input" placeholder="861234567..." required>
            </div>
            <div class="group">
              <label for="user" class="label">Prisijungimo vardas</label>
              <input id="username" name="username" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Slaptažodis</label>
              <input id="password" name="password" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Pakartoti Slaptažodį</label>
              <input id="pass" name="pass" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <input type="submit" class="button" name="Registruotis" value="Registruotis">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
            </div>
          </form>
        </div>
      </div>
    </div>
    </body>
<footer>
<div id="apacia">
    <div id="apaciatekstui">
        <div id="apaciatekstui1">
        <h3>Paslaugos</h3>
          <ul>
            <li><span class="class2"><a href="../../index.php">Knygų spausdinimas</a></span></li>
            <li><span class="class2"><a href="../../index.php">Reklaminių lankstinukų ruošimas</a></span></li>
            <li><span class="class2"><a href="../../index.php">Laikraščių spausdinimas</a></span></li>
          </ul>
      </div>
        <div id="apaciatekstui2">
        </div>
        <div id="apaciatekstui3">
            <h3>Kontaktai</h3>
            <ul>
              <li style="font-size: 10">Pramonės pr. 20, Kaunas</a></li>
              <li style="font-size: 10">Tel. +370 111 1111</li>
              <li><span class="class2"><a href="http://www.facebook.com/">Facebook grupė</a></span></li>
            </ul>
        </div>
		<br>
        <h4 style="font-family:arial;"><center>©2019|Leidykla.tk</center></h4>
    </div>
</div>
</footer>
</body>
</html>
