<?php
session_start();
if (!$_SESSION['user']){
    header('Location: login.php');
}
require_once __DIR__ . 'php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <div><img src="img/system/logo.png"></div>
            </div>
            <div class="buttons">
                <div><span>ГЛАВНАЯ</span></div>
                <div><span>О НАС</span></div>
                <div><span>КОНТАКТЫ</span></div>
                <div><span>КАТАЛОГ</span></div>
            </div>
            <div class="menu">
                <div><img src="img/system/cart.png"></div>
                <div><a href="profile.php"><img src="img/system/user.png"></a></div>
            </div>
        </header>
        <div class="container">
            <div class="alert displayNone">
                <div class="alertHead"><span>Оповещение</span><img class="alertClose" src="img/system/minus.png"></div>
                <div><span class="alertBody">Тестовое Тестовое Тестовое Тестовое Тестовое</span></div>
            </div>
            <div class="textBlock"><span>Последние новинки:</span></div>
            <div class="center">
                <div class="slider">
                    <div class="sliderLine">
                        <img src="img/system/cart.png">
                        <img src="img/system/user.png">
                        <img src="img/system/logo.png">
                        <img src="img/system/vk.png">
                        <img src="img/system/cart.png">
                        <img src="img/system/logo.png">
                    </div>
                    <div class="sliderButtons"><span class="sliderPrev">&lt</span><span class="sliderNext">&gt</span></div>
                </div>
            </div>
            <button class="modalBtnOpen">Тест модаль</button>
        </div>
        <footer>
            <div class="links">
                <div><img src="img/system/vk.png"></div>
                <div><img src="img/system/vk.png"></div>
                <div><img src="img/system/vk.png"></div>
            </div>
            <div class="info">
                <div><span>Адрес: Пушкина дом колотушкина1<br>Телефон: +79098529626</span></div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>