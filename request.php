<?php
session_start();

require('connection.php');
$user_id = $_SESSION['id'];
$category_id = $_SESSION['name'];
$name = $_POST['name'];
$text = $_POST['text'];
$img = $_POST['img'];
$datetime = date('Y-m-d', time());
$status_id = $_SESSION['name'];


if (!empty($_POST))

    if ((empty($name) || empty($text) || empty($img))) {
        $errors[] = "Не все данные введены";
    } else {

        $result = mysqli_query($connection, "INSERT INTO `application` (`id`, `name`, `text`, `img`, `user_id`, `date_time`,`status_id`,`category_id
`) VALUES (NULL, '$name', '$text', '$img','$user_id','$datetime', '$status_id', '$category_id'");

        $okay = true;


//    $errors = 'Вы отправили заявку';
//    "<div><a href='index.php'></a></div>";
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
    <title>Создание заявки</title>
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
                <a href="">Контакты</a>
                <a href="">О нас</a>
            </div>

            <div class="enter">
                <a href="signup.php"><img src="img/user.png" alt=""></a>
            </div>
        </div>
        <div class="request">
            <h1>Оставьте заявку</h1>
            <label>Название заявки</label><br>
            <input type="text" placeholder="Название заявки" name="name"><br>
            <label>Описание проблемы</label><br>
            <input type="text" placeholder="Проблема" name="text-problem"><br>
            <label>Прикрепите фотографию</label><br>
            <input type="file" name="img" value="Прикрепить"><br>
            <label>Выберите категорию</label><br>
            <input type="checkbox" name="category-1">Дороги<br>
            <input type="checkbox" name="category-2">Животные<br>
            <input type="checkbox" name="category-3">Здания<br>
            <button type="submit" name="go" class="button">Отправить</button>
            <br>
        </div>
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
</header>
</body>
</html>



