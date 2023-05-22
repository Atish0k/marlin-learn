<?php
session_start();
require ('connect.php');

$query = 'SELECT * FROM `images` WHERE `id` = :id_image';
$statement = $pdo->prepare($query);
$statement->execute(['id_image' => $_GET['id_image']]);
$result = $statement->fetchAll();


foreach ($result as $item){
    $pathDelImage = 'upload/' . $item['image_name'];

}
file_exists(unlink('upload/' . $result[0]['image_name']));

//foreach ($_SESSION['images'] as $item){
//    if($item['id'] === $result[0]['id']){
//        unset($item);
//    }
//}

//unset($_SESSION['images'][$_GET['id_image']]);
$query = 'DELETE FROM `images` WHERE `id` = :id_image';
$statement = $pdo->prepare($query);
$statement->execute(['id_image' => $_GET['id_image']]);

$sql = 'SELECT * FROM `images`';
$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['images'] = $statement->fetchAll();
header('Location: task_18.php');

