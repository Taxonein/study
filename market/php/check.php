<?php
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);

$Surname = filter_var(trim($_POST['Surname']),
FILTER_SANITIZE_STRING);

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);



$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);


$password = md5($password."qwerty");

$mysql = new mysqli('localhost', 'root', '', 'catalog');
$mysql->query("INSERT INTO `user` (`name`, `Surname`, `login`, `email`, `password`)
 VALUES('$name', '$Surname', '$login', '$email', '$password') ");

 $mysql->close();

 header('Location: reg.php');

?>
