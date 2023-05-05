<?php
session_start();
require_once __DIR__ . '../../connect.php';
$login = $_POST['login'];
$password = $_POST['password'];


$login = filter_var(trim($login),
FILTER_SANITIZE_STRING);

$password = filter_var(trim($password),
FILTER_SANITIZE_STRING);
$password = md5($password);

global $pdo;
$usercheck = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
$usercheckdata = $usercheck->fetch();

if ($usercheckdata){
    $_SESSION['user'] = [
        "id"=> $usercheckdata['id'],
        "status"=>$usercheckdata['status']
    ];
    $response = [
        "status" => true
    ];
    echo json_encode($response);
}else{
    $response = [
        "status" => false,
        "message" => 'Неверный логин или пароль'
    ];
    echo json_encode($response);
}
?>