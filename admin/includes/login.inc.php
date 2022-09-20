<?php
//start session
include "autoloader.inc.php";
session_start();
$function = new Validatefunction();
include_once '../classes/user.class.php';
include_once '../../classes/Converter.class.php';
$converter = new Converter();
$user = new User();

if (isset($_POST['login'])) {
    $username = $function->escape_string($_POST['username']);

    $password = $function->escape_string($_POST['password']);
    $pass = $converter->bn2en($password);

    $auth = $user->check_login($username, $pass);

    if (!$auth) {
        $_SESSION['message'] = 'Invalid username or password';
        header('location:../login.php');
    } else {
        $_SESSION['user'] = $auth;
        $_SESSION['user_name'] = $username;

        echo $_SESSION['user_name'];

        $_SESSION['password'] = $password;
        //    $_SESSION['role'] = $role;
        echo $_SESSION['role'];

        header('location:../admin_home.php');
    }
} else {
    $_SESSION['message'] = 'You need to login first';
    header('location:../login.php');
}