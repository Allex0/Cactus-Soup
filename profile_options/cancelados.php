<?php
session_start();
$id_user = $_SESSION['id'];
include '../login_register/config.php';
        $result = mysqli_query($conn, "SELECT * FROM filmes f, filme_user fu WHERE f.id = fu.id_filme AND id_user = '$id_user' AND status = 'cancelado'");

        echo '
        <div class="wrapper">
    


<div class="cards">';
        while ($row = mysqli_fetch_array($result)) {
            echo '
        

<figure class="card">

    <img src="' . $row['imgpath'] . '" />

    <figcaption class="figcaption"><form action="/cactus-soup/movies/movies.php?id=';
            echo $row['id'];
            echo '" method="POST">
    <input class="button" type="submit" name="submit" value="' . $row['nome'] . '">
    <center><p?>&#9733;'. $row['nota'] .'</p></center>
    <input type="hidden" name="id" value="';
            echo $row['id'];
            echo '">
    </form></figcaption>

</figure>
               
        ';
        }
        echo '
    </div>

    </div>       
                ';
        mysqli_close($conn);
        ?>

        