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
<div class="wrapper">
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
            <div><img src="../img/vk.png"><img src="../img/youtube.png"></div>
        </div>
        <div>
            <div>Адрес: 141801, Московская обл., г. Дмитров, ул. Дубненская, д.2, корп. 1, комн. 8<br>Телефон: +7(495) 902-62-92, +7(495) 579-28-52</div>
        </div>
    </footer>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>