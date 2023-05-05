<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../user/profile.php');
}
require_once __DIR__ . '../../connect.php';
$catquery = $pdo->query("SELECT * FROM `catalog_category`");
$cats = $catquery->fetchAll();
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
            <div><span>Панель администратора: <?=$_SESSION['user']['login']?></span><a href="../index.php"><span>НА САЙТ</span><a href="admin.php"><span>НА ГЛАВНУЮ ПАНЕЛИ</span></a></div>
        </div>
        <div>
            <div><a href="orders.php"><span>ЗАКАЗЫ</span></a><a href="catalog.php"><span>КАТАЛОГ</span></a></div>
        </div>
    </header>
    <div class="filter">
        <a href="catalog.php"><span>ВСЕ ТОВАРЫ</span></a>
        <?php foreach ($cats as $cat):?>
        <a href="catalog.php?id=<?= $cat['id'];?>"><span><?= $cat['name'];?></span></a>
        <?php endforeach;?>
    </div>
    <div class="container">
        <?php
        if ($id){
            $catalogquery = $pdo->query("SELECT * FROM `catalog` WHERE `category` = '".$id."' ORDER BY id DESC");
            $catalog = $catalogquery->fetchAll();
        }else{
            $catalogquery = $pdo->query("SELECT * FROM `catalog` ORDER BY id DESC");
            $catalog = $catalogquery->fetchAll();
        }
        ?>
        <div class="catalogItems">
            <?php foreach($catalog as $item):?>
            <?php
            $catalogcategoryquery = $pdo->query("SELECT `name` FROM `catalog_category` WHERE `id` = '".$item['category']."'");
            $category = $catalogcategoryquery->fetch();
            ?>
                <hr>
                <div class="catalogItemInfo"><div><span><?= $item['name']?></span></div><div><a href="catalog_edit.php?id=<?php echo $item['id'];?>"><span>РЕДАКТИРОВАТЬ</span></a></div></div>
                <div class="catalogItemInfo"><div><span>На складе: <?= $item['qty']?> шт</span><span>Категория товара: <?= $category['name']?></span></div><div><span>Дата добавления: <?= $item['date']?></span></div></div>
                <div class="catalogItem">
                    <div class="catalogItemImg"><?php if($item['photo']):?><img src="../<?= $item['photo']?>"><?php else:?><img src="../img/catalog/nothing.png"><?php endif; ?></div>
                    <div class="catalogItemDescription"><span><?=$item['description']?></span></div>
                </div>
            <?php endforeach;?>
        <div>
    <div>
</body>
</html>