<?php
session_start();
require_once __DIR__ . '../../connect.php';

global $tobase;
global $check;
global $orderitems;
global $counter;

$cartquery = $pdo->query("SELECT `cart` FROM `users` WHERE `id` = '".$_SESSION['user']['id']."'");
$cart =  $cartquery->fetch();

$usercart = explode(';',$cart['cart']);
$usercart = array_diff($usercart, array(''));
if ($cart['cart']){
    foreach ($usercart as $item){
        $usercartexplode = explode('x',$item);
        $baseqty = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$usercartexplode['0']."'");
        $baseqtty = $baseqty->fetch();
        $value = $baseqtty['qty'] - $usercartexplode['1'];
        if ($baseqtty['qty'] >= $usercartexplode['1']){
            $orderitems[$counter] = [
                "id" => $usercartexplode['0'],
                "qty" => $value
            ];
            $counter = $counter + 1;
            $tobase = $tobase."".$usercartexplode['0']."x".$usercartexplode['1'].";";
        }else{
            $check = 1;
        }
    }
    if (!$check){
        foreach ($orderitems as $orderquery){
            $pdo->query("UPDATE `catalog` SET `qty` = '".$orderquery['qty']."' WHERE id = '".$orderquery['id']."'");
        }
        $time = date('d.m.Y H:i:s');
        $pdo->query("INSERT INTO `orders` (`user_id`,`items`,`date`) VALUES ('".$_SESSION['user']['id']."','$tobase','$time')");
        $pdo->query("UPDATE `users` SET `cart` = '' WHERE id = '".$_SESSION['user']['id']."'");
        $response= [
            "status" => true,
            "message" => "Заказ успешно оформлен"
        ];
        echo json_encode($response);
    }else{
        $response= [
            "status" => false,
            "message" => "На складе не хватает товара"
        ];
        echo json_encode($response);
    }
}else{
    $response= [
        "status" => false,
        "message" => "Нельзя заказать пустую корзину"
    ];
    echo json_encode($response);
}



// foreach ($cart as $item){
//     $tobase = "".$tobase."".$item['id']."x".$item['qty'].";";

//     $baseqty = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$item['id']."'");
//     $baseqtty = $baseqty->fetch();

//     $pdo->query("UPDATE `catalog` SET `qty` = ('".$baseqtty['qty']."' - '".$item['qty']."') WHERE id = '".$item['id']."'");
// }

// $user_id = $_SESSION['user']['id'];
// $time = date('d.m.Y H:i:s');
// $pdo->query("INSERT INTO `orders` (`user_id`,`items`,`date`) VALUES ('$user_id','$tobase','$time')");
// unset($_SESSION['cart']);
// $_SESSION['message'] = 'Заказ успешно оформлен';
// header('Location: cart.php');
?>