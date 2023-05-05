<?php
session_start();
require_once __DIR__ . '../../connect.php';

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
$time = date('d.m.Y H:i:s');

if ($fullname || $login || $password || $password_reply || $email >1){
    if (!$logincheckdata){
        if (!$mailcheckdata){
            if ($password === $password_reply){
            $password = md5($password);
            $pdo->query("INSERT INTO `users` ( `login`, `fullname`, `mail`, `pass`,`register_date`)VALUES('$login', '$fullname', '$email', '$password', '$time')");
            $response = [
                "status" => true,
                "message" => 'Регистрация прошла успешно'
            ];
            echo json_encode($response);
        } else{
            $response = [
                "status" => false,
                "message" => 'Повтор пароля неверный'
            ];
            echo json_encode($response);
        }
        }else{
            $response = [
                "status" => false,
                "message" => 'Данная почта занята'
            ];
            echo json_encode($response);
        }
    }else{
        $response = [
            "status" => false,
            "message" => 'Данный логин занят'
        ];
        echo json_encode($response);
    }
}else{
    $response = [
        "status" => false,
        "message" => 'Введите данные'
    ];
    echo json_encode($response);
}
?>