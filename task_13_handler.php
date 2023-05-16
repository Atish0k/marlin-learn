<?php
session_start();
$text = $_POST['textInForm'];
$_SESSION['text'] = $text;

header('Location: task_13.php');