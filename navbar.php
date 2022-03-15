<?php
include 'login_register/config.php';

error_reporting(0);

session_start();

//Set the session duration for 5 seconds

$duration = 60;

//Read the request time of the user

$time = $_SERVER['REQUEST_TIME'];


//Check the user's session exist or not

if (isset($_SESSION['LAST_ACTIVITY']) &&

   ($time - $_SESSION['LAST_ACTIVITY']) > $duration) {

    //Unset the session variables

    session_unset();

    //Destroy the session

    session_destroy();

    //Start another new session

    session_start();

    //echo "<script> alert('Session is created');</script>";

}

else
{    
  // echo "Current session exists.<br/>";  
}

//Set the time of the user's last activity

$_SESSION['LAST_ACTIVITY'] = $time;

?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/navbar.css" />
    <title>Navigation bar</title>
  </head>
  <body>
    <header>
      <div id="brand"><a href="main.php">Cactus Soup</a></div>
      <nav>
        <ul class="float-left">
          <li><a href="/home">Top Filmes</a></li>
          <li><a href="/products">Top Seris</a></li>
          <li><a href="/about">Sobre nos</a></li>
           
            <?php 
              if (isset($_SESSION['username'])) 
              {
                echo '<li> <a href="#">Perfil</a></li>';
              }
              else
              {
                echo'<li id="login"> <a href="login_register/login.php" >Login</a> </li>';
              }
            ?>

            <?php 
              if (isset($_SESSION['username'])) 
              {
                
              }
              else
              {
                echo'<li id="signup"> <a href="login_register/register.php" >Registar</a> </li>';
              }
            ?>
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
          <li><a href="/home">Top Filmes</a></li>
          <li><a href="/products">Top Seris</a></li>
          <li><a href="/about">Sobre Nos</a></li>

          <?php 
              if (isset($_SESSION['username'])) 
              {
                echo '<li> <a href="#">Perfil</a></li>';
              }
              else
              {
                echo'<li id="login"> <a href="login_register/login.php" >Login</a> </li>';
              }
            ?>

          <?php 
              if (isset($_SESSION['username'])) 
              {
                
              }
              else
              {
                echo'<li id="signup"> <a href="login_register/login.php" >Registar</a> </li>';
              }
            ?>
        </ul>
      </div>
    </header>
    <script src="index.js"></script>
  </body>
</html>

