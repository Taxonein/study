<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WHAT DOES MY NAME MEAN</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <header class="header">
        <div class="div">
      <img src="css/image/logo.png" width="60px">
        </div>
      <span class="rainbow-animated">Я ГЕЙ И ПИДОРАС</span>
      <div>
        <p>значение имени</p>
      </div>
</header>
<div class="inner">
<form method="POST" action="auth.php">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="pass" placeholder="Пароль"><br>
                <input type="password" name="passconf" placeholder="Пароль">
                <input type="text" name="mail" placeholder="Почта">
                <input type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
                <?php
                if ($_SESSION['message']=="yes"){
                    echo '<span class="msg">'.$_SESSION['message'].'</span>';
                }
                unset($_SESSION['message']);
                ?>
            </form>
</div>
    <footer>
        <div class="footer" >
        <span class="rainbow-animated">Я ВСЁ ЕЩЁ ГЕЙ</span>
        </div>
    </footer>
</body>
</html>