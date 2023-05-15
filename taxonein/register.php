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
                <div><span class="alertBody"></span></div>
            </div>
            <div class="textBlock"><span>Регистрация на сайте:</span></div>
            <div class="center">
                <div class="formBlock">
                    <form>
                        <label>Ваше Имя:</label>
                        <input type="text" name="name" placeholder="Введите свое имя"></input>
                        <label>Ваша Фамилия:</label>
                        <input type="text" name="surname" placeholder="Введите свою фамилию"></input>
                        <label>Ваше Отчество:</label>
                        <input type="text" name="patronymic" placeholder="Введите свое отчество"></input>
                        <label>Ваш логин:</label>
                        <input type="text" name="login" placeholder="Введите свой логин"></input>
                        <label>Ваша Почта:</label>
                        <input type="mail" name="mail" placeholder="Введите свою почту"></input>
                        <label>Ваш пароль:</label>
                        <input type="password" name="password" placeholder="Введите свой пароль"></input>
                        <label>Повторите пароль:</label>
                        <input type="password" name="password_reply" placeholder="Введите свой пароль"></input>
                        <label>Соглашение с правилами:</label>
                        <input class="checkboxRules" type="checkbox" name="rules" value="1"></input>
                        <button class="registerSubmitButton" type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                        <span>Уже есть аккаунт?<br><a class="importantToSee" href="login.php">ВОЙДИТЕ</a></span>
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