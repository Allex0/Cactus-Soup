<?php
session_start();

if (isset($_GET['id'])){
  $id = $_GET['id']; 
}

include 'login_register/config.php';

$id_user = $_SESSION['id'];

  
$status_vazio = null;

if(isset($_POST['submit_status'])){


    $nota = $_POST['status'];

    $query_nota = "SELECT `status` FROM `filme_user` WHERE id_filme='$id' AND id_user = '$id_user'";
      $records_nota = mysqli_query($conn, $query_nota);
      while($result = mysqli_fetch_assoc($records_nota)){
        $status_vazio = $result['status'];
        
      ;}

      if($status_vazio == null)
      {
        $id_user = $_SESSION['id'];
        $query = "INSERT INTO filme_user (status, id_filme, id_user) VALUES ('$status', '$id', '$id_user')";
        echo $query;
        $result = $conn->query($query);
        if($result){
          echo "<script language='javascript'>alert('Dados guardados com sucesso');window.location.reload;</script>";
        }  
        else{
          echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
        }
      }
    if(!empty($status)){
        $id_user = $_SESSION['id'];
        $query = "UPDATE filme_user set status = '$status' where id_filme = '$id' AND id_user = '$id_user'";
        $result = $conn->query($query);
        if($result){

         echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";


        }  
        else{
          echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
        }
      }


      
      
    }
?>