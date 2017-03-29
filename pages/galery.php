<?php
    session_start();
    include '../includes/config.php';
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
  
  <header class="preload">
    <nav>
      <a href="index.php" target="_self" title="Home" id="home">ROVER'S EYES</a>
      <div class="nav_links">
        <a href="#gallery_anchor" title="Gallery" id="gallery">GALLERY</a>
        <a href="pages/sign_up.php" title="SignUp">SUBSCRIBE</a>
        <a href="pages/sign_in.php" title="SignIn">LOGIN</a>
      </div>
    </nav>
  </header>
  
  <div id="content" class="container preload">
    <div class="gallery" id="gallery_anchor">
      <div class="gallery_title"><h2>PHOTOS GALLERY</h2></div>
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
                <div class="img_plus" data-id="<?= $_photo->id ?>" data-like="<?=array_key_exists('user', $_SESSION)? empty($photo_liked)?'false':'true':'false' ?>">+</div>
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