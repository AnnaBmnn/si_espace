 <?php 

    require 'config.php';
    // Préparation de la requête

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
        
        

        $prepare = $pdo->prepare('INSERT INTO galery_Anna (url, date_img, date_add, sol, id_rover, camera) VALUES (:url, :date_img, :date_add, :sol, :id_rover, :camera)');
        $prepare->bindValue('url',$url);
        $prepare->bindValue('date_img',$date_img);
        $prepare->bindValue('date_add',$date_add);
        $prepare->bindValue('sol',$sol);
        $prepare->bindValue('id_rover',$id_rover);
        $prepare->bindValue('camera',$camera);
        $prepare->execute();  
            
    }
        



echo '<pre>';
print_r($_POST);
echo '</pre>';

