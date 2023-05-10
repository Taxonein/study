<?php
session_start();
if (!$_SESSION['user']){
    header('Location: login.php');
}
require_once __DIR__ . 'php/connect.php';
?>