<?php
session_start();
require_once __DIR__ . '../connect.php';

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);
$password = md5($password);

global $pdo;
$usercheck = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
$usercheckdata = $usercheck->fetch();

if ($usercheckdata){
    $_SESSION['user'] = [
        "id"=> $usercheckdata['id'],
        "fullname"=> $usercheckdata['fullname'],
        "mail"=> $usercheckdata['mail'],
        "login" => $usercheckdata['login'],
        "pass" => $usercheckdata['pass'],
        "status" => $usercheckdata['status'],
        "register_date" => $usercheckdata['register_date'],
        "img" => $usercheckdata['img']
    ];
    header('Location: profile.php');
}else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: login.php');
}
?>