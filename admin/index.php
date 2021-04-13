<?php
session_start();
require('../connection.php');

$errors = [];

if ($_SESSION['user_type'] != 2) {
    header('Location: ../index.php');
}
($result = mysqli_query($connection, "SELECT * FROM `application` WHERE name=:name ")->fetch_all());


