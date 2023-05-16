<?php
//session_start();
//require ('connect.php');
//$text = $_POST['send-text'];
//
//$_SESSION['textSes'] = $text;
//$textSes = $_SESSION['textSes'];
//
//$selectData = $pdo->query("SELECT `text` FROM `users`");
//$selectData->execute();
//$result = $selectData->fetchAll();
//foreach ($result as $item){
//    echo $item['text'].'<br>';
//    if($item['text'] === $textSes){
//        $_SESSION['res'] = false;
//        header('Location: task_11.php');
//
//        die();
//
//    }
//}
//    $_SESSION['res'] = true;
//    $sql = "INSERT INTO `users` (`text`) VALUES (:text)";
//    $statement = $pdo->prepare($sql);
//    $statement->execute(['text' => $text]);
//header('Location: task_11.php');
//?>
<?php
session_start();
require ('connect.php');
$text = $_POST['send-text'];
$sql = "SELECT * FROM `users` WHERE `text` = :text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch();
if(!empty($task)){
    $message = 'Введенная запись уже существует в БД';
    $_SESSION['danger'] = $message;
    header('Location: /task_11.php');
    exit();
}
$sql = "INSERT INTO `users` (`text`) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$message = 'Запись успешно добавлена';
$_SESSION['success'] = $message;
header('Location: /task_11.php');
?>
