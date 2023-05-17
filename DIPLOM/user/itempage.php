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
<div class="wrapper">
<?php foreach ($catalog as $item): ?>
    <div><?php $item['name']?> </div>
<?php endforeach; ?>
<?php include '../user/header.php' ?>
    <div class="container">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="itemPageName"><span><?= $item['name']?></span></div>
                <div class="itemPageItem">
                    <div class="itemPageImg"><?php if($item['photo']):?><img src="../<?=$item['photo']?>"><?php else:?><img src="../img/catalog/nothing.png"><?php endif?></div>
                    <div class="itemPageDesc"><span><?= $item['description']?></span></div>
                </div>
                
                <div class="itemPageInfo">
                    <div class="itemPageCostBlock">
                        <div class="itemPagePrice"><div class="itemPagePriceMain"><span><?= $item['price'] ?>Р</span></div></div>
                <?php if ($item['price_before'] >= 1):?>
                    <div class="itemPagePriceDiscountDiv"><div class="itemPagePriceDiscountLine"></div><span class="itemPagePriceDiscount"><?=$item['price_before']?></span></div>
                <?php endif;?>
                </div>
                <?php if ($_SESSION['user']):?><div class="addToCartDiv"><form><input class="displayNone" name="id" type="text" value="<?= $id?>"><input type="submit" value="Добавить в корзину" class="addToCart"></form></div><?php else:?><div class="textBlock"><span>Чтобы добавить в корзину войдите в аккаунт!</span></div><?php endif;?>
                </div>




            <?php endforeach; ?>
        <?php endif; ?>
        <div class="flexCenter">
            <img class="loadGif displayNone" src="../img/system/load.gif">
            <span class="formMsg displayNone"></span>
        </div>
    </div>
    <?php include 'footer.php' ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>