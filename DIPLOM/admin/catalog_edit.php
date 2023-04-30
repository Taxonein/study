<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../login.php');
}
require_once __DIR__ . '../../connect.php';
$id = $_GET['id'];
$catalogquery = $pdo->query("SELECT * FROM `catalog` WHERE `id` = '".$id."'");
$catalog = $catalogquery->fetch();

$categoryquery = $pdo->query("SELECT * FROM `catalog_category`");
$category_list = $categoryquery->fetchAll();
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
            <div><span>Панель администратора: <?=$_SESSION['user']['login']?></span><a href="../index.php"><span>НА САЙТ</span><a href="../admin.php"><span>НА ГЛАВНУЮ ПАНЕЛИ</span></a></div>
        </div>
        <div>
            <div><a href="orders.php"><span>ЗАКАЗЫ</span></a><a href="catalog.php"><span>КАТАЛОГ</span></a></div>
        </div>
    </header>
    <div class="filter">
        <a href="catalog.php"><span>ВСЕ ТОВАРЫ</span></a>
        <a href="catalog.php?id=<?php echo ('1');?>"><span>САМОКАТЫ</span></a>
    </div>
    <div class="container">
        <?php if($_SESSION['message']):?>
            <div class="sessionMsgInfo"><span><?=$_SESSION['message']?></span></div>
            <?php unset($_SESSION['message']);?>
        <?php endif;?>
        <?php
        $catalogcategoryquery = $pdo->query("SELECT `name` FROM `catalog_category` WHERE `id` = '".$item['category']."'");
        $category = $catalogcategoryquery->fetch();
        ?>
        <form action="catalog_update.php?id=<?= $catalog['id']?>" method="POST" enctype='multipart/form-data'>
        <div class="catalogItemInfoEdit">
            <div><input type="text" name="name" value="<?=$catalog['name']?>"></div>
        </div>
        <div class="catalogItemDescriptionEdit">
            <div><?php if($catalog['photo']):?><img src="../<?=$catalog['photo']?>"><?php else:?><img src="../img/catalog/nothing.png"><?php endif; ?></div>
            <div><textarea name="description"><?= $catalog['description']?></textarea></div>
        </div>
        <div class="catalogItemBody">
            <div>
                <span>ID товара: <?= $catalog['id']?></span>
                <span>Дата добавления: <?= $catalog['date']?></span>
            </div>
            <div>
                <div><span>Кол-во на складе: </span><input class="catalogItemBodyInputOne" type="text" name="qty" value="<?=$catalog['qty']?>"></div>
            </div>
        </div>
        <div class="catalogItemBody">
            <div>
                <span>Цена:</span><input class="catalogItemBodyInputOne" type="text" name="price" placeholder="<?=$catalog['price']?>">
                <span>Цена без скидки</span><input class="catalogItemBodyInputOne" type="text" name="price_before" placeholder="<?=$catalog['price_before']?>">
                <span>Загрузить фото:</span><input class="catalogItemBodyInputThree" name="img" type="file">
            </div>
        </div>
        <div class="catalogItemBody">
            <div>
                <div>
                    <span>Категория товара:</span>
                    <select class="categorySelect" name="category">
                        <?php foreach($category_list as $cat): ?>
                            <?php if ($cat['id'] == $catalog['category']): ?>
                                <option value="<?= $cat['id']?>" selected><?= $cat['name']?></option>
                            <?php else:?>
                                <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div>
                <div><input class="catalogItemBodySubmit" type="submit" value="СОХРАНИТЬ"></div>
            </div>
        </div>
        </form>
    <div>
</body>
</html>