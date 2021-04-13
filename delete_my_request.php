<?php
session_start();
require 'connection.php';

$errors = [];
$id = $_GET['id'];
$user_id = (int)$_SESSION['id'];
$request = mysqli_query($connection, "SELECT * FROM `application` where id = '$id' AND user_id = '$user_id'")->fetch_assoc();
if ($request) {
    if (!empty($_POST)) {

        if ($_POST['yes']) {
            mysqli_query($connection, "DELETE FROM application where id = '$id'");
            $errors[] = "Вы успешно удалили запись. <a href='my_application.php'>Вернуться</a>";
        }
    }
} else {
    header("Location: /");
}

if ($errors): ?>
<div class="errors">
    <?php
    foreach ($errors as $error) {
        echo "<div class='error_message'>$error</div>";
    }
    ?>
</div>
<?php //else: ?>
<!--    <form method='post'>-->
<!--        <div class='yes-or-no'><p>Вы действительно хотите удалить заявку?</p>-->
<!--            <button type='submit' name='yes'>Да</button>-->
<!--            <br><a href="/my_application.php">Нет</a></div>-->
<!--    </form>-->
<?php //endif; ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Мои заявки</title>
</head>
<body>
<header>
    <div class="back">
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img src="img/road-logo-2.png" alt="">
                </div>

                <div class="menu">
                    <a href="index.php">Главная</a>
                    <a href="request.php">Оставить заявку</a>
                    <a href="my_application.php">Мои заявки</a>
                    <a href="">О нас</a>
                </div>

                <div class="enter">
                    <?php
                    if ($user_id == null) {
                        echo "<div><a href='login.php'><img src='img/user.png' alt=''></a></div>";
                    } else {
                        echo " <div class='enter'>
                <a href='account.php'>
                Здравствуйте," . $_SESSION['name'] . " 
                  </a>
                  <div class='logout-button'>
                    <a href='session_stop.php' class='logout'>Выйти из аккаунта</a>
                </div>
            </div>";
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>

</header>
<?php else: ?>
    <form method='post'>
        <div class='yes-or-no'><p>Вы действительно хотите удалить заявку?</p>
            <button type='submit' name='yes'>Да</button>
            <br><a href="/my_application.php">Нет</a></div>
    </form>
<?php endif; ?>


</body>
</html>
