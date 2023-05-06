<?php
require_once __DIR__ . '../connect.php';

$res = $pdo->query("SELECT * FROM `catalog` ORDER BY id DESC LIMIT 0,10;");
$catalog =  $res->fetchAll();
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
<div class="wrapper">
<?php include 'header.php' ?>
    <div class="container">
        <div class="aboutSector">
            <div class="aboutSectorHead"><span>О НАС</span></div>
            <div class="aboutSectorBody">
                <div>
                    <span>
                    Профессиональная команда понимает потребности домашних животных. Поэтому обширный и разнообразный ассортимент TiTBiT.ru максимально полно обеспечивает всем необходимым наших подопечных. Мы отвечаем за их аппетит, здоровье, веселый нрав и правильное развитие.<br><br>
                    Не нужно тратить много времени, посещать различные зоомагазины в поисках безопасных натуральных лакомств для любимого домашнего питомца, а также нести тяжелые пакеты с кормом.
                    </span>
                </div>
                <div>
                    <span>
                    Сегодня недорого приобрести в нашем магазине действительно качественную продукцию без искусственных консервантов, красителей и ароматизаторов может житель любого российского уголка. В регионы доставка зоотоваров осуществляется компанией EMS Russian Post, в Москве и МО продукция доставляется бесплатно. Наши сбалансированные корма и лакомства одобрены и рекомендованы ветеринарами для ежедневного использования домашними животными. Сертифицированная качественная продукция принесет вашему любимцу отменное здоровье и удовольствие.
                    </span>
                </div>
            </div>
            <div class="aboutSectorImgCenter"><img src="img/about_bottom.png"></div>
        </div>
    </div>
    <footer>
        <div>
            <div><img src="img/vk.png"><img src="img/youtube.png"></div>
        </div>
        <div>
            <div>Адрес: 141801, Московская обл., г. Дмитров, ул. Дубненская, д.2, корп. 1, комн. 8<br>Телефон: +7(495) 902-62-92, +7(495) 579-28-52</div>
        </div>
    </footer>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>