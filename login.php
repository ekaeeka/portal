<?php
session_start();
require 'connection.php';

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];


if (isset($_POST['butt'])) {
    if (!empty($_POST)) {

        if ((empty($_POST['email']) || empty($_POST['password']))) {

            $errors[] = "Не все данные введены";
        } else {
            $result = mysqli_query($connection, "SELECT * FROM `user` WHERE email='$email'")->fetch_assoc();


            if (!empty($result)) {

                if (password_verify($_POST['password'], $result['password'])) {
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['id'] = $result['id'];

                    $ok = true;

                    header("Location: my_application.php");

                } else {
                    $errors[] = "Неверный пароль";
                }

            } else {
                $errors[] = "Такого пользователя  не существует";
            }

        }

    }

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
    <title>Авторизация</title>
</head>
<body>
<header>
    <div class="back">
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
                    <?php
                    if ($user_id == null) {
                        echo "<div><a href='login.php'><img src='img/user.png' alt=''></a></div>";
                    } else {
                        echo " <div class='enter'>
                <a href='my_application.php.php'>
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
            <div class="form-autorization">
                <form action="login.php" method="post">
                    <h1>Вход</h1>
                    <br>
                    <label for="">Логин</label>
                    <input type="text" name="email" placeholder="Введите логин">
                    <label for="">Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">

                    <?php if ($errors): ?>
                        <div class="errors">
                            <?php
                            foreach ($errors as $error) {
                                echo "<div class='error_message'>$error</div>";
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit" name="butt" class="button2">Войти</button>
                    <?php if ($ok): ?>
                        <div class="page">
                            <a href="index.php"></a>
                        </div>
                    <?php endif; ?>

                    <p>Нет аккаунта? - <a href="registration.php">зарегистрируйтесь</a></p>
                </form>
            </div>
            <footer>
                <div class="container">
                    <div class="content-footer">
                        <div class="text-1">
                            <p>
                                Политика конфиденциальности<br>
                                Все права защищены<br>
                                Любимый аквт<br>
                            </p>
                        </div>
                        <div class="text-2">
                            <p>Главная<br>
                                О нас<br>
                                Контакты<br>
                                Оставить заявку<br>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</header>
</body>
</html>



