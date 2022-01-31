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

    </header>
    <div class="container">
        <div class="wrap">
            <form name="b" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
                <span class="wraptext">Доступные среды обитания: <span class="s1">горы</span> / <span class="s2">леса</span> / <span class="s3">моря</span> / <span class="s4">водоемы</span></span><br><br>
                <input class="textlabel" type="text" name="a">
                <input class="buttonss" type="submit"><br><br>
    <?php
    if(isset($_GET['a'])){
        if($_GET['a']=="горы"){
            echo "В горах живут барс и улар";
        }
        elseif($_GET['a']=="леса"){
            echo "В лесах живут заяц и рысь";
        }
        elseif($_GET['a']=="море"){
            echo "В морях живут краб и дельфин";
        }
        elseif($_GET['a']=="водоемы"){
            echo "В водоемах живут сом и рак";
        }
    }
    ?>
        </div>
        </form>
    </div>
    <footer>
        <form name="test" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
            <input type="text" name="a"><br>
            <input type="text" name="b"><br>
            <input type="submit"><br>
            <?php
            $a=isset($_GET['a'])?$_GET['a']:6;
            $b=isset($_GET['b'])?$_GET['b']:2;
            echo 'Сумма: ', ($a + $b);
            echo '<br>Произведение: ', ($a * $b);
            echo '<br>Степень: ', ($a ** $b);
            if($b!=0){
                $x= $a/$b;
                $c=$a+$b*$x;
                echo '<br>Лин.уравнение:', ($c);
            }
            else{
                echo '<br>Лин.уравнение: Решения нет';
            }
            ?>
        </form>
        <br><br><br>
        <form name="test" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="n"><br>
        <input type="submit"><br>
        <?php
        $n=isset($_GET['n'])?$_GET['n']:6;
        if ($n>1000){
            $i= $n/100;
            $n= $i*90;
            echo 'Со скидкой 10%: ', ($n);
        }
        else{
            echo 'Скидка не применяется.', ($n);
        }
        ?>
        </form>
        <br>
        <br>
        <br>
        <form name="test2" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="g"><br>
        <input type="text" name="e"><br>
        <input type="submit"><br>
        <?php
        $g=isset($_GET['g'])?$_GET['g']:11;
        $e=isset($_GET['e'])?$_GET['e']:12;
        $p=3.14;
        if($g>=$e){
            $s=$p*($g*$g)-$p*($e*$e);
            echo 'Ыааааугу:', ($s);
        }
        else{
            echo 'Выгу выгу э';
        }
        ?>
        </form>
        <br><br>
        <form name="test3" method="GET" action="<? $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="nam"><br>
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
    </footer>
</body>
</html>