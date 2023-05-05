<?php
session_start();
require_once __DIR__ . '/../connect.php';
$id = $_POST['id'];
$action = $_POST['action'];
global $status;
global $toreplace;

if ($id && $action){
    $itemqtyquery = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$id."'");
    $itemqty = $itemqtyquery->fetch();
    $cartquery = $pdo->query("SELECT `cart` FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
    $cart = $cartquery->fetch();

    $usercart = explode(';',$cart['cart']);
    $usercart = array_diff($usercart, array(''));
    if ($action == 1){ //minus
        foreach ($usercart as $cartitem){
            $usercartexplode = explode('x',$cartitem);
            if ($usercartexplode['0'] == $id){
                $value = ($usercartexplode['1']) - 1;
                if ($value){
                    $toreplace = $toreplace."".$id."x".$value.";";
                    $status = 1;
                }
            }else{
                $toreplace = $toreplace."".$usercartexplode['0']."x".$usercartexplode['1'].";";
            }
        }
        if ($status == 1){
            $pdo->query("UPDATE `users` SET `cart` = '".$toreplace."' WHERE `id` = '".$_SESSION['user']['id']."'");
            $response= [
                "status" => true
            ];
            echo json_encode($response);
            unset($status);
        }else{
            $response= [
                "status" => false,
                "message" => "В корзине минимальное кол-во товара"
            ];
            echo json_encode($response);
        }
    }
    if ($action == 2){ //plus
        foreach ($usercart as $cartitem){
            $usercartexplode = explode('x',$cartitem);
            if ($usercartexplode['0'] == $id){
                $value = ($usercartexplode['1']) + 1;
                if ($value <= $itemqty['qty']){
                    $toreplace = $toreplace."".$id."x".$value.";";
                    $status = 1;
                }
            }else{
                $toreplace = $toreplace."".$usercartexplode['0']."x".$usercartexplode['1'].";";
            }
        }
        if ($status == 1){
            $pdo->query("UPDATE `users` SET `cart` = '".$toreplace."' WHERE `id` = '".$_SESSION['user']['id']."'");
            $response= [
                "status" => true
            ];
            echo json_encode($response);
            unset($status);
        }else{
            $response= [
                "status" => false,
                "message" => "Не хватает товара на складе"
            ];
            echo json_encode($response);
        }
    }
    if ($action == 3){ //delete
        foreach ($usercart as $cartitem){
            $usercartexplode = explode('x',$cartitem);
            if ($usercartexplode['0'] != $id){
                $toreplace = $toreplace."".$usercartexplode['0']."x".$usercartexplode['1'].";";
            }
        }
        $status = 1;
        if ($status == 1){
            $pdo->query("UPDATE `users` SET `cart` = '".$toreplace."' WHERE `id` = '".$_SESSION['user']['id']."'");
            $response= [
                "status" => true
            ];
            echo json_encode($response);
            unset($status);
        }else{
            $response= [
                "status" => false,
                "message" => "Ошибка"
            ];
            echo json_encode($response);
        }
    }
}
?>

