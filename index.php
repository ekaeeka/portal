<?php
session_start();
require_once 'connection.php';

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$errors = [];
$error_request = [];
$datetime = date('Y-m-d', time());


($result = mysqli_query($connection, "SELECT * FROM `application` WHERE id > 2")->num_rows);
$result = mysqli_query($connection, "SELECT * FROM `application` WHERE id >2")->fetch_all();
//        var_dump($result);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Главная страница</title>
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
            <div class="request-index">
                <?php
                foreach ($result as $results) {
                    echo "<div class='request-style-index'> <h3>Категория заявки: </h3> " . $results[6] . "<br> <h3>Название:</h3> " . $results[1] . "<br> <h3>Фотография</h3><img src= '/upload_img/$results[3]' alt='' class='request-img-size-index'><p><br><h3>Дата публикации:</h3>" . $results[5] . "</div>";
                }

                ?>
                <?php if ($error_request): ?>
                <div class="errors">
                    <?php endif; ?>
                </div>
            </div>

            <div class="solve-problem">
                <div class="problem-1">
                    <h3>
                        Ямы на дорогах
                    </h3>
                    <p>
                        Ямы на дорогах частая проблема в нашем регионе.<br>
                        Однако наш портал уже занят решением этой проблемы.<br>
                    </p>
                    <img src="img/road.jpg" alt="" class="road-img">
                </div>

                <div class="problem-2">
                    <h3>
                        Бродячие собаки
                    </h3>
                    <p>
                        Бродячие собаки частая проблема в нашем регионе.<br>
                        Однако наш портал уже занят решением этой проблемы.<br>
                    </p>
                    <img src="img/dogs.jpg" alt="" class="dogs-img">
                </div>

                <div class="problem-3">
                    <h3>
                        Дома в аварийном состоянии
                    </h3>
                    <p>
                        Дома в аварийном состоянии главная проблема в нашем регионе.<br>
                        Однако наш портал уже занят решением этой проблемы.<br>
                    </p>
                    <img src="img/house.jpg" alt="" class="house-img">
                </div>
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
    </div>
</header>
</body>
</html>
