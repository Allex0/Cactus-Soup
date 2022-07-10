<?php
session_start();
if (isset($_SESSION['username'])){

}
else {
    echo "<script language='javascript'>alert('Não está na conta!');window.location.assign('main.php');</script>";
}

if ($_SESSION['role'] == 'admin'){

}
else {
    echo "<script language='javascript'>alert('Não tem acesso!');window.location.assign('main.php');</script>";
}

?>


<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile_page_form.css">
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/navbar.css">
    <?php include 'navbar.php'; ?>
</head>

<body>
    <div class="container-profile">
        <div class="box-profile">
            <div class="box-nested-principal">
                <div class="box-text-principal">
                    <p>Adicionar séries na base de dados</p>
                </div>
            </div>
            <div class="profile-page-form">
                <form class="" action="admin-seris-control.php" method="POST" enctype="multipart/form-data">
                    <label>Nome:</label>
                    <input type="text" class="form-control" placeholder="Nome do série" name="mname" value="" required><br>
                    <label>Ano início:</label>
                    <input type="text" class="form-control" placeholder="Ano início" name="release-start" value="" required>
                    <br>
                    <label>Ano fim (se não tiver acabado deixa vazio):</label>
                    <input type="text" class="form-control" placeholder="Ano fim" name="release-end" value="" required>
                    <br>
                    <label>Temporadas:</label>
                    <input type="text" class="form-control" placeholder="Temporadas" name="seasons" value="" required>
                    <br>
                    <label>Keywords:</label>
                    <input type="text" class="form-control" placeholder="Keywords (divididos por espaço)" name="keywords" value="" required>
                    <br>
                    <label>Descrição:</label>
                    <input type="text" class="form-control" placeholder="Descrição" name="desc" value="" required>
                    <br>
                    <div class="row">
                        <div class="col">
                            <table>
                                <tr>
                                    <td> <label for=""><b>Inserir imagem (.JPG) : </b></label> </td>
                                    <td>
                                        <div class="">
                                            <input type="hidden" name="size" value="100000">

                                            <input type="file" name="image" value="" required>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div> <br>
                    <div class="signupbutton">
                        <input type="submit" class="submeter" name="upload" value="Submeter">
                    </div>


                </form>

            </div>

        </div>
</body>

</html>