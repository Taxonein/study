<?php
session_start();
require_once __DIR__ . '../../connect.php';
$userinfoquery = $pdo->query("SELECT * FROM `users` WHERE id = '".$_SESSION['user']['id']."'");
$userinfo = $userinfoquery->fetch();
if ($userinfo['status'] != 1){
    header('Location: ../user/profile.php');
}
$catalog_categoryquery = $pdo->query("SELECT * FROM `catalog_category`");
$catalog_category = $catalog_categoryquery->fetchAll();
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
            <div><span>Панель администратора: <?=$userinfo['login']?></span><a href="../index.php"><span>НА САЙТ</span></a><a href="admin.php"><span>НА ГЛАВНУЮ ПАНЕЛИ</span></a></div>
        </div>
        <div>
            <div><a href="orders.php"><span>ЗАКАЗЫ</span></a><a href="catalog.php"><span>КАТАЛОГ</span></a></div>
        </div>
    </header>
    <div class="nameOfPanel"><span>Главная панель управления сайтом</span></div>
    <?php if($_SESSION['message']):?><div class="impMessage"><span><?= $_SESSION['message']?></span></div><?php endif;?>
    <?php unset($_SESSION['message']);?>
    <div class="container_panel">
        <div class="panel">
            <form class="controlPanelForm" method="POST" action="category_add.php">
                <div class="nameOfPanel"><span>Добавление категорий</span></div>
                <div><span>Название категории</span></div>
                <input type="text" name="category" placeholder="Введите название">
                <input type="submit" value="ДОБАВИТЬ">
            </form>
        <div>
        <div class="panel">
            <form class="controlPanelForm" method="POST" action="category_delete.php">
                <div class="nameOfPanel"><span>Удаление категорий</span></div>
                <div><span>Выберите категорию</span></div>
                <select name="category">
                <option value="0">ВЫБЕРИТЕ КАТЕГОРИЮ</option>
                <?php foreach ($catalog_category as $category_item):?>
                    <option value="<?=$category_item['id']?>"><?=$category_item['name']?></option>>
                <?php endforeach;?>
                </select>
                <input type="submit" value="УДАЛИТЬ">
            </form>
        <div>
    </div>
</body>
</html>