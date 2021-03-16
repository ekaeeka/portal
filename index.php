<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>
<body>
<div class="form-autorization">
    <form>
        <h1>Вход</h1>
        <br>
        <label for="">Логин</label>
        <input type="text" placeholder="Введите логин">
        <label for="">Пароль</label>
        <input type="password" placeholder="Введите пароль">
        <input type="password" placeholder="Повторите пароль">
        <button>
            Войти
        </button>
        <p>Нет аккаунта? - <a href="registration.php">зарегистрируйтесь</a></p>
    </form>
</div>
</body>
</html>
<?php
require_once 'connection.php';
