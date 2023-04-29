<?php
session_start();
require_once __DIR__ . '../connect.php';
$minus = $_GET['minus'];
$plus = $_GET['plus'];
$id = $_GET['id'];
global $totalqty;
global $totalprice;

if (isset($_SESSION['cart'])){
    if ($_SESSION['cart'][$minus]['qty'] > 1){
        foreach ($_SESSION['cart'] as $item){
            if ($minus == $item['id'] && $item['qty'] > 1){
                $_SESSION['cart'][$minus]['qty'] -=1;
                header('Location: cart.php');
            }
        }
    }
    if ($_SESSION['cart'][$plus]['qty']){
        global $pdo;
        $res = $pdo->query("SELECT * FROM `catalog` WHERE `id` = $plus");
        $tocart = $res->fetch();
        if ($tocart['qty'] > $_SESSION['cart'][$tocart['id']]['qty'] && $tocart['qty'] != 0){
            foreach ($_SESSION['cart'] as $item){
                if ($plus == $item['id'] && $item['qty']){
                    $_SESSION['cart'][$plus]['qty'] +=1;
                    header('Location: cart.php');
                }
            }
        }else{
            $_SESSION['message'] = 'На складе недостаточно товара';
            header('Location: cart.php');
        }
    }
    
    foreach($_SESSION['cart'] as $total){
        $totalqty = $total['qty'] + $totalqty;
        $totalprice = $totalprice + ($total['price'] * $total['qty']);
    }
}

if ($id){
    unset($_SESSION['cart'][$id]);
    header('Location: cart.php');
}
?>

