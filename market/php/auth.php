<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);

    $password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);


$password = md5($password."qwerty");

$mysql = new mysqli('localhost', 'root', '', 'catalog');


$result = $mysql->query("SELECT * FROM `user` WHERE `login` =
'$login' AND `password` = '$password'");
$user = $result->fetch_assoc();
if(count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/"  );



 $mysql->close();

 header('Location: ../user.php');

?>
