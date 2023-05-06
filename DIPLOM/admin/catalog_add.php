<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../user/profile.php');
}
require_once __DIR__ . '../../connect.php';
$price = $_POST['price'];
$price_before = $_POST['price_before'];
$category = $_POST['category'];
$qty = $_POST['qty'];
$name = $_POST['name'];
$description = $_POST['description'];
$img = $_FILES['img'];
$path = 'img/catalog/' . time() . 'x'.$id.'x' . $_FILES['img']['name'];
$time = date('d.m.Y');
move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path); 
$pdo->query("INSERT INTO `catalog` (`name`,`description`,`qty`,`price`,`price_before`,`photo`,`category`,`date`)VALUES('$name','$description','$qty','$price','$price_before','$path','$category','$time')");
header('Location: catalog.php');
?>
