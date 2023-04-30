<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../login.php');
}
require_once __DIR__ . '../connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css" type="text/css">
    <title>SITE ADMIN PANEL</title>
</head>
<body>
    <header>
        <div>
            <div><span>Панель администратора: <?=$_SESSION['user']['login']?></span><a href="../index.php"><span>НА САЙТ</span></a><a href="admin.php"><span>НА ГЛАВНУЮ ПАНЕЛИ</span></a></div>
        </div>
        <div>
            <div><a href="admin/orders.php"><span>ЗАКАЗЫ</span></a><a href="admin/catalog.php"><span>КАТАЛОГ</span></a></div>
        </div>
    </header>
</body>
</html>