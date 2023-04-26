<?php
session_start();
if (!$_SESSION['user']){
    header('Location: login.php');
}
require_once __DIR__ . '../connect.php';
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
    <header>
        <div class="logo">
            <img src="img/logo.png">
        </div>
        <div class="buttons">
            <div><a href="index.php">Главная</a></div>
            <div>О нас</div>
            <div>Контакты</div>
            <div class="catalogDiv"><a class="aDisable">Каталог</a></div>
            <div>Акции</div>
        </div>
        <div class="menu">
            <img src="img/cart.png">
            <a href="login.php"><img src="img/user.png"></a>
        </div>
        <div class="menuwrap"><img src="img/menu.png"></div>
    </header>
    <div class="menuDiv"></div>
    <div class="catalog">
        <div>
            <div><a href="scooters.php">Самокаты</a></div>
            <div>Велосипеды</div>
            <div>Скутеры</div>
            <div>Ролики</div>
            <div>Drugs</div>
        </div>
        <div>
            <div>Тест1</div>
            <div>Тест2</div>
            <div>Тест2Самокаты</div>
            <div>Самокаты</div>
            <div>Самокаты</div>
        </div>
    </div>
    <div class="container">
        <div class="textBlock"><span>Добро пожаловать в личный кабинет, <?= $_SESSION['user']['login']?></span></div>
        <div class="userGUI">
            <div class="userphoto">
                <img src="img/logo.png">
                <form class="userForm" action="userchange.php" method="POST">
                    <label>Загрузить новое фото профиля:</label>
                    <input name="userfile" type="file">
                    <button type="submit">ЗАГРУЗИТЬ</button>
                </form>
            </div>
            <div class="userInfo">
                <div><span>Ваше Ф.И.О: <?= $_SESSION['user']['fullname']?></span></div>
                <div><span>Ваша почта: <?= $_SESSION['user']['mail']?></span></div>
                <div><span>Ваша дата регистрации: <?= $_SESSION['user']['date']?></span></div>
                <div>
                <span>Ваш статус: 
                <?php
                if (!$_SESSION['user']['status']){
                    echo 'Пользователь';
                }
                if ($_SESSION['user']['status'] == 1){
                    echo 'Администратор';
                }
                ?>
                </span>
                </div>
                <div class="userInfoExit"><span><a href="logout.php">Выйти из аккаунта</a></span></div>
                <div><span>История покупок: <?= $_SESSION['user']['purchases']?></span></div>
            </div>
        </div>
        <div class="textBlock"><span><a href="admin.php">Открыть панель администрирования</a></span></div>
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
    <script src="js/js.js"></script>
</body>
</html>