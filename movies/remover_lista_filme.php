<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
  }
  
include '../login_register/config.php';


$id_user = $_SESSION['id'];


echo 'adasda';
?>