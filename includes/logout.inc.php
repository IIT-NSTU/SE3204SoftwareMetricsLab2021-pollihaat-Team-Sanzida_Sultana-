<?php
session_start();
unset($_SESSION['customer_name']);
unset($_SESSION['cus_password']);
unset($_SESSION['cus_id']);
unset($_SESSION['gmail']);

session_destroy();

header('location:../index.php');