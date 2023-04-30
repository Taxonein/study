<?php
session_start();
if (!$_SESSION['user']){
    header('Location: login.php');
}
$id = $_GET['id'];
require_once __DIR__ . '../connect.php';

$path = 'img/user/' . time() . 'x'.$id.'x' . $_FILES['userimg']['name'];
if(move_uploaded_file($_FILES['userimg']['tmp_name'], $path)){
    $_SESSION['message'] = 'Фото профиля успешно изменено. Перезайдите в аккаунт';
    $pdo->query("UPDATE `users` SET `img` = '".$path."' WHERE id = '".$id."'");
    header('Location: profile.php');
}else{
    $_SESSION['message'] = 'Ошибка при загрузке фото';
    header('Location: profile.php');
}
?>