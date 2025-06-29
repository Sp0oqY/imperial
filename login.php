<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require './Db.php';



Db::connect('localhost', 'imperial', 'root', '');
$chyba = '';
if (isset($_POST['login'])) {
    if ($_POST['username'] && $_POST['password']) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $user = Db::queryOne('
                    SELECT password, name, id
                    FROM users
                    WHERE `name`=?', $username);

        if (!$user || !password_verify($password, $user['password'])) {
            $chyba = 'Your e-mail or password is incorrect';
        } else {
            $_SESSION['id'] = $user['id'];
            header('Location: /imperial/admin.php');
            exit();
        }
    } else {
        $chyba = 'All fields must be filled out';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php require_once "./includes/header.php" ?>
    <div class="content">
        <div class="loginbox">
            <h1>Login Here</h1>
            <form action="./admin.php" method="POST">
                <span class="vypis"><?php echo ($chyba); ?></span>
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">

                <a href="#">Lost your password?</a> <br>
                <a href="SignUp.html">Don't you have an account?</a>

                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
    <?php require_once "./includes/footer.php" ?>
</body>

</html>