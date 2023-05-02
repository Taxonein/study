<?php
session_start();
require_once __DIR__ . '../../connect.php';

$id = $_POST['id'];
global $cartids;
global $counter;
global $status;


$itemqtyquery = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$id."'");
$itemqty = $itemqtyquery->fetch();

if ($itemqty['qty'] != 0){
    $cartquery = $pdo->query("SELECT `cart` FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
    $cart = $cartquery->fetch();
    if ($cart['cart']){
        $usercart = explode(';',$cart['cart']);
        $usercart = array_diff($usercart, array(''));
        foreach ($usercart as $usercartdel){
            $itemid = stristr($usercartdel, 'x', true);
            $cartids[$counter] = [
                "id" => $itemid,
            ];
            $counter = $counter + 1;
        }
        $counter = 0;
        foreach ($cartids as $cartitemedit){
            if ($cartitemedit['id'] == $id){
                $status = 1;
            }
        }
    }
    if ($status == 1){
        $response= [
            "status" => false,
            "message" => "Товар уже в корзине"
        ];
        echo json_encode($response);
    }else{
        $tobase = "".$cart['cart'].$id."x".'1'.";";
        $pdo->query("UPDATE `users` SET `cart` = '".$tobase."' WHERE id = '".$_SESSION['user']['id']."'");
        
        $response= [
            "status" => true,
            "message" => "Товар успешно добавлен в корзину"
        ];
        echo json_encode($response);
    }
}else{
    $response= [
        "status" => false,
        "message" => "Данный товар закончился"
    ];
    echo json_encode($response);
}
?>