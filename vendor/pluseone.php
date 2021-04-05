<?php
  session_start();
  require_once 'config.php';
  $number = $_SESSION['user']['number'];
  $user_login = $_SESSION['user']['login'];
  $plus_one = $mysql->query("UPDATE `users` SET `number` = `number` + 1 WHERE `login`='$user_login'");
  header("Location: ../profile.php");
