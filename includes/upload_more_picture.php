<?php
    session_start();
    include 'config.php';
    $min_id = $_POST['load']*60;
    $max_id = ($_POST['load']+1)*60+1;

    $query = $pdo->query('SELECT * FROM rover_photo ORDER BY score DESC LIMIT '.$min_id.','.$max_id);

    // Éxécution de la requête et récupération des données
    $photos_load = $query->fetchAll();
    foreach($photos_load as $_photo){
      $_photo->session = 'false';
    }
    if(array_key_exists('user', $_SESSION)){
        foreach($photos_load as $_photo){
          $_photo->like = 'false';
          $query_galery = $pdo->query('SELECT * FROM galery_'.$_SESSION['user'].' WHERE id_rover='.$_photo->id);
          $photos_liked = $query_galery->fetch();
          if(!empty($photos_liked)){
            $_photo->like = 'true';
          }
          $_photo->session = 'true';
        }
        
    }

    echo json_encode($photos_load);