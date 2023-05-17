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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Skido4kin</title>
</head>
<body>
<div class="wrapper">
<?php include 'header.php' ?>
    <div class="container">
        <div class="mainHello">
            <div><span>TiTBiT</span><span>Мы знак качества</span></div>
        </div>
        <div class="greenLine"></div>
        <div class="whatPanels">
            <div class="whatPanelsPanel" data-aos="fade-up">
                <div>
                    <span>Производство в России</span>
                </div>
                <div>
                    <span>Благодаря производству находящимся в России, мы уменьшаем затраты на логистику и исключаем риски с перебоями продукции, благодаря чему потребитель всегда сможет приобрести нашу продукцию</span>
                </div>
            </div>
            <div class="whatPanelsPanel" data-aos="fade-up">
                <div>
                    <span>Высококачественное сырье</span>
                </div>
                <div>
                    <span>Мы не используем искусственных консервантов, красителей и генномодифицированных компонентов при производстве. Вся продукция изготавливается из отечественного сырья</span>
                </div>
            </div>
            <div class="whatPanelsPanel" data-aos="fade-up">
                <div>
                    <span>Контроль качества</span>
                </div>
                <div>
                    <span>Мы проводим строгий ветеринарный контроль входящего сырья и готового продукта. Вся выпускаемая продукция соответствует установленным ветеринарно-санитарным нормам и ГОСТ, а также в обязательном порядке декларируется</span>
                </div>
            </div>
            <div class="greenLine"></div>
        </div>
        <div class="news">
            <div class="newsHead"><span>Последние новости:</span><span>Дата: 06.05.2023</span></div>
            <img src="img/about_logo.png"><span class="newsBody">Уважаемые клиенты, недавно на нашем предприятии в рядах цехов обновилось оборудование контроля качества, по этой причине мы предлагаем вам купить нашу продукцию, и убедиться в этом на деле! Мы заботимся о ваших питомцах, с уважением, комманда TiTBiT</span>
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
    <?php include 'footer.php' ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/AOS.js"></script>
    <script src="js/main.js"></script>
</body>
</html>