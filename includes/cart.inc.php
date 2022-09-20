<?php
session_start();
include "autoloader.inc.php";
include "../classes/add_cart.class.php";
include "../admin/classes/products.class.php";
include "../classes/Converter.class.php";

$function = new Validatefunction();
$product = new Products();
$cart = new Add_cart();
$converter = new Converter();

// echo $_SESSION['cus_id'];
// exit();

if (!isset($_SESSION['cus_id'])) {
    header('location:../login.php');
    exit();

}

if (isset($_POST['update-cart']) && $_POST['cart-nb'] != '') {
    $cartId = $function->escape_string($_POST['cart-nb']);
    $quantity = $function->escape_string($_POST['quantity']);

    $cart->updateCart($cartId, $quantity);

    if (isset($_SESSION['msg'])) {
        header('location:../cart.php');
        exit();

    }

}
if (isset($_GET['delete']) && isset($_GET['id']) && isset($_GET['id']) != '') {
    $cartId = $function->escape_string($_GET['id']);

    $cart->deleteCart($cartId);

    if (isset($_SESSION['msg'])) {
        header('location:../cart.php');
        exit();

    }

}

if (isset($_GET['delete_all']) && isset($_GET['customer_id']) && isset($_GET['customer_id']) != '') {
    $customer_id = $function->escape_string($_GET['customer_id']);

    $cart->deleteAllFromCart($customer_id);

    if (isset($_SESSION['msg'])) {
        header('location:../cart.php');
        exit();

    }

}

// if (isset($_GET['pid']) && $_GET['pid'] != '') {

//     $pid = $function->escape_string($_GET['pid']);

// }
if (isset($_POST['cart-add']) && $_POST['cart-add'] != '') {
    $pid = $function->escape_string($_POST['product_id']);
    $product_quantity = $function->escape_string($_POST['quantity']);
    echo $pid;
    echo $product_quantity;

    $customer_id = $_SESSION['cus_id'];
    $cart->checkDuplicate($pid, $customer_id);

    if (isset($_SESSION['msg'])) {
        header('location:../index.php');
        exit();

    }

    $cartData = [
        'cusId' => $customer_id,
        'pid' => $pid,
        'qty' => $product_quantity,

    ];

    $cart->insertCart($cartData);

    if (isset($_SESSION['msg'])) {
        header('location:../index.php');

    }
}