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
        <script src="index.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css\main.css">
        <link rel="stylesheet" type="text/css" href="css\search_bar.scss">
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
            </div>        
        </div>  
        
        <div class="container">
            <div class="">
                <form class="" action="" method="GET" name="">

                    <table>
                        <tr>
                            <td class="">
                                <input class="search-form" type="text" name="k" placeholder="Search" autocomplete="off">  
                            </td>
                            <td class="">
                                <input class="submit-button" type="submit" name="" name="search">
                            </td>
                        </tr>
                    </table>

                </form>

                
                <?php
                // verificar se o input tem algum valor
                if (isset($_GET['k']) && $_GET['k'] != '')
                {
                    $k = trim($_GET['k']); // " d " = "d"

                    // criar a query mysql
                    $query_string = "SELECT * FROM filmes WHERE ";
                    $display_words = "";

                    // separar cada keyword
                    $keywords = explode(' ', $k);

                    foreach($keywords as $word)
                    {
                        $query_string .= " keywords LIKE '%". $word . "%' OR";

                        $display_words .= $word . " ";

                    }

                    $query_string = substr($query_string, 0, strlen($query_string) - 3);

                    // conectar a base de dados
                    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

                    $query = mysqli_query($conn, $query_string);
                    $result_count = mysqli_num_rows($query);

                    // verificar se temos alguns resultados
                    echo '<table>';
                    if ($result_count > 0)
                    {
                        // mostrar o nr de resultados
                        echo '<h2><strong>Resultados encontrados: <span>'. $result_count .'</span></strong></h2>';
                        //echo '<p class="search">Your search for <i>' . $display_words . '</i> </p><hr /> <br>';

                        // mostrar os resultados
                        while ($row = mysqli_fetch_assoc($query))
                        {
                            $local_imagem = "/cactus-soup/movies/images/" . $row['nome'] . " ".$row['ano'];
                            echo '
                            <div class="wrapper">
                            <div class="cards">
                            <figure class="card">
                           
                                
                                <img src="'. $row['imgpath'] .'" />

                                <figcaption>
                                <form action="/cactus-soup/movies/movies.php" method="POST">
                                <input class="button" type="submit" name="submit" value="'. $row['nome'] .'">
                                </form>
                                </figcaption>
                                
                            </figure>
                            </div>
                            </div>'
                            ;


                        }
                        
                    }
                    
                    else
                    {
                        echo "No results found";
                    }
                    echo '</table>';
                }



                ?>

            </div>
        
        </div>
           <!--     
        <div class="movie-card">
    
   <div class="card">
     <div class="movie-card-description">
      <h1 class="movie-title">Fairy Tail</h1>
       <p class="movie-subtitle">(2006) Adventure fiction, Fantasy</p>
       <p class="movie-shorts">Fairy Tail is set in Earth-land, a fictional land where wizards coalesce into guilds to apply their magical abilities for paid job requests. Novice wizard Lucy Heartfilia runs away from home to join Fairy Tail, a guild famous for its members' overly destructive antics.</p>
       <button type="button" class="watch-btn"><i class="fa fa-play" aria-hidden="true"></i> &emsp; Watch Trailer</button>
    </div>
            -->



            
</body>
</html>

<?php include 'footer.php'?>