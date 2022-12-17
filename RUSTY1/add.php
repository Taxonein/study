<?php
$task = $_POST['task'];
$HOST= '127.0.0.1';
$DB= 'todo';
$USER= 'root';
$PASS= '';
$CHARSET= 'utf8';

if($task == ''){
    echo('Введите задание');
    exit();
}
$dsn = "mysql:host=$HOST;dbname=$DB;charset=$CHARSET";
$pdo = new PDO($dsn, $USER, $PASS);
$sql = 'INSERT INTO tasks(task) VALUES(:task)';
// $query = $pdo->prepare($sql);
// $query->execute(['task' => $task]);
$exits = 'SELECT * FROM tasks';
echo($exits);

header('Location: /');