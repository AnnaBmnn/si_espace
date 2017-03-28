<?php

if(isset($_POST['name_login'])){
    // Retrieve inputs
    $name_login    = $_POST['name_login'];
    $password = hash('sha256',$_POST['password']); 

    // SQL query
    $prepare = $pdo->prepare('SELECT * FROM users WHERE name = :name LIMIT 1');
    $prepare->bindValue('name',$name_login);
    $prepare->execute();
    $user = $prepare->fetch();

    // Test password
    if($user->password == $password)
        echo 'You shall pass !';
    else
        echo 'You shall not pass !';
}
