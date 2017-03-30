<?php

  session_start();
  include '../includes/config.php';
  include '../includes/log_out.php';

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
                <div class="img_plus">CLICK FOR<br>MORE INFORMATIONS</div>
              </div>
              <img src="<?= $_photo->url ?>" />
            </div>     
        <?php endforeach; ?>
      </div>
    </div>
    
  </div>
  
  <a class="back_top"><img src="../assets/img/cd-top-arrow.svg"></a>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../assets/js/script.min.js"></script>

</body>
</html>