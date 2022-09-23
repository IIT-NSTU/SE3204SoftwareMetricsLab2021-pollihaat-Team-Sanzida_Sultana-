<?php
session_start();
include "autoloader.inc.php";
$user = new User();
$user->isOwner();

include "../classes/ManageCategory.class.php";
$function = new Validatefunction();
$categories = new Categories();
$view = new ViewPath();
if (isset($_POST['edit_cat'])) {
    $pre_Category_name = $function->escape_string($_POST['catprevious_name']);
    $image = rand(11111111, 99999999) . '-' . $_FILES['category_image']['name'];
    //  $image = $_FILES['category_image']['name'];
    $fileType = $_FILES['category_image']['type'];
    $file_size = $_FILES['category_image']['size'];

    //   $file_tmp =$_FILES['image']['tmp_name'];
    $file_type = $_FILES['category_image']['type'];
    $file_ext = explode('.', $_FILES['category_image']['name']);
    $extensions = array("jpeg", "jpg", "png");
    $category_name = $_POST["category_name"];

    if (in_array($file_ext[1], $extensions) === true && $file_size < 9097152) {

        move_uploaded_file($_FILES['category_image']['tmp_name'], $view->getCategory_Image_server_path() . $image);
        // move_uploaded_file($_FILES['category_image']['tmp_name'], "category/" . $image);

    } else {
        $_SESSION['msg'] = "jpg,png,jpeg ফরমেট এর ছবি নির্বাচন করুন";
        header("Location:../manageCategory.php?edit&name=$pre_Category_name");
        exit();
    }

    // echo $category_name;
    $newcategory_name = $function->escape_string($_POST['category_name']);
    $pre_Category_name = $function->escape_string($_POST['catprevious_name']);
    // echo $newcategory_name;
    // echo $pre_Category_name;
    // exit();

    $categories->categoryDuplicateEdit($newcategory_name);
    if ($_SESSION['msg']) {
        //    echo "de";

        header("Location:../manageCategory.php?edit&name=$pre_Category_name");
        exit();
    }
    // move_uploaded_file($_FILES['category_image']['tmp_name'], $view->getCategory_Image_server_path() . $image);
    $editData = [
        'previous' => $pre_Category_name,
        'name' => $newcategory_name,
        'image' => $image,
    ];

    $execute = new ManageCategory(new UpdateCategory($editData));
    $execute->executeAction();
    exit();
}

if (isset($_GET['delete']) && $_GET['name']) {

    $category_name = $function->escape_string($_GET["name"]);
    //echo $category_id;
    $execute = new ManageCategory(new DeleteCategory($category_name));
    $execute->executeAction();
    exit();

}
