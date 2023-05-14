<?php
session_start();
if ($_SESSION['user']){
    header('Location: profile.php');
}
require_once __DIR__ . '../php/connect.php';
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
            <div class="textBlock"><span>Вход в личный кабинет:</span></div>
            <div class="center">
                <div class="formBlock">
                    <form>
                        <label>Ваш логин:</label>
                        <input type="text" name="login" placeholder="Введите свой логин"></input>
                        <label>Ваш пароль:</label>
                        <input type="password" name="password" placeholder="Введите свой пароль"></input>
                        <button class="registerSubmitButton" type="submit">ВОЙТИ</button>
                        <span>Вы еще не зарегистрированы?<br><a class="importantToSee" href="register.php">ЗАРЕГИСТРИРУЙТЕСЬ</a></span>
                    </form>
                </div>
            </div>
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