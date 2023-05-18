<?php
session_start();
unset($_SESSION['emailUser']);
header('Location: task_15.php');