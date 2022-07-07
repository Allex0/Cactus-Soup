<?php
session_start();
include 'navbar.php';
?>
<html>

<head>
    <link rel="stylesheet" href="footer2.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Top Seris</title>
</head>

<body>
    <?php

    include '../login_register/config.php';
    $result = mysqli_query($conn, "SELECT * FROM seris ORDER BY nota DESC LIMIT 50");

    echo '
        <center><h1 style="margin-top: 10px; color: #27272A;">Top Seris</h1></center>

        <div class="wrapper">
    


        <div class="cards">';
    while ($row = mysqli_fetch_array($result)) {
        echo '
                

        <figure class="card">

            <img src="' . $row['imgpath'] . '" />

            <figcaption class="figcaption"><form action="/cactus-soup/movies/seris.php?id=';
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
    mysqli_close($conn); ?>
</body>

</html>
<?php include 'footer.php'; ?>