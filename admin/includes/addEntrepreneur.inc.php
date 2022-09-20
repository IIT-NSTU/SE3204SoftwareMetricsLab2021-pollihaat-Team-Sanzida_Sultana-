<?php
session_start();
include "autoloader.inc.php";

$user = new User();
$user->isOwner();
$function = new Validatefunction();

if (isset($_POST['submit'])) {

    $entrepreneur_name = $function->escape_string($_POST["name"]);
    $entrepreneur_gmail = $function->escape_string($_POST["gmail"]);
    $entrepreneur_mobile = $function->escape_string($_POST["mobile"]);
    $entrepreneur_password = $function->escape_string($_POST["password"]);

    // if (empty($entrepreneur_name)) {
    //     $_SESSION['msg'] = "Entrepreneur name required";
    //     header("Location:../entrepreneur.php");

    // }
    // if (empty($entrepreneur_name)) {
    //     $_SESSION['msg'] = "Entrepreneur name required";
    //     header("Location:../entrepreneur.php");

    // }
    // if (empty($entrepreneur_name)) {
    //     $_SESSION['msg'] = "Entrepreneur name required";
    //     header("Location:../entrepreneur.php");

    // }

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

    #  $categories->selectCat();

    #  print_r($_FILES);
    // $imageValidation = new proxyImage();

    // $imageValidation->imageSizeCheck($_FILES);
    // $imageValidation->imageFormatCheck($_FILES);

    // $imageValidation->invalid;

    // echo $imageValidation->invalid;
    // echo "</br>";
    // echo var_dump($imageValidation->invalid);
    // if (($imageValidation->invalid)) {
    //     echo $imageValidation->invalid;
    //     $categories->insertCat($category_name, $image);
    // }

    header("Location:../entrepreneur.php");

}