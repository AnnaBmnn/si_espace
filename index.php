<?php
  
    include 'includes/config.php';

    // Préparation de la requête
    $query = $pdo->query('SELECT * FROM rover_photo WHERE sol=100');

    // Éxécution de la requête et récupération des données
    $photos_display = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>A View From Mars</title>
  <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body class="preload">
  
  <div class="container">
    
    <span class="hide_left"><</span>
    <div class="informations">
      <div class="mission_informations">
        <h1>ROVER: <em>CURIOSITY</em></h1>
        <h2>OPERATOR: <em>NASA</em></h2>
        <h2>MISSION: <em>MARS_EXPLORATION</em></h2>
      </div>

      <div class="rover_informations">
        <h2>ROVER_INFORMATIONS</h2>
        <div>
          <span>LAUNCH_DATE: <em>NOVEMBER, 26, 2011 15:02:00 UTC</em></span><br>
          <span>LAUNCH_SITE: <em>CAPE CANAVERAL LC-41</em></span><br>
          <br>
          <span>LANDING_DATE: <em>AUGUST 6, 2012, 05:17:57 UTC</em></span><br>
          <span>LANDING_SITE: <em>AEOLIS PALUS, GALE CRATER</em></span>
        </div>
        <div>
          <p>DIMENSIONS:
            <br>- MASS: <em>1,982 lb </em>
            <br>- L/W/H: <em>9.5 x 8.9 x 7.2 ft</em>
          </p>
          <span>POWER: <em>MMRTG</em></span><br>
          <span>COM: <em>UHF_E-LITE</em></span><br>
          <span>MS: <em>RB_S</em></span><br>
        </div>
        <div>
          <p>INSTRUMENTS:<br>
            - MAST_CAM<br>
            - CHEM_CAM<br>
            - NAV_CAMS<br>
            - REMS<br>
            - HAZ_CAMS<br>
            - MAHLI<br>
            - APXS<br>
            - CHE_MIN<br>
            - SAM<br>
            - DRT<br>
            - RAD<br>
            - DAN<br>
            - MARDI<br>
            - ROBOTIC_ARM<br>
          </p>
        </div>
      </div>
    </div>
    <?php foreach($photos_display as $_photo): ?>
        <div class="img-container">
            <img src="<?= $_photo->url ?>" alt="mars">    
        </div>     
    <?php endforeach; ?>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="assets/js/script.min.js"></script>

</body>
</html>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>Inventory Cheese</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php foreach($photos_display as $_photo): ?>
            <div class="img-container">
                <img src="<?= $_photo->url ?>" alt="mars">    
            </div>     
        <?php endforeach; ?>
    </body>    
</html>