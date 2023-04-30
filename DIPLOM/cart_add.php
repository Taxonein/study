<?php
session_start();
require_once __DIR__ . '../connect.php';

$id = $_GET['id'];
global $pdo;
$res = $pdo->query("SELECT * FROM `catalog` WHERE `id` = $id");
$tocart = $res->fetch();

if ($tocart['qty'] > $_SESSION['cart'][$tocart['id']]['qty'] && $tocart['qty'] != 0){
    if (isset($_SESSION['cart'][$tocart['id']])){
    $_SESSION['cart'][$tocart['id']]['qty'] += 1;
}else{
    $_SESSION['cart'][$tocart['id']] = [
        'id' => $tocart['id'],
        'name' => $tocart['name'],
        'description' => $tocart['description'],
        'price' => $tocart['price'],
        'price_before' => $tocart['price_before'],
        'photo' => $tocart['photo'],
        'qty' => 1,
    ];
}
header('Location: cart.php');
}else{
    $_SESSION['message'] = 'На складе недостаточно товара';
    header('Location: cart.php');
}
?>