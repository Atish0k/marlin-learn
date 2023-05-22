<?php
session_start();
require ('connect.php');

$file = $_FILES['image'];
$extensions = pathinfo($file['name']);
$file['name'] = uniqid() . '.' . $extensions['extension'];
$newFilePath = __DIR__ . '/upload/' . $file['name'];

move_uploaded_file($file['tmp_name'], $newFilePath);

$sql = 'INSERT INTO `images`(`image_name`) VALUES (:fileName)';
$statement = $pdo->prepare($sql);
$statement->execute(['fileName' => $file['name']]);

$sql = 'SELECT * FROM `images`';
$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['images'] = $statement->fetchAll();

header('Location: task_18.php');