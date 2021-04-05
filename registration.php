<?php
    session_start();
    /*if($_SESSION['user']){
        header('Location: profile.php');
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Страница регистрации нового пользователя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <form action="vendor/singup.php" method="POST">
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>

        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин" >
        <label class="cy">Год рождения</label>

        <?php $yearArray = range(date('Y'), 1500); ?>
        <select name="year_of_birth">
            <option class="che" value="">Выберите год рождения</option>
            <?php
            foreach ($yearArray as $year) {
                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
            }
            ?>
        </select>

        <label for="">Пароль</label>
        <input type="password" minlength="3" maxlength="10" name="password" placeholder="Введите пароль">
        <label for="">Повторите пароль</label>
        <input type="password" minlength="3" maxlength="10" name="password_confirm" placeholder="Введите пароль">
        <button type="submit">Регистрация</button>
        <a class="btn" href="/index.php">Войти</a>
   </form>
</body>
</html>
