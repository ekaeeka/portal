<?php
session_start();
require_once 'connection.php';

$name = $_SESSION['name'];
$errors = [];
$user_id = (int)$_SESSION['id'];$_SESSION['name'];

if ($user_id == null) {
    $errors[] = 'Вы не добавили ни одной заявки';
} else {
    $result = mysqli_query($connection, "SELECT * FROM `application` WHERE user_id = '$user_id'")->fetch_assoc();
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="container">
        <div class="content">
            <div class="logo">
                <a href="index.php"></a><img src="img/road-logo-2.png" alt="">
            </div>

            <div class="menu">
                <a href="index.php">Главная</a>
                <a href="request.php">Оставить заявку</a>
                <a href="my_application.php">Мои заявки</a>
                <a href="">О нас</a>
            </div>

            <div class="enter">
                <a href="account.php">
                    <?php
                    echo "Здравствуйте,  " . $_SESSION['name']; ?>
                </a>
                <!--            </div>-->
                <div class="logout-button">
                    <a href='session_stop.php' class='logout'>Выйти из аккаунта</a>
                </div>
            </div>
            <?php if ($errors): ?>
                <div class="errors">
                    <?php
                    foreach ($errors as $error) {
                        echo "<div class='error_message'>$error</div>";
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
</body>
</html>








