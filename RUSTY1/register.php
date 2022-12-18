<?php
require_once('dbconfig.php');
$name = $_POST['name'];
$pass = $_POST['pass'];
$mail = $_POST['mail'];



$ex = $pdo->query("INSERT INTO `user` (`name`, `pass`, `mail`) VALUES ('$name', '$pass', '$mail')");

header('Location: /');