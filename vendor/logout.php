<?php

  session_start();
  setcookie("id", $user['id'], time() - 900);
  unset($_SESSION['user']);
  header('Location: ../');
?>
