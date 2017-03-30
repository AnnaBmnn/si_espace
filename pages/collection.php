<?php
  session_start();
  include '../includes/config.php';
  include '../includes/log_out.php';
  include '../includes/delete_photo_liked.php';

  // Préparation de la requête
  $query = $pdo->query('SELECT * FROM galery_'.$_SESSION['user']);

  // Éxécution de la requête et récupération des données
  $photos_display = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rover's Eyes</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="../assets/img/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="../assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="../assets/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>

<body>
   
  <div class="loader"></div>
  
  <header class="no_animations">
    <nav>
      <a href="../index.php" target="_self" title="Home" id="home">R<img src="../assets/img/logo_mars.png" alt="Logo">VER'S EYES</a>
      <div class="nav_links">
        <a href="../index.php#gallery_anchor" title="Gallery" id="gallery">GALLERY</a>
        <a href="#" title="My Collection">MY COLLECTION</a>
        <a href="../index.php?log_out=true" title="Log out" class="log_out">LOG OUT</a>
      </div>
    </nav>
  </header>
  
  <div id="content" class="container">
    <div class="gallery">
      <div class="gallery_title"><h2>COLLECTION</h2></div>
      <div class="gallery_display">
          <?php foreach($photos_display as $_photo): ?>
          <?php
          if(array_key_exists('user', $_SESSION)){
            $query_galery = $pdo->query('SELECT id_rover FROM galery_'.$_SESSION['user'].' WHERE id_rover='.$_photo->id);

            // Éxécution de la requête et récupération des données
            $photo_liked = $query_galery->fetch();
          }
          ?>
          <div class="img_container">

            <div class="img_actions">
              <div class="corner_top_left"></div>
              <div class="corner_top_right"></div>
              <div class="corner_bottom_right"></div>
              <div class="corner_bottom_left"></div>
              <div class="img_plus ">CLICK FOR<br>MORE INFORMATIONS</div>
            </div>
            <img src="<?= $_photo->url ?>" class="img_img"/>
            <div class="modal">
              <div class="line_close"></div> 
              <span class="modal_close">></span>
              <div class="modal_content">
                <img class="modal_img" src="<?= $_photo->url ?>">
                <div class="modal_infos">
                  <h3>PHOTO <em>#<?= $_photo->id ?></em></h3>
                  <ul>
                    <li>Date : <?= $_photo->date ?></li>
                    <li>Camera : <?= $_photo->camera ?></li>
                    <li>Min Temperature : N/A</li>
                    <li>Max Temperature : N/A</li>
                    <li>Atmospheric Pressure : N/A</li>
                    <li>Humidity : N/A</li>
                    <li>Wind Direction : N/A</li>
                    <li>Weather Status : N/A</li>
                  </ul>

                  <div class="add_button add_collection" data-id="<?= $_photo->id ?>" data-like="true">
                    
                    <a href="?delete=<?= $_photo->id ?>">- DELETE FROM YOUR COLLECTION</a>
                  </div>
                  <a class="twitter" href="https://twitter.com/intent/tweet?text=Rover's Eyes Photo n°<?= $_photo->id ?> <?= $_photo->url ?>" target="_blank"><img src="../assets/img/twitter.png" alt="twitter">Tweet</a>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach; ?>
        </div>
      </div>
      </div>
    </div>
    
  </div>
  
  <a class="back_top"><img src="../assets/img/cd-top-arrow.svg"></a>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../assets/js/script.min.js"></script>

</body>
</html>