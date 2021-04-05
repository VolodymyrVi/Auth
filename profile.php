<?php
session_start();
error_reporting(E_ALL);
require_once 'vendor/config.php';
if(!$_SESSION['user']){
    header('Location: /');
}

$login = $_SESSION['user']['login'];
//
$result = $mysql->query("SELECT login, number FROM users WHERE login='$login'");
  $user = mysqli_fetch_assoc($result);
  $_SESSION['user'] = [
    "login" => $user['login'],
    "number" => $user['number']
  ];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Страница авторизации</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="cal">
        <form>
        <h2><?echo $user['number'];?></h2>
        <a class="btn" href="vendor/pluseone.php">+ 1</a>
        <a class="btn" href="vendor/logout.php">Выйти</a>
        </form>
    </div>
</body>
</html>
