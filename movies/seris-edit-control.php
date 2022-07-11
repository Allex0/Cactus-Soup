<?php
session_start();
error_reporting(1);
include '../paths.php';
if (isset($_POST['upload'])) {

  include '../login_register/config.php';

  $target = target_image_seris.basename($_FILES['image']['name']);
  $nome = $_POST['mname'];
  $ano_inicio = $_POST['release-start'];
  $ano_fim = $_POST['release-end'];
  $temporadas = $_POST['seasons'];
  $keywords = $_POST['keywords'];
  $descricao = utf8_decode($_POST['desc']);
  $imagem = $_FILES['image']['name'];
  
  $idSerie = $_POST['id'];
  
  
  if(!empty($imagem)){
    $sql = "UPDATE seris SET nome = '$nome', ano_inicio = '$ano_inicio', ano_fim = '$ano_fim', temporadas = '$temporadas', 
    keywords = '$keywords', descricao = '$descricao', imgpath = '$target' where id = '$idSerie'";
    $resultado = mysqli_query($conn,$sql);
    if ($resultado and move_uploaded_file($_FILES['image']['tmp_name'],"../".$target)){
      echo "<script language='javascript'>alert('Dados e imagem atualizados com sucesso.');window.location.assign('seris.php?id=".$idSerie."');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na atualização com imagem!');window.location.assign('seris.php?id=".$idSerie."');</script>";
        
      }
  }
  else{
    $sql = "UPDATE seris SET nome = '$nome', ano_inicio = '$ano_inicio', ano_fim = '$ano_inicio', temporadas = '$temporadas',
     keywords = '$keywords', descricao = '$descricao' where id = '$idSerie'";
    
    $resultado = mysqli_query($conn,$sql);
    if ($resultado){
        echo "<script language='javascript'>alert('Dados atualizados com sucesso.');window.location.assign('seris.php?id=".$idSerie."');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na atualização!');window.location.assign('seris.php?id=".$idSerie."');</script>";
    }
  }

  if (move_uploaded_file($_FILES['image']['tmp_name'],"../".$target)) {
    //header("Location: ../profile_page.php");
  }else {
  }
}


?>