<?php
include '../login_register/config.php';
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

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile_page_form.css">
    <link rel="stylesheet" href="../css/dropdown.css">
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <?php include '../navbar.php'; ?>
</head>

<body>
    <div class="container-profile">
        <div class="box-profile">
            <div class="box-nested-principal">
                <div class="box-text-principal">
                    <p>Modificar os dados do filme</p>
                </div>
            </div>
            <?php 
            $idFilme = $_POST['id'];
            $query = "SELECT * FROM filmes where id = '$idFilme'";
              $result = mysqli_query($conn, $query);
              while($results = mysqli_fetch_assoc($result)){
                $nome = $results['nome'];
                $ano = $results['ano'];
                $keywords = $results['keywords'];
                $descricao = $results['descricao'];
              }?>
            <div class="profile-page-form">
                <form class="" action="movie-edit-control.php" method="POST" enctype="multipart/form-data">
                    <input type="text" class="form-control" placeholder="Nome do filme" name="mname" value="<?php echo $nome ?>" required><br>
                    <input type="text" class="form-control" placeholder="Ano" name="release" value="<?php echo $ano ?>" required>
                    <br>
                    <input type="text" class="form-control" placeholder="Keywords (divididos por espaço)" name="keywords" value="<?php echo $keywords ?>" required>
                    <br>
                    <input type="text" class="form-control" placeholder="Descrição" name="desc" value="<?php echo $descricao ?>" required>
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
                        <input type="hidden" name="id" value="<?php echo  $idFilme; ?>">
                        <input type="submit" class="btn btn-success btn-lg" name="upload" value="Submeter">
                        
                    </div>


                </form>

            </div>

        </div>
</body>

</html>