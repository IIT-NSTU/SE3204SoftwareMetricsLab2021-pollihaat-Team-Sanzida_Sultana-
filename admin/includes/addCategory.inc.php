<?php
session_start();
include "autoloader.inc.php";

$user = new User();
$user->isOwner();
$categories = new Categories();
$function = new Validatefunction();
$view = new ViewPath();
//$dbCon = new DbConnection();
// $image = new proxyImage();

if (isset($_POST['submit'])) {

    $image = rand(11111111, 99999999) . '-' . $_FILES['category_image']['name'];
    $fileType = $_FILES['category_image']['type'];
    $file_size = $_FILES['category_image']['size'];
    $category_name = $function->escape_string($_POST['category_name']);
    $file_type = $_FILES['category_image']['type'];
    $file_ext = explode('.', $_FILES['category_image']['name']);
    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext[1], $extensions) === true && $file_size < 9097152) {

        move_uploaded_file($_FILES['category_image']['tmp_name'], $view->getCategory_Image_server_path() . $image);
        // move_uploaded_file($_FILES['category_image']['tmp_name'], "category/" . $image);

    } else {
        $_SESSION['msg'] = "ফাইল এক্সটেনশন অবশ্যই jpg,png,jpeg হতে হবে";
        header("Location:../category.php");
        exit();
    }
    // $category_name = $dbCon->escape_string($_POST["category_name"]);

    $categories->categoryDuplicate($category_name);
    if ($_SESSION['msg']) {
        header("Location:../category.php");
        exit();
    }
    $categories->insertCat($category_name, $image);
    header("Location:../category.php");
    exit();

}
// $catValidation = new Validation($_FILES, $category_name);
// $catValidation = new Validation($image, $_FILES['category_image']['type'], $_FILES['category_image']['size'], $category_name);
// $png = new PNGCheck();
// $jpg = new JPGCheck();
// $jpeg = new JPEGCheck();

// $png->setNextHandler($png);
// $jpg->setNextHandler($jpg);

// $png->processImage($catValidation);
// $categories->selectCat();

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

// header("Location:../category.php");