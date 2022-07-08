<?php
session_start();
if (isset($_SESSION['username'])){

}
else {
    echo "<script language='javascript'>alert('Nao esta na conta!');window.location.assign('main.php');</script>";
}

if ($_SESSION['role'] == 'admin'){

}
else {
    echo "<script language='javascript'>alert('Nao tem acesso!');window.location.assign('main.php');</script>";
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
                    <p>Adicionar filme na base de dados</p>
                </div>
            </div>
            <div class="profile-page-form">
                <form class="" action="admin-control.php" method="POST" enctype="multipart/form-data">

                    <input type="text" class="form-control" placeholder="Nome do filme" name="mname" value=""><br>
                    <input type="text" class="form-control" placeholder="Ano" name="release" value="">
                    <br>
                    <input type="text" class="form-control" placeholder="Keywords (divididos por espaço)" name="keywords" value="">
                    <br>
                    <input type="text" class="form-control" placeholder="Descrição" name="desc" value="">
                    <br>
                    <div class="row">
                        <div class="col">
                            <table>
                                <tr>
                                    <td> <label for=""><b>Inserir imagem (.JPG) : </b></label> </td>
                                    <td>
                                        <div class="">
                                            <input type="hidden" name="size" value="100000">

                                            <input type="file" name="image" value="">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div> <br><br>
                    <div class="signupbutton">
                        <input type="submit" class="submeter" name="upload" value="Submeter">
                    </div>


                </form>

            </div>

        </div>
</body>

</html>