<?php
session_start();
if($_SESSION['user']){
    header('location: profile.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Страница авторизации</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <form action="vendor/singin.php" method="POST">

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>

        <a class="btn" href="/registration.php">Регистрация</a>
    </form>
</body>
</html>
