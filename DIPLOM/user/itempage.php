<?php
session_start();
require_once __DIR__ . '../../connect.php';
$id = $_GET['id'];

$res = $pdo->query("SELECT * FROM `catalog` WHERE `id` = '".$id."'");
$catalog = $res->fetchAll();
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
<?php foreach ($catalog as $item): ?>
    <div><?php $item['name']?> </div>
<?php endforeach; ?>
    <header>
        <div class="logo">
            <img src="../img/logo.png">
        </div>
        <div class="buttons">
            <div><a href="../index.php">Главная</a></div>
            <div>О нас</div>
            <div>Контакты</div>
            <div class="catalogDiv"><a class="aDisable">Каталог</a></div>
            <div>Акции</div>
        </div>
        <div class="menu">
            <a href="cart.php"><img src="../img/cart.png"></a>
            <img src="../img/user.png">
        </div>
        <div class="menuwrap"><img src="../img/menu.png"></div>
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
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="itemPageName"><span><?= $item['name']?></span></div>
                <div class="itemPageItem">
                    <div class="itemPageImg"><img src="../<?= $item['photo']?>"></div>
                    <div class="itemPageDesc"><span><?= $item['description']?></span></div>
                </div>
                <div class="itemPageInfo">
                    <div class="itemPagePrice"><span><?= $item['price'] ?>Р</span><?php if ($item['price_before'] >= 1):?><span><div class="priceBeforeLine"></div><?=$item['price_before']?>Р</span><?php endif;?></div class="addToCartDiv"><form><input class="displayNone" name="id" type="text" value="<?= $id?>"><input type="submit" value="Добавить в корзину" class="addToCart"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="flexCenter">
            <img class="loadGif displayNone" src="../img/system/load.gif">
            <span class="formMsg displayNone"></span>
        </div>
    </div>
    <footer>
        <div>
            <div><img src="../img/cart.png"><img src="../img/cart.png"></div>
        </div>
        <div>
            <div>Адрес: Пушкина дом 3<br>Телефон: +790953372613</div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>