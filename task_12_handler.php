<?php
session_start();
require ('connect.php');
$emailUser = $_POST['email'];
$passwordUser = $_POST['password'];

$sql = 'SELECT * FROM `users` WHERE `email` = :emailUser';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser]);
$task = $statement->fetch();
if(!empty($task)){
    $message = 'Введенный email уже есть в базе';
    $_SESSION['warning'] = $message;
    header('Location: task_12_create.php');
    exit();
}

$hashedPassword = password_hash($passwordUser, PASSWORD_DEFAULT);
$sql = 'INSERT INTO `users` (`email` , `pass`) VALUES (:emailUser, :passwordUser)';
$statement = $pdo->prepare($sql);
$statement->execute(['emailUser' => $emailUser, 'passwordUser' => $hashedPassword]);
$message = 'Регистрация успешна';
$_SESSION['success'] = $message;
header('Location: task_12_create.php');
?>
