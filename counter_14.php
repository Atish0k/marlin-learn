<?php
session_start();

if(isset($_POST['buttonForm'])){
//    $count = $_SESSION['click'];
//    $count++;
//    $_SESSION['click'] = $count;
    $_SESSION['click'] = (int)$_SESSION['click'] + 1;
}
if(isset($_POST['buttonReset'])) {
    unset($_SESSION['click']);
}

header('Location: task_14.php');