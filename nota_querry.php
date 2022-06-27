<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();

    if (isset($_POST['id'])){
      $id = $_POST['id']; 
    }
   
    include 'login_register/config.php';
    
    $id_user = $_SESSION['id'];

    $nota_vazio = null;

    if(isset($_POST['submit_nota'])){


        $nota = $_POST['nota'];

        $query_nota = "SELECT `nota` FROM `filme_user` WHERE id_filme='$id' AND id_user = '$id_user'";
          $records_nota = mysqli_query($conn, $query_nota);
          while($result = mysqli_fetch_assoc($records_nota)){
            $nota_vazio = $result['nota'];
            
          ;}

          if($nota_vazio == null)
          {
            $id_user = $_SESSION['id'];
            $query = "INSERT INTO filme_user (nota, id_filme, id_user) VALUES ('$nota', '$id', '$id_user')";
            echo $query;
            $result = $conn->query($query);
            if($result){
              echo "Successssssssssssssssssssssso";
              header('Location: /cactus-soup/main.php ');
            }  
            else{
              echo "Errrro";
            }
          }
        if(!empty($nota)){
            $id_user = $_SESSION['id'];
            $query = "UPDATE filme_user set nota = '$nota' where id_filme = '$id' AND id_user = '$id_user'";
            $result = $conn->query($query);
            if($result){

              $moviepath = "movies/movies.php?id=$id";
              echo "movies/movies.php?id=$id";
              header('Location:'.$moviepath);

            }  
            else{
              echo "Erro";
            }
          }


          
          
        }

  
?>