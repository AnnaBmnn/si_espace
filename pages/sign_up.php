<?php
  session_start();
  include '../includes/config.php';
  include '../includes/create_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title>Rover's Eyes</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="../assets/img/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="../assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="../assets/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
  
  <header class="no_animations">
    <nav>
      <a href="../index.php" target="_self" title="Home" id="home">R<img src="../assets/img/logo_mars.png" alt="Logo">VER'S EYES</a>
      <div class="nav_links">
        <a href="../index.php#gallery_anchor" title="Gallery" id="gallery">GALLERY</a>
        <a href="sign_up.php" title="SignUp">SUBSCRIBE</a>
        <a href="sign_in.php" title="SignIn">LOGIN</a>
      </div>
    </nav>
  </header>
 
  <div class="container login-box">
    <div class="form_img">
      <img src="../assets/img/mars-form.JPG" alt="Mars">
      <div class="img_filter"></div>
    </div>
    <div class="form_text">
      <div class="form_links">
          <a class="link_1" href="sign_in.php">SIGN IN</a>
          <a class="link_2 active" href="sign_up.php">SIGN UP</a>
      </div>
      <form action="#" method="post">
        <div>
          <label for="name_subscribe">USERNAME</label>
          <input type="text" name="name_subscribe" value="" placeholder="" id="name_subscribe">
        </div>
        <div>
          <label for="password">PASSWORD</label>
          <input type="password" name="password" value="" id="password" placeholder="">
        </div>
        <input type="submit" value="SUBSCRIBE">
    </form>
    </div>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="assets/js/script.min.js"></script>
  
</body>  
</html>