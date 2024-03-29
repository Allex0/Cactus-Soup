<?php
include 'login_register/config.php';
include 'paths.php';


error_reporting(0);

session_start();

//Set the session duration for 5 seconds

$duration = 600;

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
    <link rel="stylesheet" href="css/dropdown.css">
    <style>
      
    </style>
  </head>
  <body>
    <header id="all">
      <div id="brand"><a href="/cactus-soup/main.php">Cactus Soup</a></div>
      <nav>
        <ul id="float-left" class="ul">
          <li><a href="<?php echo top_filmes ?>">Top Filmes</a></li>
          <li><a href="<?php echo top_seris ?>">Top Séries</a></li>
           
            <?php 
              $id_user = $_SESSION['id'];
              $username = $_SESSION['username'];
              if (isset($_SESSION['username'])) 
              {
                echo '<li class=""><div class="dropdown">
                <button class="dropbtn"><a href="'.profile_page.'?id=';echo $id_user; echo '"> ' . $username . ' </a></button>
                <div class="dropdown-content">
                  <a href="'.profile_page.'?id=';echo $id_user; echo '">Perfil</a>
                  <a href="'.logout.'">Logout</a>
                </div>
                </div>';
                
              }
              else
              {
                echo'<li id="login"> <a href="/cactus-soup/login_register/login.php" >Login</a> </li>';
              }
            ?>

            <?php 
              if (isset($_SESSION['username'])) 
              {
                
              }
              else
              {
                echo'<li id="signup"> <a href="/cactus-soup/login_register/register.php" >Registar</a> </li>';
              }
            ?>
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div id="bar1"></div>
        <div id="bar2"></div>
        <div id="bar3"></div>
        <ul id="mobile-menu">
          <li><a href="/home">Top Filmes</a></li>
          <li><a href="/products">Top Séries</a></li>

          <?php 
              if (isset($_SESSION['username'])) 
              {
                echo '<li> <a href="#">Perfil</a></li>';
              }
              else
              {
                echo'<li id="login"> <a href="../login_register/login.php" >Login</a> </li>';
              }
            ?>

          <?php 
              if (isset($_SESSION['username'])) 
              {
                
              }
              else
              {
                echo'<li id="signup"> <a href="../login_register/login.php" >Registar</a> </li>';
              }
            ?>
        </ul>
      </div>
    </header>
    <script src="index.js"></script>
  </body>
</html>

