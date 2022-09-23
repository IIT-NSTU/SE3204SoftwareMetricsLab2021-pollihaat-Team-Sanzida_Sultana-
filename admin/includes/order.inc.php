<?php
//include "../classes/Converter.class.php";
include "autoloader.inc.php";
session_start();
$user = new User();
$user->isOwner();
$order = new Order();
$function = new Validatefunction();
$user->isOwner();

if (isset($_POST['update']) && isset($_POST['update']) != '') {
    $received = $function->escape_string($_POST['accept']);

    $delivered = $function->escape_string(($_POST['deliver']));
    $oid = $function->escape_string($_POST['orderId']);

    $editData = ['isReceived' => $received,
        'isDelivered' => $delivered,
        'oId' => $oid,
    ];

    $order->editOrder($editData);

    if ($received == '1') {
        // echo "dfd";
        $v_code = bin2hex(random_bytes(8));
        $customerDetails = $order->getCustomerMailandName($oid);
        // print_r($customerDetails);

        $order->sendMail($customerDetails, $v_code, $oid);

    }
    if (isset($_SESSION['msg'])) {
        // echo "F";
        header('Location:../orderDetails.php');
        // $orderDetails->sendMail();
        exit();

    }

}
if (isset($_POST['delete']) && isset($_POST['delete']) != '') {

    $oid = $function->escape_string($_POST['orderId']);
    $order->deleteOrder($oid);
    if (isset($_SESSION['msg'])) {
        header("Location:../orderDetails.php");
        exit();

    }

}

if (isset($_POST['invoice']) && isset($_POST['invoice']) != '') {

    echo "invoice generated";
    //  exit();
    $oid = $function->escape_string($_POST['orderId']);

    //  $order->deleteOrder($oid);
    header("Location:../invoice.php?id=$oid");

}
