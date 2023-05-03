<?php
session_start();
if ($_SESSION['user']){
    header('Location: /user/profile.php');
}
require_once __DIR__ . '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" type="text/css">
    <title>Skido4kin</title>
</head>
<body>
    <?php include '../user/header.php' ?>
    <div class="container">
    <div class="textBlock"><span>Вход в аккаунт</span></div>
        <div class="userForm">
            <form>
            <label>Логин:</label>
            <input type="text" name="login" placeholder="Введите свой логин"></input>
            <label>Пароль:</label>
            <input type="password" name="password" placeholder="Введите свой пароль"></input>
            <button type="submit" class="loginFormSubmit">ВОЙТИ</button>
            <span>У вас нет аккаунта?<br> <a class="importantToSee" href="register.php">Зарегистрируйтесь</a></span>
            </form>
            <img class="loadGif displayNone" src="../img/system/load.gif">
            <span class="formMsg displayNone"></span>
        </div>
    </div>
    <footer>
        <div>
            <div><img src="../img/cart.png"><img src="../img/cart.png"></div>
        </div>
        <div>
            <div>Адрес: Пушкина дом 3<br>Телефон: +790953372613</div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- <script src="../js/main.js"></script> -->
</body>
</html>