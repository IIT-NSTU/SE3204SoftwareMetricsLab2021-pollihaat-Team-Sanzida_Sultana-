<?php
session_start();
include "autoloader.inc.php";
$function = new Validatefunction();

// include "../classes/ManageCategory.class.php";
if (isset($_GET['delete']) && $_GET['id']) {

    $contact_id = $function->escape_string($_GET["id"]);

    $execute = new Contact();
    $execute->deleteContact($contact_id);
    exit();

}