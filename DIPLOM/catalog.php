<?php
require_once __DIR__ . '../connect.php';
$categoryid = $_GET['category'];
$page = $_GET['page'];
global $limit;
global $pages;
global $pageList;
$pageList = 1;

if (!$categoryid){
    header('Location: ../index.php');
}
$paginationcatalog = $pdo->query("SELECT `id` FROM `catalog` WHERE `category` = '".$categoryid."'");
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
    $res = $pdo->query("SELECT * FROM `catalog` WHERE `category` = '".$categoryid."' ORDER BY id DESC LIMIT $sqlmin,$sqlmax");
    $catalog = $res->fetchAll();
}else{
    $res = $pdo->query("SELECT * FROM `catalog` WHERE `category` = '".$categoryid."' ORDER BY id DESC LIMIT 60");
    $catalog = $res->fetchAll();
}

$categoriesquery = $pdo->query("SELECT * FROM `catalog_category` WHERE id = '".$categoryid."'");
$categoriesname = $categoriesquery->fetch();
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
        <div class="textBlock"><span><?= $categoriesname['name'];?></span></div>
        <div class="items">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $item): ?>
                <div class="item">
                    <a href="user/itempage.php?id=<?php echo $item['id'];?>">
                    <div class="itemImg"><?php if($item['photo']):?><img src="<?= $item['photo']?>"></div><?php else:?><img src="img/catalog/nothing.png"></div><?php endif;?>
                        <div class="itemPrice"><span><?= $item['price']?>Р</span><?php if ($item['price_before'] >= 1):?><span><div class="priceBeforeLine"></div><?=$item['price_before']?>Р</span><?php endif;?></div>
                    <div class="itemName"><span><?= $item['name']?></span></div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php if($pagination > 1): ?>
<div class="center">
            <div class="pageSelect">
                <?php if ($page >= 2):?><a href="<?= $_SERVER['PHP_SELF'] .'?category='. $categoryid .'&page='.($page - 1)?>"><div><img src="img/prev.png"></div></a><?php else:?><a href=""><div><img src="img/prev.png"></div></a><?php endif;?>
                <div>
                    <?php while($cycle > 0):?>
                    <?php
                    $link = http_build_query(array_merge($_GET, ["page"=>$pageList]));
                    ?>
                    <?php if ($page == $pageList): ?>
                        <a href="<?= $_SERVER['PHP_SELF']?>?<?=$link?>" class="importantToSee"><span><?= $pageList?></span></a>
                    <?php else:?>
                        <a href="<?= $_SERVER['PHP_SELF']?>?<?=$link?>"><span><?= $pageList?></span></a>
                    <?php endif;?>
                    <?php
                    $pageList = $pageList + 1;
                    $cycle = $cycle - 1;
                    ?>
                    <?php endwhile;?>
                </div>
                <?php if (($page != $pages)):?><a href="<?= $_SERVER['PHP_SELF'] .'?category='. $categoryid .'&page='.($page + 1)?>"><div><img src="img/next.png"></div></a><?php else:?><a href=""><div><img src="img/next.png"></div></a><?php endif;?>
            </div>
        </div>
        <?php endif;?>
        <?php include 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>