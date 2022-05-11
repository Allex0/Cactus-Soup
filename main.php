<?php 
    include("./define_variables.php");
?>
<?php
include 'login_register/config.php';

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
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css\main.css">
        <title>Cactus Soup</title>
        <?php include 'navbar.php'?>
    </head>
    <body>
        
        
        <div class="container">
                <div class="box">
                    <div class="box-nested-principal">    
                        <div class="box-text-principal">
                            <p>Plataforma de filmes e series</p>
                        </div>

                        <div class="box-text-secundario">
                            <p>Acompanhe, compartilhe e descubra seus filmes e séries favoritos com o Cactus Soup.</p>
                        </div>
                    </div>
                    <div class="box-nested-feature-1">
                        <div class="box-feature">
                            <img src="track.png" height="100" width="100"> 
                            <div class="box-feature-text-principal">
                                <p>
                                    Descobre
                                </p>
                                <div class="box-feature-text-secundario">
                                    <p>Quer encontrar un bom <br>filme para ver esta tarde? <br>
                                        Procura no nosso site!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-nested-feature-2">
                        <div class="box-feature">
                            <img src="track.png" height="100" width="100">
                            <div class="box-feature-text-principal">
                                <p>
                                    Descobre
                                </p>
                                <div class="box-feature-text-secundario">
                                    <p><p>Quer encontrar un bom <br>filme para ver esta tarde? <br>
                                        Procura no nosso site!</p>
                                </div>
                            </div>
                        </div>
                    </div>    
                    
        </div>  </div>
        
    </body>
</html>

<?php include 'footer.php'?>