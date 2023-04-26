<?php
session_start();
if ($_SESSION['user']){
    header('Location: profile.php');
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
            <a href=""><img src="img/user.png"></a>
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
    <div class="textBlock"><span>Вход в аккаунт</span></div>
        <div class="userForm">
            <form action="signin.php" method="POST">
            <label>Логин:</label>
            <input type="text" name="login" placeholder="Введите свой логин"></input>
            <label>Пароль:</label>
            <input type="password" name="password" placeholder="Введите свой пароль"></input>
            <button type="submit">ВОЙТИ</button>
            <span>У вас нет аккаунта?<br> <a href="register.php">Зарегистрируйтесь</a></span>
            </form>
            <?php 
            if ($_SESSION['message']){
                echo '<span class="formMsg">'.$_SESSION['message'].'</span>';
            }
            unset($_SESSION['message'])
            ?>
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
    <script src="js/js.js"></script>
</body>
</html>