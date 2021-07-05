<?
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    require_once 'config.php';
    $form_login = $_POST['login'];
    $form_password = $_POST['password'];

    $query = $mysql->prepare("SELECT id, login, year_of_birth, password, number FROM users WHERE login=? AND password=?");
    $query->bind_param($form_login, $form_password);
    $query->execute();
    $query->bind_result($id, $login, $year_of_birth, $password, $number);
    $query->fetch();

    if ($id > 0) {
      $_SESSION['user'] = [
        "id" => $id,
        "login" => $login,
        "year_of_birth" => $year_of_birth,
        "number" => $number
      ];
        if($password === $form_password{
            setcookie("id", $id, time()+900, "../");
            header('Location: ../profile.php');
        }
    } else {
      $_SESSION['message'] = 'Не верный логин или пароль';
      header('Location: ../index.php');
    }
