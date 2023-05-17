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
        <div class="contactsSector">
            <div class="contactsSectorBody">
                    <span class="contactsSectorInfo">Контактная информация:</span><br>
                    <span class="colorTextBlackGreen">E-mail:</span> contact@rubis.ru<br>
                    <span class="colorTextBlackGreen">Телефон:</span> (495) 902-62-92<br>
                    <span class="colorTextBlackGreen">Телефон/факс:</span> (495) 579-28-52<br>
                    <span class="contactsSectorInfo">Адреса компании:</span><br>
                    <span class="colorTextBlackGreen">Юридический адрес:</span> 141801, Московская обл., г. Дмитров, ул. Дубненская, д.2, корп. 1, комн. 8<br>
                    <span class="colorTextBlackGreen">Фактический адрес:</span> Московская обл., г. Долгопрудный, Дорожный пр-д., д.5, стр.4<br>
                    <span class="colorTextBlackGreen">Почтовый адрес:</span> 127204, г. Москва, а/я 2<br>
                    <span class="contactsSectorInfo">Мы на карте:</span><br>
            </div>
        </div>
        <div class="centerMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2198.192030486186!2d37.43710137719552!3d56.5677606289275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b4f619c0f34873%3A0xc09aab118d794a38!2z0J7QntCeINCg0YPQsdC40YE!5e0!3m2!1sru!2sru!4v1683380581265!5m2!1sru!2sru" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </div>
    <?php include 'footer.php' ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>