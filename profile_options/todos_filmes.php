


<?php
include '../login_register/config.php';
        $result = mysqli_query($conn, "SELECT * FROM filmes LIMIT 1");

        echo '
        <div class="wrapper">
    


<div class="cards">';
        while ($row = mysqli_fetch_array($result)) {
            echo '
        

<figure class="card">

    <img src="' . $row['imgpath'] . '" />

    <figcaption><form action="/cactus-soup/movies/movies.php?id=';
            echo $row['id'];
            echo '" method="POST">
    <input class="button" type="submit" name="submit" value="' . $row['nome'] . '">
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

        