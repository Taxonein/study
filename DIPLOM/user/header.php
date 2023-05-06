<?php
require_once __DIR__ . '../../connect.php';
$categoriesquery = $pdo->query("SELECT * FROM `catalog_category`");
$categories= $categoriesquery->fetchAll();
?>
<!DOCTYPE html>
<header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo.png"></a>
        </div>
        <div class="buttons">
            <div><a href="../index.php">Главная</a></div>
            <div><a href="../about.php">О нас</a></div>
            <div><a href="../contacts.php">Контакты</a></div>
            <div class="catalogDiv"><a class="aDisable">Каталог</a></div>
            <div><a href="../promo.php?page=1">Акции</a></div>
        </div>
        <div class="menu">
            <a href="../user/cart.php"><img src="../img/cart.png"></a>
            <a href="../user/profile.php"><img src="../img/user.png"></a>
        </div>
        <div class="menuwrap"><img src="../img/menu.png"></div>
    </header>
    <div class="menuDiv"></div>
    <div class="catalog">
        <div class="catalogButtons">
            <?php foreach($categories as $category):?>
            <div><a href="../catalog.php?category=<?= $category['id']?>&page=1"><?= $category['name']?></a></div>
            <?php endforeach;?>
        </div>
    </div>