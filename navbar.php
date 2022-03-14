<?php
include 'config.php';

error_reporting(0);

session_start();

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
        <ul>
          <li><a href="/home">Top Filmes</a></li>
          <li><a href="/products">Top Seris</a></li>
          <li><a href="/about">Sobre nos</a></li>
          <li id="login"> <?php echo "<a href="login_register/login.php" >Login</a>" ?></li>
          <li id="signup"><a href="login_register/register.php">Registar</a></li>
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
          <li id="login"><a href="login_register/login.php" >Login</a></li>
          <li id="signup"><a href="/signup">Registar</a></li>
        </ul>
      </div>
    </header>
    <script src="index.js"></script>
  </body>
</html>

