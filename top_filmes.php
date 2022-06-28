<?php
session_start();
include 'navbar.php';

include 'footer.php';

?>
<html>

<head>
    <link rel="stylesheet" href="footer2.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php

    include '../login_register/config.php';
    $result = mysqli_query($conn, "SELECT * FROM filmes ORDER BY nota DESC LIMIT 50");

    echo '
        <center><h1 style="margin-top: 10px; color: #27272A;"> Top Filmes</h1></center>

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
    mysqli_close($conn); ?>
</body>

</html>