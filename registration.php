<?php
session_start();
require_once 'connection.php';


$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];

if (!empty($_POST)) {


    if ((empty($name) || empty($last_name) || empty($email) || empty($password))) {
        die("Не все данные введены");
    }

    $result = mysqli_query($connection, "SELECT count(id) as 'em' FROM `user` WHERE email=$email"); //> 0" // выбросить ошибку

    $count = 0;
    while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
        $count = $row['email'];
    }
    var_dump($count);

    if ($password === $password_two) {

        $password = md5($password);


        mysqli_query($connection, "INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `password`, `type`) VALUES (NULL, '$name', '$last_name', '$email', '$password', 1)");

        header('Location: index.php');
    } else {

        $_SESSION['message'] = "Пароли не совпадают";
    }
} else {
    echo <<<HTML

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>
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

        <input type="submit" name="butt" class="button" placeholder="Зарегистрироваться">

        <p>Уже есть аккаунт? - <a href="index.php">Войти</a></p>
        
            </form>
</div>
</body>
</html>

HTML;

}

//        <?php
//        if ($_SESSION['message']) {
//            echo '<p class="error_message"> ' . $_SESSION['message'] . '</p>';
//        }
//        unset($_SESSION['message']);
//        ?>


