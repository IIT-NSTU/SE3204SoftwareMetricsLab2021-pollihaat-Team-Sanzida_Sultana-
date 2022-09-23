<?php

session_start();
include "../../classes/review.class.php";
include "autoloader.inc.php";
include "../classes/Validatefunction.class.php";
$user = new User();
$user->isOwner();

$function = new Validatefunction();

if (isset($_GET['id']) && isset($_GET['id']) != '') {
    echo $_GET['id'];
    $id = $function->escape_string($_GET['id']);
    // exit();
    $rev = new Review();
    $rev->deleteReview($id);
    if (isset($_SESSION['msg'])) {

        header('Location:../review.php');

        exit();

    }

}