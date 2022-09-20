<?php
//start session
include "autoloader.inc.php";

session_start();
$function = new Validatefunction();

$user = new User();

if (isset($_POST['login'])) {

    $email = $function->escape_string($_POST['email']);
    $password = $function->escape_string($_POST['password']);
    $auth = $user->check_login($email, $password);

    if (!$auth) {
        $_SESSION['message'] = 'ভুল ইমেইল অথবা পাসওয়ার্ড দিয়েছেন';
        header('location:../login.php');
    } else {
        $_SESSION['user'] = $auth;
        //    $_SESSION['customer_name'] = $username;

        $_SESSION['cus_password'] = $password;
        echo $_SESSION['customer_name'];
        echo $_SESSION['cus_id'];

        // $_SESSION['gmail']=$
        // $_SESSION['role'] = $role;

        // exit();
        header('location:../index.php');
    }
} else {
    $_SESSION['message'] = 'আপনাকে প্রথমে লগ ইন করতে হবে';
    header('location:../login.php');
}