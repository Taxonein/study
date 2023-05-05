<?php
require_once __DIR__ . '../connect.php';
$category = $_GET['category'];
$page = $_GET['page'];
global $limit;
global $pages;
global $pageList;
$pageList = 1;

if (!$category){
    header('Location: ../index.php');
}
$paginationcatalog = $pdo->query("SELECT `id` FROM `catalog` WHERE `category` = '".$category."'");
$pagination = $paginationcatalog->fetchAll();
$pagination = ((count($pagination)) / 60);

if ($pagination > ($pagination % 60)){
    $limit = $pagination + 1;
    $pages = ($pagination % 60) + 1;
    $cycle = ($pagination % 60) + 1;
}

if ($page){
    $sqlmax = $page * 60;
    $sqlmin = $sqlmax - 60;
    $res = $pdo->query("SELECT * FROM `catalog` WHERE `category` = '".$category."' LIMIT $sqlmin,$sqlmax");
    $catalog = $res->fetchAll();
}else{
    $res = $pdo->query("SELECT * FROM `catalog` WHERE `category` = '".$category."' LIMIT 60");
    $catalog = $res->fetchAll();
}

$categoriesquery = $pdo->query("SELECT * FROM `catalog_category` WHERE id = '".$category."'");
$categories = $categoriesquery->fetch();
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
<?php include 'user/header.php' ?>
    <div class="container">
        <div class="textBlock"><span><?= $categories[0]['name'];?></span></div>
        <div class="items">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="item">
                    <a href="itempage.php?id=<?php echo $item['id'];?>">
                    <div class="itemImg"><img src="img/logo.png"></div>
                    <div class="itemPrice"><span><?= $item['price']?>Р</span><?php if ($item['price_before'] >= 1):?><span><div class="priceBeforeLine"></div><?=$item['price_before']?>Р</span><?php endif;?></div>
                    <div class="itemName"><span><?= $item['name']?></span></div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="center">
            <div class="pageSelect">
                <?php if ($page >= 2):?><a href="<?= $_SERVER['PHP_SELF'] .'?category='. $category['id'] .'&page='.($page - 1)?>"><div><img src="img/prev.png"></div></a><?php else:?><a href=""><div><img src="img/prev.png"></div></a><?php endif;?>
                <div>
                    <?php while($cycle > 0):?>
                    <?php
                    $link = http_build_query(array_merge($_GET, ["page"=>$pageList]));
                    ?>
                    <a href="<?= $_SERVER['PHP_SELF']?>?<?=$link?>"><span><?= $pageList?></span></a>
                    <?php
                    $pageList = $pageList + 1;
                    $cycle = $cycle - 1;
                    ?>
                    <?php endwhile;?>
                </div>
                <?php if ($page <= $pages):?><a href="<?= $_SERVER['PHP_SELF'] .'?category='. $category['id'] .'&page='.($page + 1)?>"><div><img src="img/next.png"></div></a><?php else:?><a href=""><div><img src="img/next.png"></div></a><?php endif;?>
            </div>
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
    <script src="js/main.js"></script>
</body>
</html>