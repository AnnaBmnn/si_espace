<?php
  
  include '../includes/config.php';
  
  // Retrieve inputs
  $username = $_POST['username'];
  $password = hash('sha256',$_POST['password']);

  // SQL query
  $prepare = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
  $prepare->bindValue(':username',$username);
  $query = $prepare->execute();
  $username = $prepare->fetch();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyTO--DO LIST</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>

<body>
  <header>
    <div class="nav">
      <h1><a href="../index.php"><span>My</span>TO-DO LIST</a></h1>
    </div>
  </header>
  
  <div class="container">
    <?php
      if($username->password == $password){
        echo '<a href="home.php" class="login_after_action">CONTINUE</a><script>setTimeout(function(){location.href="home.php"},1000);</script>';
      }else{
        echo '<a href="../index.php" class="login_after_action">RETRY</a>
        <script>setTimeout(function(){location.href="../index.php"},2000);</script>';
      }
    ?>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>