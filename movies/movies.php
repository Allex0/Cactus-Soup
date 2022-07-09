<?php
error_reporting(1);

use LDAP\Result;
include '../login_register/config.php';
session_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}



$id_user = $_SESSION['id'];

$status_vazio = null;
if (isset($_POST['submit_status'])) {


  $status = $_POST['status'];

  $query_nota = "SELECT * FROM `filme_user` WHERE id_filme='$id' AND id_user = '$id_user'";
  $records_nota = mysqli_query($conn, $query_nota);
  while ($result = mysqli_fetch_assoc($records_nota)) {
    $status_vazio = $result['status'];
    $id_filme_status_vazio = $result['id_filme'];
  }


  if ($status_vazio == null) {
    $id_user = $_SESSION['id'];
    if (empty($id_filme_status_vazio)){
      $query = "INSERT INTO filme_user (status, id_filme, id_user) VALUES ('$status', '$id', '$id_user')";
      $result = $conn->query($query);
      if ($result) {
        echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
      } else {
        echo "<script language='javascript'>alert('Erro na insercao da status, id user e filme');window.location.reload;</script>";
      }
    }
    elseif(!empty($id_filme_status_vazio)){
      $query = "UPDATE filme_user set status = '$status' where id_filme = '$id' AND id_user = '$id_user'";
      $result = $conn->query($query);
      if ($result) {
        echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
      } else {
        echo "<script language='javascript'>alert('Erro na insercao da so status"; echo 'nota'. $nota; echo "');window.location.reload;</script>";
      }
    }
    }
    
  if (!empty($status) and !empty($status_vazio)) {
    $id_user = $_SESSION['id'];
    $query = "UPDATE filme_user set status = '$status' where id_filme = '$id' AND id_user = '$id_user'";
    $result = mysqli_query($conn, $query);
    if ($result) {

      echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
    }
  }
}

$id_user = $_SESSION['id'];


$nota_vazio = null;

if (isset($_POST['submit_nota'])) {


  $nota = $_POST['nota'];

  $query_nota = "SELECT * FROM `filme_user` WHERE id_filme='$id' AND id_user = '$id_user'";
  $records_nota = mysqli_query($conn, $query_nota);
  while ($result = mysqli_fetch_assoc($records_nota)) {
    $nota_vazio = $result['nota'];
    $id_filme_vazio = $result['id_filme'];
  }

  if ($nota_vazio == null) {
    $id_user = $_SESSION['id'];
    if (empty($id_filme_vazio)){
      $query = "INSERT INTO filme_user (nota, id_filme, id_user) VALUES ('$nota', '$id', '$id_user')";
      $result = $conn->query($query);
      if ($result) {
        echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
      } else {
        echo "<script language='javascript'>alert('Erro na insercao da nota, id user e filme');window.location.reload;</script>";
      }
    }
    elseif(!empty($id_filme_vazio)){
      $query = "UPDATE filme_user set nota = '$nota' where id_filme = '$id' AND id_user = '$id_user'";
      $result = $conn->query($query);
      if ($result) {
        echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
      } else {
        echo "<script language='javascript'>alert('Erro na insercao da so nota"; echo 'nota'. $nota; echo "');window.location.reload;</script>";
      }
    }
    }
    
  if (!empty($nota) and !empty($nota_vazio)) {
    $id_user = $_SESSION['id'];
    $query = "UPDATE filme_user set nota = '$nota' where id_filme = '$id' AND id_user = '$id_user'";
    $result = mysqli_query($conn, $query);
    if ($result) {

      echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
    }
  }
}

if (isset($_POST['remover_lista'])) {

  $querry = "DELETE FROM filme_user WHERE id_filme = '$id' AND id_user = '$id_user'";
  $result = $conn->query($querry);
  if ($result) {
    echo "<script language='javascript'>alert('Filme removido com sucesso');window.location.reload;</script>";
  } else {
    echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
  }
}

// if (isset($_GET['filme'])) {
include '../login_register/config.php';

// $title = $_GET['filme'];
$idFilme = $_GET["id"];
$im = "SELECT * FROM filmes WHERE id = '$idFilme'";
$records = mysqli_query($conn, $im);


//$media_array = array();

$media = "SELECT `id_filme`, FORMAT(AVG(`nota`), 1) as avg FROM `filme_user` WHERE id_filme='$id' GROUP BY `id_filme`";

$records_media = mysqli_query($conn, $media);

