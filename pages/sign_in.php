<?php
    session_start();
    include '../includes/config.php';
    include '../includes/login_user.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Rover's Eyes</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
   
  <header class="no_animations">
    <nav>
      <a href="../index.php" target="_self" title="Home" id="home">ROVER'S EYES</a>
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
          <a class="link_1 active" href="sign_in.php">SIGN IN</a>
          <a class="link_2" href="sign_up.php">SIGN UP</a>
      </div>
      <form action="#" method="post">
        <div>
          <label for="name_login">USERNAME</label>
          <input type="text" name="name_login" value="" placeholder="" id="name_login">
        </div>
        <div>
          <label for="password">PASSWORD</label>
          <input type="password" name="password" value="" id="password" placeholder="">
        </div>
        <input type="submit" value="LOG IN">
    </form>
    </div>
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="assets/js/script.min.js"></script>

</body>
</html>