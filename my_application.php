<?php
session_start();
require 'connection.php';

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$errors = [];
$error_request = [];
$datetime = date('Y-m-d', time());


if ($user_id == null) {
    $error_request[] = 'Вы не зарегистрированны и не можете добавлять заявки';
} else {
    if ($result = mysqli_query($connection, "SELECT * FROM `application` WHERE user_id = '$user_id'")->num_rows) {
        $result = mysqli_query($connection, "SELECT * FROM `application` WHERE user_id = '$user_id'")->fetch_all();
//        var_dump($result);
    } else {
        $error_request[] = 'У вас нет отправленных заявок';
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
            <?php
            foreach ($result as $results) {

                echo "<div class='request-style'>
                      <h4>Категория заявки: </h4> " . $results[6] . "<br> 
                      <h4>Название:</h4> " . $results[1] . "<br>
                      <h4> Статус заявки: </h4> " . $results[7] . "<br> 
                      <h4>Фотография</h4><img src= '/upload_img/$results[3]' alt='' class='request-img-size'><p>
                      <h4>Описание проблемы:</h4>" . $results[2] . "</p><br> 
                      <h4>Автор:</h4>" . $_SESSION['name'] . " <br>
                      <h4>Дата публикации:</h4>" . $results[5] . "<br> 
                      <a href='delete_my_request.php?id=".$results[0]."' class='delete_request_button'>Удалить заявку</a></div>";
            }

            ?>
        </div>
        <?php if ($error_request): ?>
        <div class="errors">
            <?php endif; ?>
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
</header>
</body>
</html>