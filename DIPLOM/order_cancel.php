<?php
session_start();
require_once __DIR__ . '../connect.php';
$id = $_GET['id'];
$usercartquery = $pdo->query("UPDATE `orders` SET `status` = 3 WHERE `id` = '".$id."'");
header('Location: profile.php');
?>