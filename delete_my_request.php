<?php
session_start();
require 'connection.php';

$errors = [];
$id = $_SESSION['id'];
$user_id = (int)$_SESSION['id'];


if ($_POST['go-delete']) {
     "<form method='post'><div class='yes-or-no'><p>Вы действительно хотите удалить заявку?</p>
               <button type='submit' name='yes'>Да</button><br><a href=''>Нет</a></div></form>";

    if ($_POST['no']) {
        $errors[] = 'Вы отменили удаление';
    } else {
        $result = mysqli_query($connection,"DELETE FROM `application` WHERE id = '$id'");
    }
}

if ($errors): ?>
    <div class="errors">
        <?php
        foreach ($errors as $error) {
            echo "<div class='error_message'>$error</div>";
        }
        ?>
    </div>
<?php endif; ?>
