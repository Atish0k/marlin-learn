<?php
session_start();
require ('connect.php');
if(empty($_POST['checkbox'])){
    $message = 'Согласитесь на обработку персональных данных';
    $_SESSION['warning'] = $message;
    header('Location: task_12_reg.php');
    exit();
}
$emailUser = $_POST['email'];
$loginUser = $_POST['login'];
$passwordUser = $_POST['password'];
$passwordRepeatUser = $_POST['repeatPassword'];

if($passwordUser !=$passwordRepeatUser){
    $_SESSION['warning'] = 'Пароли не совпадают';
    header('Location: task_12_reg.php');
    exit();
}

$sql = 'SELECT * FROM `users` WHERE `email` = :emailUser';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser]);
$task = $statement->fetch();
if(!empty($task)){
    $message = 'Введенный email уже есть в базе';
    $_SESSION['warning'] = $message;
    header('Location: task_12_reg.php');
    exit();
}

$hashedPassword = password_hash($passwordUser, PASSWORD_DEFAULT);
$sql = 'INSERT INTO `users` (`email`, `login`, `password`) VALUES (:emailUser, :loginUser, :passwordUser)';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser, 'loginUser' => $loginUser , 'passwordUser' => $hashedPassword]);
$message = 'Регистрация успешна';
$_SESSION['success'] = $message;
header('Location: task_15_auth.php');
?>
