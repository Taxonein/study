<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Main.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/Blocks.css">
      <link rel="stylesheet" href="./css/slider.css">
    <title>market</title>
</head>
<body>
  <div id="sidebar">
		<div class="toggle-btn" onclick="openMenu()">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<ul>
			<li>Меню</li>
			<li><a href="creams.php">Крема</a></li>
			<li><a href="sprays.php">Спреи</a></li>
			<li><a href="pils.php">Таблетки</a></li>
      <li><a href="Powders.php">Порошки</a></li>
		</ul>
	</div>

	<script>
		function openMenu(){
		document.getElementById("sidebar").classList.toggle('active');
		}
	</script>
    <div class="header">
			<div class="Menu_1">
				<form>

        	<a href="#" class="Logo">Лобня фарм</a>
          <form name="search" method="post" action="search.php">
    <input type="search" name="query" placeholder="Поиск">
    <button type="submit">Найти</button>


				<a href="index.php" class="adr">На главную</a>
        <a href="./php/reg.php" class="Enter">Вход</a>
          <button id="get-cart" type="button"  class="Basket" data-toggle="modal" data-target="#cart-modal">
              Корзина
          </button>

				</form>
			</div>
		</div>

</div>
<br>
<br>
<div align="center" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/lobnya_farm/155186994980/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Лобня-Фарм</a><a href="https://yandex.ru/maps/214/dolgoprudniy/category/pharmacy/184105932/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Аптека в Долгопрудном</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUJr-H5xC" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
<br>
<br>
<div class="footer">
  Телефон: 8 (499) 713-48-14
</div>
    </body>
</html>
