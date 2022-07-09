<?php 
session_start();
include '../login_register/config.php';

if(isset($_POST['remover_filme'])){
    $idFilme = $_POST['id'];

    $query = "DELETE FROM filmes WHERE id = '$idFilme'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script language='javascript'>alert('Filme removido com sucesso da BD!');window.location.assign('../main.php');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na removação do filme da BD!');window.location.reload;</script>";
    }
}

?>