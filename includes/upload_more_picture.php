<?php
    session_start();
    include 'config.php';
    $min_id = $_POST['load']*60;
    $max_id = ($_POST['load']+1)*60+1;

    $query = $pdo->query('SELECT * FROM rover_photo WHERE id>'.$min_id.' AND id<'.$max_id);

    // Éxécution de la requête et récupération des données
    $photos_load = $query->fetchAll();


/*
$query_galery = $pdo->query('SELECT id_rover FROM galery_aa WHERE id_rover>'.$min_id.' AND id_rover<'.$max_id);

// Éxécution de la requête et récupération des données
        $photo_liked = $query_galery->fetch();
    echo json_encode($photo_liked);*/

    if(array_key_exists('user', $_SESSION)){
        $query_galery = $pdo->query('SELECT * FROM galery_'.$_SESSION['user'].' WHERE id_rover>'.$min_id.' AND id_rover<'.$max_id);

// Éxécution de la requête et récupération des données
        $photos_liked = $query_galery->fetchAll();
        foreach($photos_load as $_photo){
            $_photo->like = 'false';
            foreach($photos_liked as $_photo_liked){
                if($_photo->id == $_photo_liked->id_rover){
                    $_photo->like = 'true';
                }
            }
        
        }
        
    }

 /*       
        echo '<div class="img_container">
            <div class="img_actions">
            <div class="corner_top_left"></div>
            <div class="corner_top_right"></div>
            <div class="corner_bottom_right"></div>
            <div class="corner_bottom_left"></div>
            <div class="img_plus" data-id="'.$_photo->id.'" data-like='.array_key_exists("user", $_SESSION)? empty($photo_liked)?"false":"true":"false".'>+</div>
          </div>
          <img src="'.$_photo->url.'" />
        </div>'   ; 
    }*/
    
    echo json_encode($photos_load);