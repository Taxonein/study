<?php
session_start();
require_once __DIR__ . '../connect.php';

global $tobase;
foreach ($_SESSION['cart'] as $item){
    $tobase = "".$tobase."".$item['id']."x".$item['qty'].";";

    $baseqty = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$item['id']."'");
    $baseqtty = $baseqty->fetch();

    $pdo->query("UPDATE `catalog` SET `qty` = ('".$baseqtty['qty']."' - '".$item['qty']."') WHERE id = '".$item['id']."'");
}

$user_id = $_SESSION['user']['id'];
$time = date('d.m.Y H:i:s');
$pdo->query("INSERT INTO `orders` (`user_id`,`items`,`date`) VALUES ('$user_id','$tobase','$time')");
unset($_SESSION['cart']);
$_SESSION['message'] = 'Заказ успешно оформлен';
header('Location: cart.php');
?>