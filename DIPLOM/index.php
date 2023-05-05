<?php
require_once __DIR__ . '../connect.php';

$res = $pdo->query("SELECT * FROM `catalog` ORDER BY id DESC LIMIT 0,6;");
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
            <div class="newsHead"><span>Последние новости:</span><span>Дата:</span></div>
            <img src="img/logo.png"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat massa eu ex dignissim, vitae tristique nisl sagittis. Nunc iaculis congue odio. Fusce pulvinar, est nec feugiat interdum, neque ex cursus neque, ut dapibus dolor neque vel tellus. Aenean dignissim erat vitae lectus cursus, eget pellentesque neque iaculis. Nam vulputate molestie erat. In hac habitasse platea dictumst. Etiam urna urna, vehicula vitae ullamcorper sit amet, rutrum in arcu. Nullam sit amet rutrum odio, vitae consectetur tellus. Mauris nec massa eu mi cursus consectetur nec ullamcorper ex. Pellentesque vel blandit purus. Nunc orci neque, pulvinar eget posuere vitae, lobortis id nibh. Ut hendrerit sed augue quis consequat. Maecenas porttitor libero velit, ut cursus orci commodo a.

            Mauris venenatis, arcu et tincidunt scelerisque, ex dui condimentum neque, sed ultrices nulla nisl nec erat. Phasellus dictum velit efficitur, malesuada tellus at, sodales tellus. Duis varius quam sed lorem lobortis laoreet. Suspendisse at faucibus tellus. Aliquam sit amet justo eros. Cras ligula enim, laoreet et commodo ac, aliquam sed quam. Nullam viverra rhoncus felis sagittis venenatis. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tristique lacus felis, vestibulum lobortis sapien tempor sed. Sed non pellentesque nibh, fermentum aliquam orci. Nullam leo neque, vehicula venenatis euismod at, luctus id odio. Morbi massa est, iaculis sit amet malesuada sit amet, ornare ac tellus.
            
            Quisque dictum mollis erat a tristique. Praesent lobortis magna sed iaculis tincidunt. Vestibulum odio nisi, vulputate vel augue id, accumsan lobortis tortor. Donec ullamcorper metus ut venenatis malesuada. Sed quis finibus mauris. Morbi id neque eget ex gravida sollicitudin sit amet vel urna. Nam ut nulla quis magna scelerisque auctor. Quisque aliquam ullamcorper ligula, vitae pulvinar est faucibus eu. Quisque posuere velit at aliquam faucibus. Nam sit amet augue sed leo efficitur egestas a placerat odio. Ut gravida tempor nulla. Vestibulum a quam eget ligula placerat lobortis. Donec nec felis eleifend, consequat libero ut, laoreet dolor. Vivamus bibendum tellus ipsum, ut fringilla orci egestas in. Proin varius dapibus metus, et eleifend lectus ullamcorper at. Curabitur in auctor lectus.
            
            Aliquam nec nisl nulla. Nullam feugiat erat nec risus gravida lacinia. In lacinia tellus vestibulum ligula condimentum, quis venenatis lorem scelerisque. Integer eu tortor placerat, sagittis sem ut, aliquam dolor. Nunc tincidunt iaculis semper. Etiam semper leo vitae iaculis blandit. Aenean vel elit a nisl consectetur tincidunt. Donec in consectetur libero. Nam malesuada nisi eu tortor porta cursus. Proin pellentesque sed est ut dapibus.
            
            Integer leo neque, tincidunt et ligula eu, consequat sollicitudin erat. Vivamus rhoncus egestas auctor. Nunc ultrices dui rutrum nisl molestie laoreet. Praesent eu scelerisque augue, vel egestas magna. Donec ac sagittis libero, id eleifend urna. Nam id ligula ut felis maximus mattis sed quis lacus. Morbi ac lectus nibh. Nunc est augue, tristique eu erat mollis, viverra imperdiet mauris. Cras lacinia mauris tellus, nec fermentum lectus sollicitudin et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac enim tempor ligula tincidunt porta at quis nunc. Quisque lobortis efficitur blandit.
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
            <div><img src="img/cart.png"></div>
            <div><img src="img/cart.png"></div>
            <div><img src="img/cart.png"></div>
            <div><img src="img/cart.png"></div>
            <div><img src="img/cart.png"></div>
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
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>