<?php
session_start();

if (isset($_POST['upload'])) {

  include 'login_register/config.php';

  $target = "movies/images_seris/".basename($_FILES['image']['name']);
  $nome = $_POST['mname'];
  $ano_inicio = $_POST['release-start'];
  $ano_fim = $_POST['release-end'];
  $temporadas = $_POST['seasons'];
  $keywords = $_POST['keywords'];
  $descricao = utf8_decode($_POST['desc']);
  $imagem = $_FILES['image']['name'];
  

  $sql = "INSERT INTO seris (nome, ano_inicio, ano_fim, temporadas, keywords, descricao, imgpath)
    VALUES('$nome','$ano_inicio', '$ano_fim', '$temporadas','$keywords','$descricao','$target')";

  $result = mysqli_query($conn,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target) and $result) {
    echo "<script language='javascript'>alert('Série inserido com sucesso!');window.location.assign('admin-seris.php');</script>";
  }else {
    echo "<script language='javascript'>alert('Deu erro na inserção do série!');window.location.reload;</script>";
  }
}


?>