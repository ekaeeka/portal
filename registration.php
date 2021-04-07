<?php
session_start();
require_once 'connection.php';
//var_dump($_SESSION);


$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];
$errors = [];
$user_id = $_SESSION['id'];
$_SESSION['name'];


if (!empty($_POST)) {


    if ((empty($name) || empty($last_name) || empty($email) || empty($password))) {
        $errors[] = "Не все данные введены";
    } else {

        if ((strlen($name) < 2) || (strlen($last_name) < 2)) {
            $errors[] = "Имя и/или фамилия слишком короткие";
        } else {
            if ($result = mysqli_query($connection, "SELECT id  FROM `user` WHERE email='$email'")->num_rows) {
                $errors[] = "Такой мейл существует";
            } else {
                if (strlen($password) < 5) {
                    $errors[] = "Пароль ненадёжный!";
                } else {
                    if ($password === $password_two) {
                        $password = password_hash($password, PASSWORD_BCRYPT);

                        mysqli_query($connection, "INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `password`, `type`) VALUES (NULL, '$name', '$last_name', '$email', '$password', 1)");

                        $ok = true;
                    } else {

                        $errors[] = "Пароли не совпадают";
                    }
                    header("Location: login.php");
                }
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
    <link rel="stylesheet" href="registration.php">
    <title>Регистрация</title>
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
            <div class="form-registr">
                <form action="registration.php" method="post">
                    <h1>Регистрация</h1>
                    <br>
                    <label for="">Ваше имя</label>
                    <input type="text" name="name" placeholder="введите имя">

                    <label for="">Ваша фамилия</label>
                    <input type="text" name="last_name" placeholder="введите фамилию">

                    <label for="">Ваш email</label>
                    <input type="email" name="email" placeholder="введите email">

                    <label for="">придумайте пароль</label>
                    <input type="password" name="password" placeholder="введите пароль">

                    <label for="">Повторите пароль</label>
                    <input type="password" name="password_two" placeholder="введите пароль">

                    <button type="submit" name="butt" class="button2">Зарегистрироваться</button>

                    <p>Уже есть аккаунт? - <a href="login.php">Войти</a></p>
                    <?php if ($errors): ?>
                        <div class="errors">
                            <?php
                            foreach ($errors as $error) {
                                echo "<div class='error_message'>$error</div>";
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($ok): ?>
                        <div class="page">
                            <a href="login.php"></a>
                        </div>
                    <?php endif; ?>
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