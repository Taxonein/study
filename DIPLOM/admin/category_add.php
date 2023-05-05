<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../user/profile.php');
}
require_once __DIR__ . '../../connect.php';
$category = $_POST['category'];
if (!$category == 0){
    $pdo->query("INSERT INTO `catalog_category` (`name`)VALUES('$category')");
    $_SESSION['message'] = "Успешно добавлена категория ".$category."";
    header('Location: admin.php');
}else{
    $_SESSION['message'] = "Вы не написали категорию";
    header('Location: admin.php');
}
?>