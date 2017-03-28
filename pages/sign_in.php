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
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <div class="login-box">
       <div class="left">
       </div>
        <div class="right">
          <div class="log">
           <a class="log1" href="#">SIGN IN</a>
           <a class="log2" href="sign_up.php">SIGN UP</a>
            </div>
            <form action="../index.php" method="post">
                <div>
                    <label for="name_login">Username</label>
                    <input type="text" name="name_login" value="" placeholder="JohnSmith" id="name_login">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" id="password" placeholder="*****">
                </div>
                <input type="submit">
            </form>
        </div>
</body>

</html>