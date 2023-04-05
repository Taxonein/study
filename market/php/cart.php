<?php

error_reporting(-1);
session_start();
require_once __DIR__ . '../php/db.php';
require_once __DIR__ . '../php/funcs.php';

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);

            if (!$product) {
                echo json_encode(['code' => 'error', 'answer' => 'Error product']);
            } else {
                add_to_cart($product);
                echo json_encode(['code' => 'ok', 'answer' => $product]);
            }
            break;

    }
}
