<?
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    require_once 'config.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $check_user = $mysql->query("SELECT id, login, year_of_birth, password, number FROM users WHERE login='$login' AND password='$password'");
    if (mysqli_num_rows($check_user) > 0) {
      $user = mysqli_fetch_assoc($check_user);
      $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "year_of_birth" => $user['year_of_birth'],
        "number" => $user['number']
      ];
        if($user['password'] === $password){
            setcookie("id", $user['id'], time()+900, "../");
            header('Location: ../profile.php');
        }
    } else {
      $_SESSION['message'] = 'Не верный логин или пароль';
      header('Location: ../index.php');
    }
