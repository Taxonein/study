<?php
$HOST= '127.0.0.1';
$DB= 'todo';
$USER= 'root';
$PASS= '';
$CHARSET= 'utf8';
$dsn = "mysql:host=$HOST;dbname=$DB;charset=$CHARSET";
$pdo = new PDO($dsn, $USER, $PASS);