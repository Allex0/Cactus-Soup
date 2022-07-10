<?php 
session_start();
include '../login_register/config.php';

if(isset($_POST['remover_serie'])){
    $idSerie = $_POST['id'];

    $query = "DELETE FROM seris WHERE id = '$idSerie'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script language='javascript'>alert('Série removido com sucesso da BD!');window.location.assign('../main.php');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na removação do série da BD!');window.location.reload;</script>";
    }
}

?>