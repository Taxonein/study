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


				<a href="map.php" class="adr">Адрес</a>
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



                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <div class="offer">



                            </div>
                            <div class="card-thumb">
                                <a href="#"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                            </div>
                            <div class="card-caption">
                                <div class="card-title">
                                    <a href="#"><?= $product['title'] ?></a>
                                </div>
                                <div class="card-price text-center">
                                    <?php if ($product['price']): ?>
                                        <del><?= $product['price'] ?> Р</del>
                                    <?php endif; ?>

                                </div>
                                <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-info btn-block add-to-cart" data-id="<?= $product['id'] ?>">
                                    <div class="Buy">Купить</div>
                                </a>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

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
