<?php
session_start();
if (!$_SESSION['user']){
    header('Location: login.php');
}
require_once __DIR__ . '../../connect.php';
$userinfoquery = $pdo->query("SELECT * FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
$userinfo = $userinfoquery->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" type="text/css">
    <title>Skido4kin</title>
</head>
<body>
<div class="wrapper">
    <?php include '../user/header.php' ?>
    <div class="container">
        <div class="textBlock"><span>Добро пожаловать в личный кабинет, <?= $userinfo['login']?></span></div>
        <?php 
            if ($_SESSION['message']){
                echo '<span class="formMsg">'.$_SESSION['message'].'</span>';
            }
            unset($_SESSION['message'])
        ?>
        <div class="userGUI">
            <div class="userphoto">
                <?php if($userinfo['img']):?><img src="../<?= $userinfo['img']?>"><?php else:?><img src="../img/nothing.png"><?php endif;?>
                <form class="userForm" action="userchange.php" method="POST" enctype='multipart/form-data'>
                    <label>Загрузить новое фото профиля:</label>
                    <input class="imginp" name="userimg" type="file">
                    <button type="submit">ЗАГРУЗИТЬ</button>
                </form>
            </div>
            <div class="userInfo">
                <div><span>Ваш USER_ID: <?= $userinfo['id']?></span></div>
                <div><span>Ваше Ф.И.О: <?= $userinfo['fullname']?></span></div>
                <div><span>Ваша почта: <?= $userinfo['mail']?></span></div>
                <div><span>Ваша дата регистрации: <?= $userinfo['register_date']?></span></div>
                <div>
                <span>Ваш статус: 
                <?php
                if (!$userinfo['status']){
                    echo 'Пользователь';
                }
                if ($userinfo['status'] == 1){
                    echo 'Администратор';
                }
                ?>
                </span>
                </div>
                <div class="userInfoExit"><span><a href="logout.php">Выйти из аккаунта</a></span></div>
            </div>
            <div class="PurchaseHistoryNav">
                    <div class="PurchaseHistory">
                    <div class="profileTextBlock"><span>Необработанные заказы</span></div>
                        <?php
                        $usercartquery = $pdo->query("SELECT * FROM `orders` WHERE user_id = '".$_SESSION['user']['id']."' AND status = 1 ORDER BY id DESC");
                        $usercart = $usercartquery->fetchAll();
                        ?>
                        <?php foreach ($usercart as $order): ?>
                        <?php
                        $statuslistquery = $pdo->query("SELECT `name` FROM `status_list` WHERE id = '".$order['status']."'");
                        $statuslist = $statuslistquery->fetch();
                        ?>
                            <div class="orderInProcessHeader"><span>Номер заказа: <?=$order['id']?> Статус:<?=$statuslist['name']?></span><div class="forHeader"><span>Дата заказа: <?=$order['date']?></span><div><?php if($order['status'] < 2):?><a href="order_cancel.php?id=<?php echo $order['id'];?>"><img class="cancelOrder" src="../img/minus.png"></a><?php endif;?></div></div></div>
                        <?php
                        $usercart = explode(';',$order['items']);
                        $usercart = array_diff($usercart, array(''));
                        ?>
                        <?php foreach ($usercart as $item): ?>
                            <?php
                            $usercartexplode = explode('x',$item);
                            $itemquery = $pdo->query("SELECT * FROM `catalog` WHERE id = '".$usercartexplode['0']."'");
                            $itembase = $itemquery->fetch();
                        ?>
                        <div class="orderInProcess">
                            <div class="orderInProcessBody"><a href="itempage.php?id=<?php echo $itembase['id'];?>"><span><?=$itembase['name']?></span></a><span>Кол-во: <?=$usercartexplode['1']?>шт</span></div>
                            <hr>
                        </div>
                        <?php endforeach;?>
                        <?php endforeach;?>
                        <div class="profileTextBlock"><span>Завершенные заказы</span></div>
                        <?php
                        $usercartquery = $pdo->query("SELECT * FROM `orders` WHERE user_id = '".$_SESSION['user']['id']."' AND status != 1 ORDER BY id DESC");
                        $usercart = $usercartquery->fetchAll();
                        ?>
                        <?php foreach ($usercart as $order): ?>
                        <?php
                        $statuslistquery = $pdo->query("SELECT `name` FROM `status_list` WHERE id = '".$order['status']."'");
                        $statuslist = $statuslistquery->fetch();
                        ?>
                            <div class="orderInProcessHeader"><span>Номер заказа: <?=$order['id']?> Статус:<?=$statuslist['name']?></span><div class="forHeader"><span>Дата заказа: <?=$order['date']?></span><div><?php if($order['status'] < 2):?><a href="order_cancel.php?id=<?php echo $order['id'];?>"><img class="cancelOrder" src="../img/minus.png"></a><?php endif;?></div></div></div>
                        <?php
                        $usercart = explode(';',$order['items']);
                        $usercart = array_diff($usercart, array(''));
                        ?>
                        <?php foreach ($usercart as $item): ?>
                            <?php
                            $usercartexplode = explode('x',$item);
                            $itemquery = $pdo->query("SELECT * FROM `catalog` WHERE id = '".$usercartexplode['0']."'");
                            $itembase = $itemquery->fetch();
                        ?>
                        <div class="orderInProcess">
                            <div class="orderInProcessBody"><a href="itempage.php?id=<?php echo $itembase['id'];?>"><span><?=$itembase['name']?></span></a><span>Кол-во: <?=$usercartexplode['1']?>шт</span></div>
                            <hr>
                        </div>
                        <?php endforeach;?>
                        <?php endforeach;?>
                    </div>
                </div>
        </div>
        <?php if($userinfo['status'] == 1):?><div class="textBlock"><span><a href="../admin/admin.php">Открыть панель администрирования</a></span></div><?php endif;?>
    </div>
    <?php include 'footer.php' ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>