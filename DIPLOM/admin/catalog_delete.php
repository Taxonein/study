<?php
session_start();
if ($_SESSION['user']['status'] != 1){
    header('Location: ../login.php');
}
$id = $_GET['id'];
$pdo->query("DELETE FROM `catalog` WHERE id = '".$id."'");
$_SESSION['message'] = 'Удален товар с id: '.$id.'';
header('Location: catalog.php');