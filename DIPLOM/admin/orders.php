<?php
session_start();
require_once __DIR__ . '../../connect.php';
$userinfoquery = $pdo->query("SELECT * FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
$userinfo = $userinfoquery->fetch();
if ($userinfo['status'] != 1){
    header('Location: ../user/profile.php');
}
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css" type="text/css">
    <title>SITE ADMIN PANEL</title>
</head>
<body>
    <header>
        <div>
            <div><span>Панель администратора: <?=$_SESSION['user']['login']?></span><a href="../index.php"><span>НА САЙТ</span></a><a href="../admin.php"><span>НА ГЛАВНУЮ ПАНЕЛИ</span></a></div>
        </div>
        <div>
            <div><a href="orders.php"><span>ЗАКАЗЫ</span></a><a href="catalog.php"><span>КАТАЛОГ</span></a></div>
        </div>
    </header>
    <div class="filter"><a href="orders.php"><span>ВСЕ ЗАКАЗЫ</span><a href="orders.php?id=<?php echo ('1');?>"><span>НОВЫЕ</span></a><a href="orders.php?id=<?php echo ('2');?>"><span>ПОДТВЕРЖДЕННЫЕ</span></a><a href="orders.php?id=<?php echo ('3');?>"><span>ОТМЕНЕННЫЕ</span></a></div>
    <div class="container">
        <?php
        if ($id){
            $ordersquery = $pdo->query("SELECT * FROM `orders` WHERE `status` = '".$id."' ORDER BY id DESC");
            $orders = $ordersquery->fetchAll();
        }else{
            $ordersquery = $pdo->query("SELECT * FROM `orders` ORDER BY id DESC");
            $orders = $ordersquery->fetchAll();
        }
        ?>
        <div class="ordersItems">
            <?php foreach ($orders as $item):?>
            <?php
            $statusquery = $pdo->query("SELECT `name` FROM `status_list` WHERE id = '".$item['status']."'");
            $status = $statusquery->fetch();
            $userorderitems = explode(';',$item['items']);
            $userorderitems = array_diff($userorderitems, array(''));
            $userquery = $pdo->query("SELECT * FROM `users` WHERE id = '".$item['user_id']."'");
            $user = $userquery->fetch();
            ?>
            <div class="orderId"><div><span>ID заказа: <?= $item['id']?></span><span>Дата заказа: <?= $item['date']?></span><span>ФИО заказчика: <?= $user['fullname']?></span><span>Статус заказа: <?= $status['name']?></span></div><div><a href="order_cancel.php?id=<?php echo $item['id'];?>"><span>ОТМЕНИТЬ</span></a><a href="order_accept.php?id=<?php echo $item['id'];?>"><span>ПОДТВЕРДИТЬ</span></a></div></div>
            <div class="orderContent">
            <?php foreach ($userorderitems as $iteminfo): ?>
            <?php
            $userorderindex = explode('x',$iteminfo);

            $orderiteminfoquery = $pdo->query("SELECT * FROM `catalog` WHERE id = '".$userorderindex['0']."'");
            $orderiteminfo = $orderiteminfoquery->fetch();

            ?>
            <div class="orderItem">
                <div class="orderItemRow"><span><a href="../itempage.php?id=<?php echo $userorderindex['0'];?>"><?= $orderiteminfo['name']?></a> ( ID товара: <?= $userorderindex['0']?> )</span><span>Кол-во: <?= $userorderindex['1']?> шт</span></div>
                <hr>
            </div>
            <?php endforeach;?>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>