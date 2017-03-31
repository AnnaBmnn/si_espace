<?php 
    session_start();
    include 'config.php';

    //get the table photo_liked from javascript
    foreach($_POST as $_id){ 
            //get the information of the picture in the rover_photo BDD
            $query = $pdo->query('SELECT * FROM rover_photo WHERE id='.$_id);
            // Éxécution de la requête et récupération des données
            $photo = $query->fetch();
            
            $url = $photo->url;
            $date_img = $photo->date;
            $date_add = date('h:i:s');
            $sol = $photo->sol;
            $id_rover = $photo->id;
            $camera = $photo->camera; 
        
            //upagrade the score of the picture
            $prepare_score = $pdo->prepare('UPDATE rover_photo SET score = :score WHERE id= :id');
            $prepare_score->bindValue('id',$_id);
            $prepare_score->bindValue('score',$photo->score+1);
            $prepare_score->execute();    
        
            //insert the photos liked in the data base
            $prepare = $pdo->prepare('INSERT INTO galery_'.$_SESSION['user'].' (url, date_img, date_add, sol, id_rover, camera) VALUES (:url, :date_img, :date_add, :sol, :id_rover, :camera)');
            $prepare->bindValue('url',$url);
            $prepare->bindValue('date_img',$date_img);
            $prepare->bindValue('date_add',$date_add);
            $prepare->bindValue('sol',$sol);
            $prepare->bindValue('id_rover',$id_rover);
            $prepare->bindValue('camera',$camera);
            $prepare->execute();
        }