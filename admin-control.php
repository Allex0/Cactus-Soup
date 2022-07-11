<?php
session_start();
include 'paths.php';
if (isset($_POST['upload'])) {

  include 'login_register/config.php';

  $target = target_image.basename($_FILES['image']['name']);
  $nome = $_POST['mname'];
  $ano = $_POST['release'];
  $keywords = $_POST['keywords'];
  $descricao = utf8_decode($_POST['desc']);
  $imagem = $_FILES['image']['name'];
  

  $sql = "INSERT INTO filmes (nome, ano, keywords, descricao, imgpath)
    VALUES('$nome','$ano','$keywords','$descricao','$target')";

  $result = mysqli_query($conn,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target) and $result) {
    echo "<script language='javascript'>alert('Filme inserido com sucesso!');window.location.assign('admin.php');</script>";
  }else {
    echo getcwd();
    echo "<script language='javascript'>alert('Deu erro na inserção do filme!');window.location.reload;</script>";
  }
}


?>