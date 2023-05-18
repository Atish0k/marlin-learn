<?php
session_start();
require ('connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = 'SELECT * FROM `users` WHERE `email` = :email ';
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$task = $statement->fetch();

if(empty($task)){
    $_SESSION['success'] = false;
    header('Location: task_15.php');
    exit();
}
$passwordVerified = password_verify($password, $task['pass']);
$passwordVerified ? $_SESSION['success'] = true : $_SESSION['success'] = false;
$_SESSION['emailUser'] = $email;
$passwordVerified ? header('Location: task_16.php') : header('Location: task_15.php');
