<?php
session_start();
ini_set('file_uploads', 'On');
require('connection.php');

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$category_id = $_POST['category'];
$name = $_POST['name'];
$text = $_POST['text-problem'];
$img = $_FILES['img'];
$datetime = date('Y-m-d H:i:s', time());
$status_id = 1;
$errors = [];
$error_request = [];

//var_dump($img);
if (!empty($_POST))

    if (empty($name) || empty($text) || empty($img) || empty($category_id)) {
        $errors[] = "Не все данные введены";
    } else {

        if (($category_id == 1) || ($category_id == 2) || ($category_id == 3)) {

            if (($img['type'] === 'image/jpeg') || ($img['type'] === 'image/bmp') || (($img['type'] === 'image/png') || (($img['type'] === 'image/jpg')))) {

                if ($img['size'] < 10485760) {

                    if (!$img['error']) {

                        if ($user_id == null) {
                            $errors[] = 'Сначала зарегистрируйтесь!';
                        } else {
                            $imgName = $img['name'];
                            $result = mysqli_query($connection, "INSERT INTO `application`(`id`, `name`, `text`, `img`, `category_id`, `user_id`, `status_id`, `date_time`, `img_after`) VALUES (NULL ,'$name','$text','$imgName','$category_id','$user_id','$status_id','$datetime',NULL)");
                            var_dump(mysqli_error($connection));
                            if ($result) {
                                move_uploaded_file($img['tmp_name'], 'upload_img/' . $img['name']);
                            }
                        }
                    }
                } else {
                    $errors[] = 'Файл слишком большой';
                }

            } else {
                $errors[] = 'Ошибка при добавлении фотографии';
            }

        } else {
            $errors[] = 'Введите существующую категорию';
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
    <title>Создание заявки</title>
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
            <form action="request.php" method="post" enctype="multipart/form-data">
                <div class="request">
                    <h1>Оставьте заявку</h1>
                    <label>Название заявки</label><br>
                    <input type="text" placeholder="Название заявки" name="name"><br>
                    <label>Описание проблемы</label><br>
                    <input type="text" placeholder="Проблема" name="text-problem"><br>
                    <label>Прикрепите фотографию</label><br>
                    <input type="file" name="img" value="Прикрепить"><br>
                    <label>Выберите категорию</label><br>
                    <input type="radio" name="category" value="1">Дороги<br>
                    <input type="radio" name="category" value="2">Животные<br>
                    <input type="radio" name="category" value="3">Здания<br>
                    <button type="submit" name="go" class="button">Отправить</button>
                    <br>

                    <?php if ($errors): ?>
                        <div class="errors">
                            <?php
                            foreach ($errors as $error) {
                                echo "<div class='error_message'>$error</div>";
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <br>
                </div>
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
</header>
</body>
</html>



