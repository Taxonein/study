<?php
include ("connect.php");
$login = $_POST['login'];
$pass = $_POST['pass'];
$passconf = $_POST['passconf'];
$mail = $_POST['mail'];
if ($pass == $passconf){
    mysqli_query($connect, "INSERT INTO `user` (`id` , `login` , `pass` , `mail`) VALUES (NULL, '$login', '$pass', '$mail')");
    $_SESSION['message'] = 'yes';
    header('Location: ../index.php');
}
else{
    $_SESSION['message'] = 'no';
    header('Location: ../index.php');
}
?>