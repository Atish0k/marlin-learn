<?php
session_start();
require ('connect.php');
$emailUser = 'd1@mail.ru';
$passwordUser = $_POST['password'];

$_SESSION['email'] = $emailUser;

$sql = 'SELECT * FROM `users` WHERE `email` = :emailUser';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser]);
$task = $statement->fetch();
if(!empty($task)){
    $message = 'Введенный email уже есть в базе';
    $_SESSION['warning'] = $message;
    exit();
}


$sql = 'INSERT INTO `users` (`email` , `pass`) VALUES (:emailUser, :passwordUser)';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser, 'passwordUser' => $passwordUser]);
$message = 'Регистрация успешна';
$_SESSION['success'] = $message;
header('Location: task_12.php')
?>
