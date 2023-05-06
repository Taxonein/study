<?php
require_once __DIR__ . '../connect.php';

$res = $pdo->query("SELECT * FROM `catalog` ORDER BY id DESC LIMIT 0,10;");
$catalog =  $res->fetchAll();
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
<div class="wrapper">
<?php include 'header.php' ?>
    <div class="container">
        <div class="news">
            <div class="newsHead"><span>Последние новости:</span><span>Дата: 06.05.2023</span></div>
            <img src="img/about_logo.png"><span class="newsBody">Дорогие друзья, сегодня наш магазин официально открылся. Приветствуем всех!</span>
        </div>
        <div class="textBlock">
            <span>
                Последние новинки:
            </span>
        </div>
        <div class="items">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="item">
                    <a href="user/itempage.php?id=<?php echo $item['id'];?>">
                    <div class="itemImg"><?php if($item['photo']):?><img src="<?=$item['photo']?>"><?php else:?><img src="../img/catalog/nothing.png"><?php endif?></div>
                    <div class="itemPrice"><span><?= $item['price']?>Р</span><?php if ($item['price_before'] >= 1):?><span><div class="priceBeforeLine"></div><?=$item['price_before']?>Р</span><?php endif;?></div>
                    <div class="itemName"><span><?= $item['name']?></span></div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="textBlock"><span>Смотрите в категориях:</span></div>
        <div class="categoryDivs">
            <a href="catalog.php?category=1&page=1"><div><img src="img/cat.png"><div class="categoryText"><span>Кошкам</span></div></div></a>
            <a href="catalog.php?category=2&page=1"><div><img src="img/dog.png"><div class="categoryText"><span>Собакам</span></div></div></a>
            <a href="catalog.php?category=3&page=1"><div><img src="img/bird.png"><div class="categoryText"><span>Птицам</span></div></div></a>
            <a href="catalog.php?category=4&page=1"><div><img src="img/rodent.png"><div class="categoryText"><span>Грызунам</span></div></div></a>
            <a href="catalog.php?category=5&page=1"><div><img src="img/accessories.png"><div class="categoryText"><span>Аксессуары</span></div></div></a>
        </div>
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
    <script src="js/main.js"></script>
</body>
</html>