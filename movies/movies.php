<?php

use LDAP\Result;

session_start();
if (isset($_POST['submit'])) {
  include '../login_register/config.php';

  $title = $_POST['submit'];
  $im = "SELECT * FROM filmes WHERE nome = '$title'";
  $records = mysqli_query($conn,$im);

  echo '<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/cactus-soup/movies/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cactus-soup/css/navbar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
          integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>'. $title .'</title>

    <style> 
    </style>
  ';
  include '../navbar.php' ;  
  echo '</head>';
 






  $media = "SELECT * from filme_user";
  $media_array = array();
  $records_media = mysqli_query($conn, $media);
  while($media_result = mysqli_fetch_assoc($records_media))
  {
    $media_array[] = $media_result['nota'];
    //echo $media_array;
    // Create sorted array
    $numbers = $media_array;

    // Get array length
    $length = count($numbers);

    // Divide length by 2
    $second_half_length = $length / 2;

    // Subtract 1 from $second_half_length
    $first_half_length = $second_half_length - 1;

    // Get index values
    $first_half = $numbers[$first_half_length];
    $second_half = $numbers[$second_half_length];

    // Get average of these values
    $median = ($first_half + $second_half) / 2;

    // Output median
    //echo $median;
  }

  while($result = mysqli_fetch_assoc($records)){
    $description = $result['descricao'];
    //$person = $_SESSION['id'];
    //$movieid = $result['mid'];
    $year = $result['ano'];
    $imgpath = '../'. $result['imgpath'];
    //$current = $result['viewers'];
    //$newcount = $current + 1;
    //$newsql = "UPDATE movies SET viewers = '$newcount' WHERE name='$mname' ";
    //$nsql = "UPDATE user1 SET mid = '$movieid'";
  echo '<body class="">

    

  <div class="">
  <section class="tv-content">
    <div class="bg">
      <div class="content ">
        <div class="image">
          <img width="300" height="450" src="'. $imgpath .'" />
        </div>
        <div class="info teste">
          <div class="title">
            <a href="#">
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
                    <span style="font-size: 15px">'. $median.'</span>
                  </div>
                </div>
              </div>
            </div>
            <ul class="every">
              <li class="add-to-list">
                <p >Adiciona na lista:</p>
              </li>
              <li class="rate-it">
                <label><p >Avalia:</p></label>
                <form action="/action_page.php">
                <select id="cars" name="cars">
                  <option value="volvo">10</option>
                  <option value="saab">9</option>
                  <option value="fiat">8</option>
                  <option value="audi">7</option>
                  <option value="audi">6</option>
                  <option value="audi">5</option>
                  <option value="audi">4</option>
                  <option value="audi">3</option>
                  <option value="audi">2</option>
                  <option value="audi">1</option>
                </select>
                <input type="submit">
              </form>

              </li>
            </ul>
          </div>
          <div class="about">
            <div class="overview">
              <h3 >Informação</h3>
              <p >' . $description . ' </p></div>
            <div class="featured-crew">
              <h3 >Featured Crew</h3>
              <ul>
                <li>
                  <p>
                    <a href="#">John Waine</a>
                  <h1 >Director</h1>
                </p>
              </li>
            <li>
              <p>
                <a href="#">John Waine</a>
              <h1 >Director</h1>
            </p>
          </li>
          
        </ul>
    </div>
    </div>
  </div>
</div>
</div>
</section>
</body>';

}
}
