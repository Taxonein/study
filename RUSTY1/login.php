<?php
require_once('dbconfig.php');
$login = $_POST['login'];
$pass = $_POST['pass'];

$result = $pdo->query("SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch(PDO::FETCH_ASSOC);
if($user == false){
    echo ('Not found');
    exit();
}
setcookie('user', $user['login'], time() + 60, "/");
if($_COOKIE == ''){
    echo ('false');
}
// var_dump($_COOKIE);
// var_dump($user);
//echo($user[login]);

header('Location: /');