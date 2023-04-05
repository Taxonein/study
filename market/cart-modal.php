<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фото</th>
                <th scope="col">Назв.</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="#"><img src="img/<?= $item['img'] ?>" alt="<?= $item['title'] ?>"></a></td>
                    <td><a href="#"><?= $item['title'] ?></a></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['qty'] ?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="4" align="right">Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                    <br> Сумма: <?= $_SESSION['cart.sum'] ?> Р.
                </td>
            </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Корзина пуста</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
  
    <?php if (!empty($_SESSION['cart'])): ?>
        <button type="button" class="btn btn-primary">Заказать</button>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <?php endif; ?>
</div>
