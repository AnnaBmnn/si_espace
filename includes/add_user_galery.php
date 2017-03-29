<?php 
    session_start();
    include 'config.php';
    
    $prepare_delete = $pdo->query('DELETE FROM galery_'.$_SESSION['user']);
    $prepare_delete->execute();

    foreach($_POST as $_id){  
            $query = $pdo->query('SELECT * FROM rover_photo WHERE id='.$_id);
            // Éxécution de la requête et récupération des données
            $photo = $query->fetch();
            
            $url = $photo->url;
            $date_img = $photo->date;
            $date_add = date('h:i:s');
            $sol = $photo->sol;
            $id_rover = $photo->id;
            $camera = $photo->camera; 
        
            $prepare_score = $pdo->prepare('UPDATE rover_photo SET score = :score WHERE id= :id');
            $prepare_score->bindValue('id',$_id);
            $prepare_score->bindValue('score',$photo->score+1);
            $prepare_score->execute();    
        

            $prepare = $pdo->prepare('INSERT INTO galery_'.$_SESSION['user'].' (url, date_img, date_add, sol, id_rover, camera) VALUES (:url, :date_img, :date_add, :sol, :id_rover, :camera)');
            $prepare->bindValue('url',$url);
            $prepare->bindValue('date_img',$date_img);
            $prepare->bindValue('date_add',$date_add);
            $prepare->bindValue('sol',$sol);
            $prepare->bindValue('id_rover',$id_rover);
            $prepare->bindValue('camera',$camera);
            $prepare->execute();
        }