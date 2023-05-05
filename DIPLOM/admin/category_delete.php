<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../user/profile.php');
}
require_once __DIR__ . '../../connect.php';
$category = $_POST['category'];
if (!$category == 0){
    $pdo->query("DELETE FROM `catalog_category` WHERE id = '".$category."'");
    $_SESSION['message'] = "Успешно удалена категория ".$category."";
    header('Location: admin.php');
}else{
    $_SESSION['message'] = "Вы не выбрали категорию";
    header('Location: admin.php');
}
?>