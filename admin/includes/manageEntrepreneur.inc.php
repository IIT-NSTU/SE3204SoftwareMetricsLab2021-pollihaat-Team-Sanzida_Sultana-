<?php
session_start();
include "autoloader.inc.php";
$user = new User();
$user->isOwner();
$function = new Validatefunction();
include "../classes/ManageEntrepreneur.class.php";
$function = new Validatefunction();
$entrepreneur = new Entrepreneur();
$view = new ViewPath();
if (isset($_POST['edit_entrepreneur'])) {
    $entrepreneur_prev_name = $function->escape_string($_POST['prev_name']);
    echo $entrepreneur_prev_name;
    // exit();
    $entrepreneur_name = $function->escape_string($_POST["entrepreneur_name"]);
    // $entrepreneur_id = $function->escape_string($_POST['id']);
    $entrepreneur_mobile = $function->escape_string($_POST['entrepreneur_mobile']);
    $entrepreneur_gmail = $function->escape_string($_POST['entrepreneur_gmail']);
    $entrepreneur_password = $function->escape_string($_POST['entrepreneur_password']);

    $entrepreneurDetails = [
        'name' => $entrepreneur_name,
        'gmail' => $entrepreneur_gmail,
        'mobile' => $entrepreneur_mobile,
        'password' => $entrepreneur_password,
    ];

    // $catValidation = new Validation($_FILES, $category_name);
    $entrepreneurCheck = new EntrepreneurDetailsCheck($entrepreneurDetails);
    $name = new UsernameCheck();
    $gmail = new GmailCheck();
    $mobile = new MobileCheck();

    $name->setNextHandler($gmail);
    $gmail->setNextHandler($mobile);
    $name->processDetails($entrepreneurCheck);

    if ($_SESSION['msg']) {

        header("Location:../manageEntrepreneur.php?edit&name=$entrepreneur_prev_name");
        exit();
    }

}

if (isset($_GET['delete']) && $_GET['name']) {
    $entrepreneur_name = $function->escape_string($_GET['name']);

    $entrepreneur = new Entrepreneur();
    $entrepreneur->EntrepreneurDelete($entrepreneur_name);

}

// $manageEntrepereneur = new ManageEntrepreneur();
// $manageEntrepereneur->NameDuplicate($entrepreneur_name);
// if (isset($_SESSION['msg'])) {

//     header("Location:../manageEntrepreneur.php?edit&name=$entrepreneur_prev_name");
//     exit();
// }

// $manageEntrepereneur->GmailDuplicate($entrepreneur_gmail);
// $manageEntrepereneur->mobileDuplicate($entrepreneur_mobile, $entrepreneur_prev_name);