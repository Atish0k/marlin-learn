<?php
session_start();
require ('connect.php');
$text = $_POST['send-text'];

$_SESSION['textSes'] = $text;
$textSes = $_SESSION['textSes'];

$selectData = $pdo->query("SELECT `text` FROM `users`");
$selectData->execute();
$result = $selectData->fetchAll();
foreach ($result as $item){
    echo $item['text'].'<br>';
    if($item['text'] === $textSes){
        $_SESSION['res'] = false;
        header('Location: task_11.php');

        die();

    }
}
    $_SESSION['res'] = true;
    $sql = "INSERT INTO `users` (`text`) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['text' => $text]);
header('Location: task_11.php');
var_dump($_SESSION['res']);


?>