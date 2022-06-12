<?php 
include '/cactus-soup/main.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/cactus-soup/movies/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
          integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Movie page</title>
  </head>
  <body>
    <section class="tv-content">
      <div class="bg">
        <div class="content">
          <div class="image">
            <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/or06FN3Dka5tukK1e9sl16pB3iy.jpg" />
          </div>
          <div class="info">
            <div class="title">
              <a href="#">
                <h2><?php echo $row['nome'] ?></h2>
              </a>
              <span>(2019)</span>
            </div>
            <div class="meta-actions">
              <div class="score">
                <div class="percentage-circle">
                  <div class="percentage-circle-stroke">
                    <div class="percent">
                      <span>0<sup>%</sup>
                      </span>
                    </div>
                  </div>
                </div>
                <h1>User
                  <br>
                  Score</h1>
              </div>
              <ul>
                <li class="add-to-list">
                  <a href= "#"><i class="fas fa-list"></i></a>
                </li>
                <li class="favorite">
                  <a href= "#"><i class="fas fa-heart"></i></a>
                </li>
                <li class="add-to-watchlist">
                  <a href= "#"><i class="fas fa-bookmark"></i></a>    
                </li>
                <li class="rate-it">
                  <a href= "#"><i class="fas fa-star"></i></a>
                </li>
                <li class="play-trailer">
                  <span><i class="fas fa-play"></i></span>
                  <a href="#">Play Trailer</a>
                </li>
              </ul>
            </div>
            <div class="about">
              <div class="overview">
                <h3>Overview</h3>
                <p>After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos' actions and restore order to the universe once and for all, no matter what consequences may be in store.</p>
              </div>
              <div class="featured-crew">
                <h3>Featured Crew</h3>
                <ul>
                  <li>
                    <p>
                      <a href="#">John Waine</a>
                    <h1>Director</h1>
                  </p>
                </li>
              <li>
                <p>
                  <a href="#">John Waine</a>
                <h1>Director</h1>
              </p>
            </li>
          </ul>
      </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>