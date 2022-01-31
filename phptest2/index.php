<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="style/style.css" rel="stylesheet">
<script type="text/javascript" src="scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="scripts/js.js"></script>
<body>
    <div class="container">
        <div class="wrap">
            <form method="POST" action="auth.php">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="pass" placeholder="Пароль">
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
            <br><br>
            <form name="test3" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
        <input type="text" placeholder="Введите имя" name="nam"><br>
        <input type="submit"><br>
        <?php
        $nam=isset($_GET['nam'])?$_GET['nam']:NULL;
        switch ($nam){
            case("Ваня"):
            case("ваня"):
                echo "Узбек";
            break;
            case("Дима"):
            case("дима"):
                echo "Да";
            break;
            case("Влад"):
            case("влад"):
                    echo "Мыыыыуеее";
            break;
            default:
                echo "Введите корректное имя";
        }
        ?>
        </form>
        </div>
    </div>
</body>
</html>