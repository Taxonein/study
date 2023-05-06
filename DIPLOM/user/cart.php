<?php
session_start();
require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '../functions.php';
$cartquery = $pdo->query("SELECT `cart` FROM `users` WHERE `id` = '".$_SESSION['user']['id']."'");
$cart =  $cartquery->fetch();
global $carttotalqty;
global $carttotalprice;
// var_dump($cart['cart']);
// $usercart = explode(';',$order['items']);
// $usercart = array_diff($usercart, array(''));
// $usercartexplode = explode('x',$item);

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
        <div class="flexCenter">
            <img class="loadGif displayNone" src="../img/system/load.gif">
            <span class="formMsg displayNone"></span>
        </div>
        <div class="cartItems">
            <?php if ($cart['cart']): ?>
                <?php
                $usercart = explode(';',$cart['cart']);
                $usercart = array_diff($usercart, array(''));
                ?>
                <?php foreach ($usercart as $item): ?>
                    <?php
                    $usercartexplode = explode('x',$item);
                    $catalogquery = $pdo->query("SELECT * FROM `catalog` WHERE `id` = '".$usercartexplode['0']."'");
                    $catalog =  $catalogquery->fetch();
                    ?>
                    <div class="cartItemHeadInfo">
                        <div class="cartTextBlock">
                            <span><?= $catalog['name'] ?></span>
                            <div class="cartTextBlockRight">
                            <?php if ($catalog['qty'] > 1): ?><div class="CartItemButtonMinus" data-id="<?= $catalog['id']?>"><img src="../img/minus.png"></div><?php endif; ?>
                                <div class="CartItemQty"><span><?= $usercartexplode['1']?></span></div>
                                <?php if ($catalog['qty'] < $usercartexplode['1']):?><span>На складе нет столько товара</span><?php else:?><div class="CartItemButtonPlus" data-id="<?= $catalog['id']?>"><img src="../img/plus.png"></div><?php endif;?>
                                <div class="deleteFromCart" data-id="<?= $catalog['id']?>"><img src="../img/delete.png"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cartItem">
                        <a href="itempage.php?id=<?php echo $catalog['id']; ?>"><div class="cartItemImg"><?php if($catalog['photo']):?><img src="../<?=$catalog['photo']?>"><?php else:?><img src="../img/catalog/nothing.png?>"><?php endif;?></div></a>
                        <div class="cartItemMain">
                            <div class="cartItemDescription"><span><?= $catalog['description'] ?></span></div>
                        </div>
                    </div>
                    <div class="cartItemManage">
                                <div class="CartItemPrice"><span>Цена:<?= $catalog['price']?></span></div>
                                <?php if ($catalog['price_before']): ?><div class="CartItemPrice_before"><span class="prcbfr_1"></span><span class="prcbfr_2"><?= $catalog['price_before']?><div></div></span></div><?php endif; ?>
                                <div class="CartItemPrice"><span>Общая стоимость:<?= $usercartexplode['1'] * $catalog['price']?>Р</span></div>
                            </div>
                <?php
                $carttotalqty = $carttotalqty + $usercartexplode['1'];
                $carttotalprice = $carttotalprice + ($usercartexplode['1'] * $catalog['price']);
                ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!$cart['cart']){
            echo '<div class="textBlock"><span>Ваша корзина пуста :( Добавьте сюда что-нибудь!</span></div>';
        }
        ?>
        <?php if (!$_SESSION['user']){
            echo '<div class="textBlock"><span>Оформить заказ могут только зарегистрированные пользователи</span></div>';
        }
        ?>
        <?php if ($cart['cart']): ?>
        <div class="cartTotal">
            <div class="cartTotalInfo">
                <span>Всего товаров:<?= $carttotalqty?></span><span>Итоговая цена:<?= $carttotalprice?>Р</span>
            </div>
            <div>
            <?php if ($_SESSION['user']): ?><a href="order.php"><div class="cartTotalOrder"><span>ЗАКАЗАТЬ</span></div></a><?php endif; ?>
            </div>
        </div>
        <?php endif;?>
    </div>
    <footer>
        <div>
            <div><img src="img/vk.png"><img src="img/youtube.png"></div>
        </div>
        <div>
            <div>Адрес: 141801, Московская обл., г. Дмитров, ул. Дубненская, д.2, корп. 1, комн. 8<br>Телефон: +7(495) 902-62-92, +7(495) 579-28-52</div>
        </div>
    </footer>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>