<?php
session_start();
if (isset($_SESSION['username'])){

}   
else {
    header('Location: main.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Perfil</title>
    <link rel="stylesheet" type="text/css" href="css/cards_profile.css">
    <!-- Custom Css -->
    <script src="index.js"></script>
    <script src="jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile_page_form.css">
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
                <a class="active" id="todos_filmes" href="#todosfilmes" onclick="toggleActive(this); todos_filmes()">Todos filmes</a>
                <hr align="center">
            </div>
            <div class="url">
                <a id="a_ver" href="#a_ver" onclick="toggleActive(this); a_ver()">A ver</a>
                <hr align="center">
            </div>
            <div class="url">
                <a id="vistos" href="#vistos" onclick="toggleActive(this); vistos()">Vistos</a>
                <hr align="center">
            </div>
            <div class="url" >
                <a id="em_pausa" href="#em_pausa"onclick="toggleActive(this); em_pausa()">Em pausa</a>
                <hr align="center">
            </div>
            <div class="url">
                <a id="cancelados" href="#cancelados" onclick="toggleActive(this); cancelados()">Cancelados</a>
                <hr align="center">
            </div>
            <div class="url">
                <a id="ver_no_futuro" href="#ver_no_futuro" onclick="toggleActive(this); ver_no_futuro()">Ver no futuro</a>
                <hr align="center">
            </div>
            <div class="url" class="">
                <a href="#opcoes" onclick="toggleActive(this); opcoes()">Opcões</a>
                <hr align="center">
            </div>
            <?php
            if ($_SESSION['role'] == 'admin'){
            echo'
            <div class="url" class="">
                <a href="admin.php">Adicionar filme</a>
                <hr align="center">
            </div>
            ';}?>
        </div>
    </div>

    <!-- End -->

    <!-- Main -->
    <div id="main" class="main">
        
    
    </div>
    
</body>

</html>
<?php include 'footer.php' ?>