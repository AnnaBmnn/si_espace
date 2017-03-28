<?php
    include '../includes/config.php';
    include '../includes/create_user.php';

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
                <a class="log1" href="sign_in.php">SIGN IN</a>
                <a class="log2" href="#">SIGN UP</a>
            </div>
            <form action="#" method="post">
                <div>
                    <label for="name_subscribe">Choose a username</label>
                    <input type="text" name="name_subscribe" value="" placeholder="JohnSmith" id="user">
                </div>
                <div>
                    <label for="email">Enter your email</label>
                    <input type="text" name="user" value="" placeholder="JohnSmith" id="user">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" id="password" placeholder="*****">
                </div>
                <div>
                    <label for="pswd">Confirm the password</label>
                    <input type="password" name="pswd" value="" id="pswd" placeholder="*****">
                </div>
                <input type="submit">
            </form>
        </div>
</body>

</html>