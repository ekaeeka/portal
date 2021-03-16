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

        <button>Зарегистрироваться</button>

        <p>Уже есть аккаунт? - <a href="index.php">Войти</a></p>


            <?php
            if ($_SESSION['message']){
                echo '<p class="error_message"> '. $_SESSION['message'] .'</p>';
            }
            unset($_SESSION['message']);
            ?>

    </form>
</div>
</body>
</html>
