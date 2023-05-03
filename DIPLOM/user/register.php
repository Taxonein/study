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
    <?php include '../user/header.php' ?>
    <div class="container">
    <div class="textBlock"><span>Регистрация аккаунта</span></div>
        <div class="userForm">
            <form action="signup.php" method="POST">
            <label>Ф.И.О:</label>
            <input type="text" name="fullname" placeholder="Введите свое Ф.И.О"></input>
            <label>Логин:</label>
            <input type="text" name="login" placeholder="Введите свой логин"></input>
            <label>Пароль:</label>
            <input type="password" name="password" placeholder="Введите свой пароль"></input>
            <label>Пароль:</label>
            <input type="password" name="password_reply" placeholder="Подтведите свой пароль"></input>
            <label>Почта:</label>
            <input type="email" name="email" placeholder="Введите свою почту"></input>
            <button type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            <span>У вас уже есть аккаунт?<br> <a href="login.php">войдите</a></span>
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