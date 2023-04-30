<?php
session_start();
require_once __DIR__ . '../../connect.php';
$id = $_GET['id'];
$userquery = $pdo->query("UPDATE `orders` SET `status` = 2 WHERE id = '".$id."'");
header('Location: orders.php');
?>