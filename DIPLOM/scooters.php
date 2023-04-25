<?php
require_once __DIR__ . '../connect.php';
function get_catalog(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM `catalog` ORDER BY id DESC LIMIT 0,6;");
    return $res->fetchAll();
}
$catalog = get_catalog();
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
            <img src="img/user.png">
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
        <div class="items">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="item">
                <div class="itemImg"><img src="img/logo.png"></div>
                <div class="itemPrice"><span>20000Р</span><span>18000Р</span></div>
                <div class="itemName"><span><?= $item['name']?></span></div>
                <!-- <div class="buyButton"><span><a href="itempage.php">КУПИТЬ</a></span></div> -->
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
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