<?php
$DB_HOST= '127.0.0.1';
$DB= 'users';
$DB_USER= 'root';
$DB_PASS= '';
$DB_CHARSET= 'utf8';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_STRINGIFY_FETCHES => false,
    PDO::ATTR_EMULATE_PREPARES => false
];

$dsn = "mysql:host=$DB_HOST;dbname=$DB;charset=$DB_CHARSET";
$pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);