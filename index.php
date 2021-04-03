<?php
session_start();
require_once 'connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Главная страница</title>
</head>
<body>
<header>
    <div class="container">
        <div class="content">
            <div class="logo">
                <img src="img/road-logo-2.png" alt="">
            </div>

            <div class="menu">
                <a href="">Главная</a>
                <a href="request.php">Оставить заявку</a>
                <a href="">Контакты</a>
                <a href="">О нас</a>
            </div>

            <div class="enter">
                <a href="signup.php"><img src="img/user.png" alt=""></a>
            </div>
        </div>
    </div>
</header>
</body>
</html>
