<?php
session_start();
require_once 'connection.php';


$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];
$errors = [];

//if (strlen($_POST['password'])<10){
//    $e
//}

if (!empty($_POST)) {


    if ((empty($name) || empty($last_name) || empty($email) || empty($password))) {
        $errors[] = "Не все данные введены";
    }
    else{

        

        if ($result = mysqli_query($connection, "SELECT id  FROM `user` WHERE email='$email'")->num_rows){
            $errors[] = "Такой мейл существует";
        }
        else{
            if ($password === $password_two) {

                $password = md5($password);



                mysqli_query($connection, "INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `password`, `type`) VALUES (NULL, '$name', '$last_name', '$email', '$password', 1)");

                $ok = true;
            } else {

               $errors[] = "Пароли не совпадают";
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
<?php if ($errors):?>
<div class="errors">
    <?php
     foreach ($errors as $error){
         echo "<div class='error_message'>$error</div>";
     }
    ?>
</div>
<?php endif;?>

<?php if($ok):?>
<div class="page">
    <a href="index.php">Вы зарегистрированны,войдите</a>
</div>
<?php endif;?>
</body>
</html>






