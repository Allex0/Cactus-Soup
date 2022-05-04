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
        <div class="container-md">
            <div class="search-form">
                <form action="" method="GET" name="">

                    <table>
                        <tr>
                            <td>
                                <input type="text" name="k" placeholder="Search" autocomplete="off">  
                            </td>
                            <td>
                                <input type="submit" name="" name="search">
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
                        echo '<div class""><b><u>' . $result_count . '</u></b></div>';
                        echo 'Your search for <i>' . $display_words . '</i> <hr /> <br>';

                        // mostrar os resultados
                        while ($row = mysqli_fetch_assoc($query))
                        {
                            echo '<tr class="search">
                            <td>' . $row['nome'] .'</td>
                            <td>' . $row['descricao'] .'</td>
                            <td>' . $row['ano'] .'</td>
                            </tr>';
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
        
        <div class="container">
                <div class="cell-3">
                    <div class="box-text-principal">
                        <p>Plataforma de filmes e series</p>
                    </div>

                    <div class="box-text-secundario">
                        <p>Acompanhe, compartilhe e descubra seus filmes e séries favoritos com o Cactus Soup.</p>
                    </div>

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
        
    </body>
    <?php include 'footer.php'?>
</html>