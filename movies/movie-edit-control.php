<?php
session_start();
error_reporting(0);
include '../paths.php';
if (isset($_POST['upload'])) {

  include '../login_register/config.php';

  $target = target_image.basename($_FILES['image']['name']);
  $nome = $_POST['mname'];
  $ano = $_POST['release'];
  $keywords = $_POST['keywords'];
  $descricao = utf8_decode($_POST['desc']);
  $imagem = $_FILES['image']['name'];
  
  $idFilme = $_POST['id'];
  
  
  if(!empty($imagem)){
    $sql = "UPDATE filmes SET nome = '$nome', ano = '$ano', keywords = '$keywords', descricao = '$descricao', imgpath = '$target' where id = '$idFilme'";
    $resultado = mysqli_query($conn,$sql);
    if ($resultado){
      echo "<script language='javascript'>alert('Dados atualizados com sucesso.');window.location.assign('movies.php?id=".$idFilme."');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na atualização com imagem!');window.location.reload;</script>";
    }
  }
  else{
    $sql = "UPDATE filmes SET nome = '$nome', ano = '$ano', keywords = '$keywords', descricao = '$descricao' where id = '$idFilme'";
    
    $resultado = mysqli_query($conn,$sql);
    if ($resultado){
        echo "<script language='javascript'>alert('Dados atualizados com sucesso.');window.location.assign('movies.php?id=".$idFilme."');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Deu erro na atualização!');window.location.reload;</script>";
    }
  }

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    //header("Location: ../profile_page.php");
  }else {
    //echo "error uploading";
  }
}


?>