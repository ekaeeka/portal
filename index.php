<?php
session_start();
require 'connection.php';

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['butt'])) {
    if (!empty($_POST)) {

        if ((empty($_POST['email']) || empty($_POST['password']))) {
//            echo "первый шаг";
            $errors[] = "Не все данные введены";
        } else {
            $result = mysqli_query($connection, "SELECT * FROM `user` WHERE email='$email'")->fetch_assoc();
//            var_dump($result);


            if ($result != null) {

                if(password_verify($_POST['password'], $result['password'])){
                    $_SESSION['name']=$result['name'];
                    $_SESSION['last_name']=$result['last_name'];
//                    echo "второй шаг";

                    $ok=true;
                }else{
                    $errors[]="Неверный пароль";
                }

//                echo "третий шаг";
            } else {
                $errors[]="Такого пользователя  не существует";
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
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>
<body>
<div class="form-autorization">
    <form action="index.php" method="post">
        <h1>Вход</h1>
        <br>
        <label for="">Логин</label>
        <input type="text" name="email" placeholder="Введите логин">
        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">

        <button type="submit" name="butt">Войти</button>

        <p>Нет аккаунта? - <a href="registration.php">зарегистрируйтесь</a></p>
    </form>
</div>
</body>
</html>
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
        <a href="signup.php">Добро пожаловать!</a>
    </div>
<?php endif; ?>