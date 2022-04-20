<?php 
    include("./define_variables.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        echo '</table>';
                    }
                    else
                    {
                        echo "No results found";
                    }
                }



                ?>

            </div>
        
        </div>
    
    </body>
    <?php include 'footer.php'?>
</html>