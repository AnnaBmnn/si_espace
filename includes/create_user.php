<?php
    if(isset($_POST['name_subscribe'])){
        // Retrieve inputs
        $name_subscribe = $_POST['name_subscribe'];
        $password = hash('sha256',$_POST['password']);

        $query = $pdo->query('SELECT * FROM users');
        $users = $query->fetchAll();
        
        $error = false;
        if(!empty($users)){
            foreach($users as $_user){
                if($name_subscribe == $_user->name)
                    $error = true;                
            }
        }
        // SQL query
        if(!$error){
            $_SESSION['user']=$name_subscribe;
            $prepare = $pdo->prepare('INSERT INTO users (name,password) VALUES (:name,:password)');
            $prepare->bindValue('name',$name_subscribe);
            $prepare->bindValue('password',$password);
            $prepare->execute();
            
            $sql = "CREATE TABLE galery_".$name_subscribe."(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                url TEXT,
                date_img DATE,
                date_add DATE,
                sol INT(255),
                id_rover INT(255) NOT NULL,
                camera VARCHAR(255) NOT NULL)";  
            $pdo->query($sql);                        //create a new table for each users in database
            header('Location: ../index.php'); 
            
        } else {
            echo 'le nom existe déjà';
        }
        
    }