while ($result = mysqli_fetch_assoc($records)) {

  $description = $result['descricao'];
  $id = $result['id'];
  $title = $result['nome'];
  //$person = $_SESSION['id'];
  //$movieid = $result['mid'];
  $year = $result['ano'];
  $imgpath = $result['imgpath'];

  header('Content-Type: text/html; charset=utf-8');


  echo '<head>
    <script src="index.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/cactus-soup/movies/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cactus-soup/css/navbar.css">
    <link rel="stylesheet" href="/cactus-soup/css/dropdown.css">
    <link rel="stylesheet" href="/cactus-soup/footer2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
          integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="../index.js"> </script>
    <title>' . $title . '</title>

  ';
  include '../navbar.php';
  echo '</head>';
  echo '<body class="">
    
    

  <div class="">
  <section class="tv-content">
    <div class="bg">
      <div class="content ">
        <div class="image">
          <img width="300" height="450" src="' . $imgpath . '" />
        </div>
        <div class="info teste">
          <div class="title">
            <a href="">
              <h2 >' . $title . '</h2>
            </a>
            <span >(' . $year . ')</span>
          </div>
          <div class="meta-actions every">
            <div class="score">
            <p><h1 style="margin-right: 5px">Nota:  </h1></p> 
              <div class="percentage-circle">
                <div class="percentage-circle-stroke">
                  <div class="percent">
                    <span style="font-size: 15px">';
  while ($media_result = mysqli_fetch_assoc($records_media)) {
    echo $media_result['avg'];
    $nota_avg = $media_result['avg'];
    $query = "UPDATE filmes set nota ='$nota_avg' where id='$idFilme'";
    $result = $conn->query($query);
  };
  echo '</span>
                  </div>
                </div>
              </div>
              '; if ($nota_avg >= 9){
                echo '<img src="../images/9+.png" height="70px" width="70px">';
              }
              elseif ($nota_avg >= 5){
                echo '<img src="../images/5-8.png" height="70px" width="70px">';
              }
              elseif ($nota_avg >= 1){
                echo '<img src="../images/1-4.png" height="70px" width="70px">';
              }
              
            echo '</div>
            ';
  if (isset($_SESSION['username'])) {

    echo '
              <ul>
            <li class="rate-it">
                <label><p >Adiciona na lista:</p></label>
                <form action="" method="POST">
                <input type="hidden" name="id" value="';echo $id; echo '">
                <select id="status" name="status">
                  <option value="a ver">A ver</option>
                  <option value="visto">Visto</option>
                  <option value="em pausa">Em pausa</option>
                  <option value="cancelado">Cancelado</option>
                  <option value="ver no futuro">Ver no futuro</option>
                </select>
                <input value="Adicionar" name="submit_status" type="submit">
              </li>
              </ul>

              <ul class="" >
            
            
              <li class="rate-it">
                <label><p>Avalia:</p></label>
                <form action="" method="POST">
                <input type="hidden" name="id" value="';echo $id; echo '">
                <select id="nota" name="nota">
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                </select>
                <input value="Avaliar" name="submit_nota" type="submit">
                
              </form>

              </li>
            </ul>
            '; 
            $query_remover = "SELECT * FROM filme_user where id_filme = '$id' and id_user ='$id_user'";
              $result = mysqli_query($conn, $query_remover);
              while($results_remover = mysqli_fetch_assoc($result)){
                $remover_lista_verificar = $results_remover['id_filme'];
                if ($results_remover['id_filme'] != null){
                  echo '<ul> 
                  <li class="rate-it">
                    <form action="" method="post">
                    
                    <input value="Remover da lista" name="remover_lista" type="submit">
                    <input type="hidden" name="id" value="';echo $id; echo '">
                    </form>
                </li>
                </ul> ';
                }
                else{
                
                };

              };
              if ($_SESSION['role'] == 'admin'){
                echo '<form target="_blank" method="POST" action="movie-edit.php">
                  <ul>
                    <li>
                        <input type="hidden" name="id" value="';echo $id; echo'">
                        <input type="image" alt="Submit" src="../images/lapis.png" name="movie-edit" width="25" height="25"/>
                    </li> 
                  </ul>
                </form>';
                ;}
              
            
            
            
            
  };
  echo '
            
          </div>
          <div class="about">
            <div class="overview">
              <h3 >Informação</h3>
              <p >' . utf8_encode($description) . ' </p></div>
            <div class="featured-crew">
              <h3 ></h3>
              <ul>
                
          
        </ul>
    </div>
    </div>
  </div>
</div>
</div>
</section>
</body>
</html>';
  include '../footer.php';
}
