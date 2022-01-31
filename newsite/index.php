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
    <header>
        <img class="logo" src="img/image.png">
        <div class="navbar">
        <ul>
            <li><a href="">BUTTON</a></li>
            <li><a href="">BUTTON</a></li>
            <li><a href="">BUTTON</a></li>
            <li><a href="">BUTTON</a></li>
        </ul>
        </div>
        <div class="menubut"></div>
    </header>
    <div class="container">
        <div class="mbar">
            <ul>
                <li><a href="">BUTTON</a></li>
                <li><a href="">BUTTON</a></li>
                <li><a href="">BUTTON</a></li>
                <li><a href="">BUTTON</a></li>
            </ul>
        </div>
        <div class="stext"><h1 class="w_text">ГОЛОСУЙ ЗА СКАЗОЧНЫХ</h1></div>
        <div class="main1">
            <div class="block"><img class="blockimg" src="img/1.png"><span class="blocktext"><h3>Винни-Пух</h3><br>Первый лидер</span><br><button class="vote1">ГОЛОСОВАТЬ</button></div>
            <div class="block"><img class="blockimg" src="img/2.png"><span class="blocktext"><h3>Леопольд</h3><br>Второй лидер</span><br><button class="vote2">ГОЛОСОВАТЬ</button></div>
            <div class="block"><img class="blockimg" src="img/3.png"><span class="blocktext"><h3>Кеша</h3><br>Третий лидер</span><br><button class="vote3">ГОЛОСОВАТЬ</button></div>
        </div>
        <div class="votemain">
            <div class="vote">
                <img class="imgvote" src="img/image.png">
                <select name="choose" class="chsel">
                    <option value="0">Выберите героя</option>
                    <option value="1">Винни-Пух</option>
                    <option value="2">Леопольд</option>
                    <option value="3">Кеша</option>
                    <option value="4">Волк</option>
                </select>
                <span class="votetext">
                    Имя героя:<br> <span class="heroname">?</span><br>
                    Кол-во голосов:<br> <span class="herovote">?</span>
                </span>
            </div>
        </div>
    </div>
    <footer>
        <span>
        </span>
    </footer>
</body>
</html>