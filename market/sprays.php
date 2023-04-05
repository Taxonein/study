<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '../php/db.php';
require_once __DIR__ . '../php/funcs.php';
$products = get_products();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Main.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/Blocks.css">
      <link rel="stylesheet" href="./css/slider.css">
    <title>sprays</title>
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
			<li><a href="index.php">Назад</a></li>
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
    <button type="submit" name="search_btn">Найти</button>

				<a href="#" class="adr">Адрес</a>
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

<?php //debug($_SESSION); session_destroy(); ?>
    <div class="container">
        <div class="row">



                        <div class="product-card">
                            <div class="offer">



                            </div>
                            <div class="card-thumb">
                                <a href="#"><img src="img/r.png"></a>
                            </div>
                            <div class="card-caption">
                                <div class="card-title">
                                    <a href="#">Аквалор софт мини</a>
                                </div>
                                <div class="card-price text-center">

                                        <del>320 Р</del>


                                </div>
                                <a href="">
                                    <div class="Buy">Купить</div>
                                </a>

                            </div>
                        </div>







                            <div class="product-card">
                                <div class="offer">



                                </div>
                                <div class="card-thumb">
                                    <a href="#"><img src="img/u.png"></a>
                                </div>
                                <div class="card-caption">
                                    <div class="card-title">
                                        <a href="#">Отривин Ментол</a>
                                    </div>
                                    <div class="card-price text-center">

                                            <del>210 Р</del>


                                    </div>
                                    <a href="">
                                        <div class="Buy">Купить</div>
                                    </a>

                                </div>
                            </div>





            <div class="product-card">
                <div class="offer">



                </div>
                <div class="card-thumb">
                    <a href="#"><img src="img/o.png"></a>
                </div>
                <div class="card-caption">
                    <div class="card-title">
                        <a href="#">Тизин классик</a>
                    </div>
                    <div class="card-price text-center">

                            <del>130 Р</del>


                    </div>
                    <a href="">
                        <div class="Buy">Купить</div>
                    </a>

                </div>
            </div>



            </div>

            </div>

            <div class="row">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <br>
      <div class="footer">
        Телефон: 8 (499) 713-48-14
      </div>
        <!--Корзина-->
        <div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"></button>
        <button type="button" class="btn btn-primary" id="clear_cart"></button>
                    </div>
                    <div class="modal-cart-content">
                </div>
            </div>
        </div>
    <br>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
