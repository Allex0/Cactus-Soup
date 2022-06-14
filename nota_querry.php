<?php 
session_start();
include 'login_register/config.php';
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $nota = $_POST['nota'];
    if(!empty($nota)){
        $id_user = $_SESSION['id'];
        echo $id_user;
        $query = "UPDATE filme_user set nota = '$nota' where id_filme = '$id' AND id_user = '$id_user'";
        echo $query;
        $result = $conn->query($query);
        if($result){
          echo "Course is inserted successfully";
        }  
        else{
          echo "deu merda";
        }
      }
      
    }


?>