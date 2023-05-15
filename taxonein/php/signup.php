<?php
session_start();
if ($_SESSION['user']){
    header('Location: ../profile.php');
}

require_once __DIR__ . '/../php/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password_reply = $_POST['password_reply'];
$mail = $_POST['mail'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$rules = $_POST['rules'];


$login = filter_var(trim($login),
FILTER_SANITIZE_STRING);

$mail = filter_var(trim($mail),
FILTER_SANITIZE_STRING);

$password = filter_var(trim($password),
FILTER_SANITIZE_STRING);

$password_reply = filter_var(trim($password_reply),
FILTER_SANITIZE_STRING);

$name = filter_var(trim($name),
FILTER_SANITIZE_STRING);

$surname = filter_var(trim($surname),
FILTER_SANITIZE_STRING);

$patronymic = filter_var(trim($patronymic),
FILTER_SANITIZE_STRING);

$errors = [];
if ($rules == 'true'){
    if ($login == ''){
        $errors[] = 'login';
    }
    if ($password == ''){
        $errors[] = 'password';
    }
    if ($password_reply == ''){
        $errors[] = 'password_reply';
    }
    if ($mail == ''){
        $errors[] = 'mail';
    }
    if ($name == ''){
        $errors[] = 'name';
    }
    if ($surname == ''){
        $errors[] = 'surname';
    }
    if ($patronymic == ''){
        $errors[] = 'patronymic';
    }
    if (!empty($errors)){
        $response = [
            "status" => false,
            "message" => 'Проверьте правильность полей',
            "fields" => $errors
        ];
        echo json_encode($response);
        die();
    }
}else{
    $response = [
        "status" => false,
        "message" => 'Вы не согласились с правилами!',
    ];
    echo json_encode($response);
    die();
}

// if (!(($login <= 2) && (strlen($password) < 8))){
//     $password = md5($password);
//     global $pdo;
//     $usercheck = $pdo->query("SELECT `id`,`status` FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
//     $usercheckdata = $usercheck->fetch();
//     if ($usercheckdata){
//         // $_SESSION['user'] =[
//         //     "id" => $usercheckdata['id'],
//         //     "status" => $usercheckdata['status']
//         // ];
//         $response = [
//             "status" => true,
//             "message" => 'Успешный вход'
//         ];
//         echo json_encode($response);
//     }else{
//         $response = [
//             "status" => false,
//             "message" => 'Неверный логин или пароль'
//         ];
//         echo json_encode($response);
//     }
// }else{
//     $response = [
//         "status" => false,
//         "message" => 'Введите данные!'
//     ];
//     echo json_encode($response);
// }


















// $password = md5($password);
// global $pdo;
// $usercheck = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
// $usercheckdata = $usercheck->fetch();

// if ($usercheckdata){
//     $_SESSION['user'] = [
//         "id"=> $usercheckdata['id'],
//         "status"=>$usercheckdata['status']
//     ];
//     $response = [
//         "status" => true
//     ];
//     echo json_encode($response);
// }else{
//     $response = [
//         "status" => false,
//         "message" => 'Неверный логин или пароль'
//     ];
//     echo json_encode($response);
// }


// $fullname = filter_var(trim($_POST['fullname']),
// FILTER_SANITIZE_STRING);

// $login = filter_var(trim($_POST['login']),
// FILTER_SANITIZE_STRING);

// $password = filter_var(trim($_POST['password']),
// FILTER_SANITIZE_STRING);

// $password_reply = filter_var(trim($_POST['password_reply']),
// FILTER_SANITIZE_STRING);

// $email = filter_var(trim($_POST['email']),
// FILTER_SANITIZE_STRING);

// global $pdo;
// $logincheck = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login'");
// $logincheckdata = $logincheck->fetch();
// $mailcheck = $pdo->query("SELECT * FROM `users` WHERE `mail` = '$email'");
// $mailcheckdata = $mailcheck->fetch();
// $time = date('d.m.Y H:i:s');
?>


