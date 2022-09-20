<?php
session_start();
include "autoloader.inc.php";

$function = new Validatefunction();

$product = new Products();
$function->isOwner();
$view = new ViewPath();
//$dbCon = new DbConnection();
// $image = new proxyImage();

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['size'];
    //  echo $image;
    if (empty($image)) {

        $_SESSION['msg'] = "অনুগ্রহ করে পণ্যের ছবি নির্বাচন করুন";
        header("Location:../product.php");

    }

    $product_image = rand(11111111, 99999999) . '-' . $_FILES['image']['name'];

    $fileType = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    $entrepreneur_name = $_SESSION['user_name'];

    //  $product = $function->escape_string($_POST['product_name']);
    $product_name = $function->escape_string($_POST['product_name']);
    var_dump($product_name);

    $product_type = $function->escape_string($_POST['product_type']);
    $product_category = $function->escape_string($_POST['category']);

    // $product->productDuplicate($product_name, $entrepreneur_name);
    if (isset($_SESSION['msg'])) {
        header("Location:../product.php");
        exit();
    }
    //  echo $_SESSION['msg'];
    // exit();
    $file_type = $_FILES['image']['type'];
    $file_ext = explode('.', $_FILES['image']['name']);
    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext[1], $extensions) === true && $file_size < 9097152) {

        move_uploaded_file($_FILES['image']['tmp_name'], $view->getCategory_Image_server_path() . $product_image);
        echo $view->getCategory_Image_server_path() . $product_image;

        // move_uploaded_file($_FILES['category_image']['tmp_name'], "category/" . $image);

    } else {
        $_SESSION['msg'] = "ফাইল এর এক্সটেনশন অবশ্যই jpg,jpeg,png হতে হবে";
        header("Location:../product.php");
        exit();
    }
    $product_description = $function->escape_string($_POST['description']);

    $product_price = $function->escape_string($_POST['product_price']);
    $product_quantity = $function->escape_string($_POST['product_quantity']);
    // $product_category = $function->escape_string($_POST['category']);

    $productData = [

        'name' => $product_name,

        'image' => $product_image,
        'quantity' => $product_quantity,
        'desc' => $product_description,
        'price' => $product_price,
        'entrepreneur' => $entrepreneur_name,
        'category' => $product_category,
        'productType' => $product_type,
        // 'desc'=>
        // 'image' => $image,
    ];
    $product->insertProduct($productData);

    // $category_name = $dbCon->escape_string($_POST["category_name"]);
    if ($_SESSION['msg']) {
        header("Location:../product.php");
        exit();
    }
    //  $categories->insertCat($category_name, $image);
    // header("Location:../category.php");
    exit();

}