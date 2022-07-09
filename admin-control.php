<?php
session_start();

if (isset($_POST['upload'])) {

  include 'login_register/config.php';

  $target = "movies/images/".basename($_FILES['image']['name']);
  $nome = $_POST['mname'];
  $ano = $_POST['release'];
  $keywords = $_POST['keywords'];
  $descricao = utf8_decode($_POST['desc']);
  $imagem = $_FILES['image']['name'];
  

  $sql = "INSERT INTO filmes (nome, ano, keywords, descricao, imgpath)
    VALUES('$nome','$ano','$keywords','$descricao','$target')";

  mysqli_query($conn,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    header("Location: admin.php");
  }else {
    echo "error uploading";
  }
}


?>