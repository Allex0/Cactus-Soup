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

  $query_nota = "SELECT `status` FROM `seris_user` WHERE id_seris='$id' AND id_user = '$id_user'";
  $records_nota = mysqli_query($conn, $query_nota);
  while ($result = mysqli_fetch_assoc($records_nota)) {
    $status_vazio = $result['status'];
    
  }


  if (!empty($status) and !empty($status_vazio)) {
    $id_user = $_SESSION['id'];
    $query_status = "UPDATE seris_user set status = '$status' where id_seris = '$id' AND id_user = '$id_user'";
    $result = $conn->query($query_status);
    if ($result) {

      echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro na update');window.location.reload;</script>";
    }
  }

  if(empty($status_vazio)){
    $query_status_vazio = "INSERT INTO seris_user (status, id_seris, id_user) VALUES ('$status', '$id', '$id_user')";
    $result = $conn -> query($query_status_vazio);
    if ($result) {
      echo "<script language='javascript'>alert('Dados adicionados com sucesso');window.location.reload;</script>";
    }
    else{
      echo "<script language='javascript'>alert('Erro no insercao de status.');window.location.reload;</script>";
    }
  }
}

$id_user = $_SESSION['id'];


$nota_vazio = null;

if (isset($_POST['submit_nota'])) {


  $nota = $_POST['nota'];

  $query_nota = "SELECT * FROM `seris_user` WHERE id_seris='$id' AND id_user = '$id_user'";
  $records_nota = mysqli_query($conn, $query_nota);
  while ($result = mysqli_fetch_assoc($records_nota)) {
    $nota_vazio = $result['nota'];

  
  if ($nota_vazio == null and $result['id_user'] and $result['id_seris'] != null) {
    $id_user = $_SESSION['id'];
    $query = "INSERT INTO seris_user (nota) VALUES ('$nota') WHERE id_seris = '$id' AND id_user = 'id_user'";
    $result = $conn->query($query);
    if ($result) {
      echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro na insercao da nota');window.location.reload;</script>";
    }
  }
  if ($nota_vazio == null and $result['id_user'] and $result['id_seris'] = "") {
    $id_user = $_SESSION['id'];
    $query = "INSERT INTO seris_user (nota, id_user, id_seris) VALUES ('$nota', '$id_user', '$id')";
    $result = $conn->query($query);
    if ($result) {
      echo "<script language='javascript'>alert('Dados inseridos com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro na insercao da nota, seris e utilizador');window.location.reload;</script>";
    }
  }
}
  if (!empty($nota)) {
    $id_user = $_SESSION['id'];
    $query = "UPDATE seris_user set nota = '$nota' where id_seris = '$id' AND id_user = '$id_user'";
    $result = mysqli_query($conn, $query);
    if ($result) {

      echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
    } else {
      echo "<script language='javascript'>alert('Erro na atualizacao da nota');window.location.reload;</script>";
    }
  }
}

if (isset($_POST['remover_lista'])) {

  $querry = "DELETE FROM seris_user WHERE id_seris = '$id' AND id_user = '$id_user'";
  $result = $conn->query($querry);
  if ($result) {
    echo "<script language='javascript'>alert('Seris removido com sucesso');window.location.reload;</script>";
  } else {
    echo "<script language='javascript'>alert('Erro na removacao do seris');window.location.reload;</script>";
  }
}

// if (isset($_GET['filme'])) {
include '../login_register/config.php';

// $title = $_GET['filme'];
$idSeris = $_GET["id"];
$im = "SELECT * FROM seris WHERE id = '$idSeris'";
$records = mysqli_query($conn, $im);


//$media_array = array();

$media = "SELECT `id_seris`, FORMAT(AVG(`nota`), 1) as avg FROM `seris_user` WHERE id_seris='$id' GROUP BY `id_seris`";

$records_media = mysqli_query($conn, $media);

while ($result = mysqli_fetch_assoc($records)) {

  $description = $result['descricao'];
  $id = $result['id'];
  $title = $result['nome'];
  //$person = $_SESSION['id'];
  //$movieid = $result['mid'];
  $year_start = $result['ano_inicio'];
  $year_end = $result['ano_fim'];
  $imgpath = '../' . $result['imgpath'];
  $seasons = $result['temporadas'];

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
            <span >(' . $year_start . '-'. $year_end .')</span>
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
    $query = "UPDATE seris set nota ='$nota_avg' where id='$idSeris'";
    $result = $conn->query($query);
  };
  echo '</span>
                  </div>
                </div>
              </div>
            </div>
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
            $query_remover = "SELECT * FROM seris_user where id_seris = '$id' and id_user ='$id_user'";
              $result = mysqli_query($conn, $query_remover);
              while($results_remover = mysqli_fetch_assoc($result)){
                $remover_lista_verificar = $results_remover['id_seris'];
                if ($results_remover['id_seris'] != null){
                  echo '<ul> 
                  <li class="rate-it">
                    <form action="" method="post">
                    <input type="hidden" name="id" value="';echo $id; echo '">
                    <input value="Remover da lista" name="remover_lista" type="submit">
                    </form>
                </li>
                </ul> ';
                }
                else{
                echo $results_remover['id_seris'];
                };
              };
            
            
            
            
  };
  echo '
            
          </div>
          <div class="about">
            <div class="overview">
              <h3 >Informação</h3>
              <p >' . utf8_encode($description) . ' </p></div>
              <p >Temporadas: ' . $seasons . ' </p>
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
