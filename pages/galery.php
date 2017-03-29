<?php
    session_start();
    include '../includes/config.php';


    // Préparation de la requête
    $query = $pdo->query('SELECT * FROM galery_Anna');

    // Éxécution de la requête et récupération des données
    $photos_display = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>A View From Mars</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>

<body class="preload">    
    <div class="galery">
      <h2>PHOTOS_GALERY</h2>
      <?php foreach($photos_display as $_photo): ?>
          <div class="img_container" data-id="<?= $_photo->id ?>" data-like="false">
              
            <div class="img_actions">
              <img src="../assets/img/Hearts.png" alt="Like">
            </div>
            <div class="corner corner_top_left"> </div>
            <div class="corner corner_bottom_left"> </div>
            <div class="corner corner_bottom_right"> </div>
            <span>CLICK FOR MORE INFORMATIONS</span>
                <img src=<?= $_photo->url ?> >
              
          </div>     
      <?php endforeach; ?>
    </div>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</body>
</html>