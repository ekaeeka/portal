<?php
session_start();
require_once 'connection.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];

if($password===$password_two){

}else{
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: registration.php');
}