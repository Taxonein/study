<?php
session_start();
require_once __DIR__ . '../connect.php';

$fullname = filter_var(trim($_POST['fullname']),
FILTER_SANITIZE_STRING);

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);

$password_reply = filter_var(trim($_POST['password_reply']),
FILTER_SANITIZE_STRING);

$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);

global $pdo;
$logincheck = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login'");
$logincheckdata = $logincheck->fetch();
$mailcheck = $pdo->query("SELECT * FROM `users` WHERE `mail` = '$email'");
$mailcheckdata = $mailcheck->fetch();

if (!$logincheckdata){
    if (!$mailcheckdata){
        if ($password === $password_reply){
        $password = md5($password);
        $pdo->query("INSERT INTO `users` ( `login`, `fullname`, `mail`, `pass`)VALUES('$login', '$fullname', '$email', '$password') ");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: register.php');
    } else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: register.php');
    }
    }else{
        $_SESSION['message'] = 'Даная почта занята';
        header('Location: register.php');
    }
}else{
    $_SESSION['message'] = 'Данный логин занят';
    header('Location: register.php');
}
?>