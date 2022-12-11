<!DOCTYPE html>
<html lang="en">
<head>
    <link href="style/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navlogo"><img src="media/logo.png"></div>
        <div class="navcat">
            <div class="">ГЛАВНАЯ</div>
            <div class="">О НАС</div>
            <div class="">КАТАЛОГ</div>
            <div class="">КОНТАКТЫ</div>
        </div>
        <div class="navmenu">MENU</div>
    </header>
    <div class="container">
        <form action="test.php" method="POST">
        <input type="text" name="name" required>
        <input type="email" name="mail" required>
        <input type="password" name="pass" required>
        <input type="submit" value="ENTER">
        </form>
    </div>
    <footer>
    </footer>
</body>
</html>