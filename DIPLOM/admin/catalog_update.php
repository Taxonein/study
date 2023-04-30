<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../login.php');
}
require_once __DIR__ . '../../connect.php';
$id = $_GET['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$price_before = $_POST['price_before'];
$category = $_POST['category'];
$file = $_FILES['img'];
$path = 'img/catalog/' . time() . 'x'.$id.'x' . $_FILES['img']['name'];

// var_dump($file['size']);
if (!($price < 1 || strlen($name) < 5 || strlen($description) < 5)){
if($file['size'] > 10){
    move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path); 
    $pdo->query("UPDATE `catalog` SET `id` ='".$id."', `name` = '".$name."', `description` = '".$description."', `qty` = '".$qty."', `price` = '".$price."', `price_before` = '".$price_before."', `photo` = '".$path."', `category` = '".$category."' WHERE id = $id");
    $_SESSION['message'] = 'Успешно обновлено';
    header('Location: catalog_edit.php?id='.$id.'');
}else{
    $pdo->query("UPDATE `catalog` SET `id` ='".$id."', `name` = '".$name."', `description` = '".$description."', `qty` = '".$qty."', `price` = '".$price."', `price_before` = '".$price_before."', `category` = '".$category."' WHERE id = $id");
    $_SESSION['message'] = 'Успешно обновлено без фото';
    header('Location: catalog_edit.php?id='.$id.'');
}
}else{
    $_SESSION['message'] = 'Ошибка, проверьте значения';
    header('Location: catalog_edit.php?id='.$id.'');
}
?>