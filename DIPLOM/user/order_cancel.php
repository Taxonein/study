<?php
session_start();
require_once __DIR__ . '../../connect.php';
$id = $_GET['id'];

$orderquery = $pdo->query("SELECT * FROM `orders` WHERE id = '".$id."'");
$order = $orderquery->fetchAll();
if ($order[0]['user_id'] != $_SESSION['user']['id']){
    $_SESSION['message'] = 'Еще раз и получишь бан. Лог записан.';
    header('Location: profile.php');
}else{
$userorder = explode(';',$order['items']);
$userorder = array_diff($userorder, array(''));

foreach ($userorder as $item){
    $userorderindex = explode('x',$item);

    $itemqtyorder = $pdo->query("SELECT `qty` FROM `catalog` WHERE id = '".$userorderindex['0']."'");
    $itemqty = $itemqtyorder->fetch();

    $itemqtytobase = $itemqty['qty'] + $userorderindex['1'];
    $pdo->query("UPDATE `catalog` SET `qty` = '".$itemqtytobase."' WHERE `id` = '".$userorderindex['0']."'");
}

$usercartquery = $pdo->query("UPDATE `orders` SET `status` = 3 WHERE `id` = '".$id."'");
header('Location: profile.php');
}
?>