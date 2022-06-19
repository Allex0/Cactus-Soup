<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/main.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>

<body>
    <!-- Navbar top -->
    <?php include 'navbar.php' ?>

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" alt="" width="100" height="100">

            <div class="name">
                <?php echo $_SESSION['username'] ?>
            </div>
            <div class="job">
                <?php echo $_SESSION['role'] ?>
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#todosfilmes" class="">Todos filmes</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#vistos" class="active">Vistos</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Em pausa</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Cancelados</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Ver no futuro</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Opcoes</a>
                <hr align="center">
            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Main -->
    <div id="" class="main">
        <div id="todosfilmes">
        
    
    </div>
    <div id="vistos" class="">
    <?php
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
        mysqli_close($con);
        ?>
    </div>
    </div>
    <!-- End -->
</body>

</html>
<?php include 'footer.php' ?>