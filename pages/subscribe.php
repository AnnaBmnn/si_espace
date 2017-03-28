<?php

  include '../includes/config.php';

// Retrieve inputs
$username = $_POST['username'];
$password = hash('sha256',$_POST['password']);

// SQL query
$prepare = $pdo->prepare('INSERT INTO users (username,password) VALUES (:username,:password)');
$prepare->bindValue(':username',$username);
$prepare->bindValue(':password',$password);
$exec = $prepare->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyTO-DO LIST</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>

<body>
  <header>
    <div class="nav">
      <h1><a href="../index.php"><span>My</span>TO-DO LIST</a></h1>
    </div>
  </header>
  
  <div class="container">
    <a href="../index.php" class="login_after_action">LOGIN</a>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>