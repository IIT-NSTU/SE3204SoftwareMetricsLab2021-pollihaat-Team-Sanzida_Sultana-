<?php
session_start();
include "autoloader.inc.php";
include "../admin/classes/Contact.class.php";
$function = new Validatefunction();
$contact = new Contact();
date_default_timezone_set('Asia/Dhaka');
$placed_on = date('Y-m-d H:i:s');
if (isset($_POST['send']) && $_POST['send'] != '') {
    $name = $function->escape_string(($_POST['name']));
    $emailId = $function->escape_string(($_POST['email']));
    $mobile = $function->escape_string(($_POST['number']));
    $comment = $function->escape_string($_POST['message']);

    $contactData =
        [
        'name' => $name,
        'email' => $emailId,
        'mobile' => $mobile,
        'comment' => $comment,
        'date' => $placed_on,

    ];

    $contact->insertContact($contactData);

    if (isset($_SESSION['msg'])) {

        header('Location:../contact.php');
        exit();
    }
}