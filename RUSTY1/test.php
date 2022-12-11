<?php
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

foreach($_POST as $key => $value){
    echo ($value .  '<br>');
}
