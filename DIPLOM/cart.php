<?php
session_start();
require_once __DIR__ . '../connect.php';
require_once __DIR__ . '../functions.php';

$catalog = $_SESSION['cart'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Skido4kin</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/logo.png">
        </div>
        <div class="buttons">
            <div><a href="index.php">Главная</a></div>
            <div>О нас</div>
            <div>Контакты</div>
            <div class="catalogDiv"><a class="aDisable">Каталог</a></div>
            <div>Акции</div>
        </div>
        <div class="menu">
            <img src="img/cart.png">
            <a href="login.php"><img src="img/user.png"></a>
        </div>
        <div class="menuwrap"><img src="img/menu.png"></div>
    </header>
    <div class="menuDiv"></div>
    <div class="catalog">
        <div>
            <div><a href="scooters.php">Самокаты</a></div>
            <div>Велосипеды</div>
            <div>Скутеры</div>
            <div>Ролики</div>
            <div>Drugs</div>
        </div>
        <div>
            <div>Тест1</div>
            <div>Тест2</div>
            <div>Тест2Самокаты</div>
            <div>Самокаты</div>
            <div>Самокаты</div>
        </div>
    </div>
    <div class="container">
        <div class="cartItems">
            <!-- СЕКЦИЯ ТОВАРОВ КОРЗИНЫ ДЛЯ ПК -->
            <?php if (!empty($catalog)): ?>
                <?php foreach ($catalog as $item): ?>
                    <div class="cartItem">
                        <a href="itempage.php?id=<?php echo $item['id']; ?>"><div class="cartItemImg"><img src="img/logo.png"></div></a>
                        <div class="cartItemMain">
                            <div class="cartTextBlock">
                                <span><?= $item['name'] ?></span>
                                <div class="cartTextBlockRight">
                                <?php if ($item['qty'] > 1): ?><a href="functions.php?minus=<?php echo $item['id'];?>"><div class="CartItemButtonMinus"><img src="img/minus.png"></div></a><?php endif; ?>
                                <div class="CartItemQty"><span><?= $item['qty']?></span></div>
                                <a href="functions.php?plus=<?php echo $item['id'];?>"><div class="CartItemButtonPlus"><img src="img/plus.png"></div></a>
                                <a href="functions.php?id=<?php echo $item['id']; ?>"><div class="deleteFromCart"><img src="img/delete.png"></div></a>
                                </div>
                            </div>
                            <div class="cartItemDescription"><span><?= $item['description'] ?></span></div>
                            <div class="cartItemManage">
                                <div class="CartItemPrice"><span>Цена:<?= $item['price']?></span></div>
                                <?php if ($item['price_before']): ?><div class="CartItemPrice_before"><span class="prcbfr_1"></span><span class="prcbfr_2"><?= $item['price_before']?><div></div></span></div><?php endif; ?>
                                <div class="CartItemPrice"><span>Общая стоимость:<?= $item['price'] * $item['qty']?>Р</span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <!-- СЕКЦИЯ ТОВАРОВ КОРЗИНЫ ДЛЯ МОБИЛЬНЫХ УСТРОЙСТВ -->
        </div>
        <?php if (!$_SESSION['cart']){
            echo '<div class="textBlock"><span>Ваша корзина пуста :( Добавьте сюда что-нибудь!</span></div>';
        }
        ?>
        <?php if (!$_SESSION['user']){
            echo '<div class="textBlock"><span>Оформить заказ могут только зарегистрированные пользователи</span></div>';
        }
        ?>
        <?php if ($_SESSION['message']){
            echo '<div class="messageBlock"><span>'.$_SESSION['message'].'</span></div>';
            unset($_SESSION['message']);
        }
        ?>
        <?php if ($_SESSION['cart']): ?>
        <div class="cartTotal">
            <div class="cartTotalInfo">
                <span>Всего товаров:<?= $totalqty?></span><span>Итоговая цена:<?= $totalprice?>Р</span>
            </div>
            <div>
            <?php if ($_SESSION['user']): ?><a href="order.php"><div class="cartTotalOrder"><span>ЗАКАЗАТЬ</span></div></a><?php endif; ?>
            </div>
        </div>
        <?php endif;?>
    </div>
    <footer>
        <div>
            <div><img src="img/cart.png"><img src="img/cart.png"></div>
        </div>
        <div>
            <div>Адрес: Пушкина дом 3<br>Телефон: +790953372613</div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/js.js"></script>
</body>

</html>