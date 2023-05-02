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



        // var_dump($test);
        // unset($counter);
        // foreach($cartids as $cartid){
        //     // print_r($cartid['id']);
        //     if ($id == $cart){
        //         $status = 1;
        //     }
        //     if

                // // print_r($value);
                // // $toreplace = "".$id."x".$value.";";
                // $replace = [
                //     $itemindex => $toreplace
                // ];
                // $test = array_replace($usercart,$replace);
                // $toreplace = $toreplace +"".$id."x".$value.";";
                // var_dump($test);
                // // var_dump($test);
                // echo '<br>';


// global $cartids;
// global $counter;
// global $status;


// $itemqtyquery = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$id."'");
// $itemqty = $itemqtyquery->fetch();

// if ($itemqty['qty'] != 0){
//     $cartquery = $pdo->query("SELECT `cart` FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
//     $cart = $cartquery->fetch();
//     if ($cart['cart']){
//         $usercart = explode(';',$cart['cart']);
//         $usercart = array_diff($usercart, array(''));
//         foreach ($usercart as $usercartdel){
//             $itemid = stristr($usercartdel, 'x', true);
//             $cartids[$counter] = [
//                 "id" => $itemid,
//             ];
//             $counter = $counter + 1;
//         }
//         $counter = 0;
//         foreach ($cartids as $cartitemedit){
//             if ($cartitemedit['id'] == $id){
//                 $status = 1;
//             }
//         }
//     }
//     if ($status == 1){
//         $response= [
//             "status" => false,
//             "message" => "Товар уже в корзине"
//         ];
//         echo json_encode($response);
//     }else{
//         $tobase = "".$cart['cart'].$id."x".'1'.";";
//         $pdo->query("UPDATE `users` SET `cart` = '".$tobase."' WHERE id = '".$_SESSION['user']['id']."'");
        
//         $response= [
//             "status" => true,
//             "message" => "Товар успешно добавлен в корзину"
//         ];
//         echo json_encode($response);
//     }
// }else{
//     $response= [
//         "status" => false,
//         "message" => "Данный товар закончился"
//     ];
//     echo json_encode($response);
// }



// if (isset($_SESSION['cart'])){
//     if ($_SESSION['cart'][$minus]['qty'] > 1){
//         foreach ($_SESSION['cart'] as $item){
//             if ($minus == $item['id'] && $item['qty'] > 1){
//                 $_SESSION['cart'][$minus]['qty'] -=1;
//                 header('Location: cart.php');
//             }
//         }
//     }
//     if ($_SESSION['cart'][$plus]['qty']){
//         global $pdo;
//         $res = $pdo->query("SELECT * FROM `catalog` WHERE `id` = $plus");
//         $tocart = $res->fetch();
//         if ($tocart['qty'] > $_SESSION['cart'][$tocart['id']]['qty'] && $tocart['qty'] != 0){
//             foreach ($_SESSION['cart'] as $item){
//                 if ($plus == $item['id'] && $item['qty']){
//                     $_SESSION['cart'][$plus]['qty'] +=1;
//                     header('Location: cart.php');
//                 }
//             }
//         }else{
//             $_SESSION['message'] = 'На складе недостаточно товара';
//             header('Location: cart.php');
//         }
//     }
    
//     foreach($_SESSION['cart'] as $total){
//         $totalqty = $total['qty'] + $totalqty;
//         $totalprice = $totalprice + ($total['price'] * $total['qty']);
//     }
// }

// if ($id){
//     unset($_SESSION['cart'][$id]);
//     header('Location: cart.php');
// }
?>

