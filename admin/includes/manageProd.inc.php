<?php
session_start();
include "autoloader.inc.php";

$function = new Validatefunction();
$products = new Products();
$view = new ViewPath();
if (isset($_POST['edit'])) {
    //  echo "Dfd";
    $image = $_FILES['image']['name'];

    $id = $function->escape_string($_POST['id']);
    $product_name = $function->escape_string($_POST['product_name']);
    $product_quantity = $function->escape_string($_POST['product_quantity']);
    $product_price = $function->escape_string($_POST['product_price']);
    $product_description = $function->escape_string($_POST['description']);
    $product_type = $function->escape_string($_POST['product_type']);
    $entrepreneur = $_SESSION['user_name'];

    // $product_category = $function->escape_string($_POST['category']);
    $product_category = $function->escape_string($_POST['category']);

    //  echo $new_image;

    // $oldImage = $_GET['image'];
    // echo $image;

    //  echo $image;
    // if (empty($new_image)) {

    //     $_SESSION['msg'] = "অনুগ্রহ করে পণ্যের ছবি নির্বাচন করুন";
    //     header("Location:../product.php");
    //     exit();
    // }

    $id = $function->escape_string($_POST['id']);
    $newimage = rand(11111111, 99999999) . '-' . $image;

    //  $image = $_FILES['category_image']['name'];
    $fileType = $_FILES['image']['type'];

    $file_size = $_FILES['image']['size'];
    //   $file_tmp =$_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = explode('.', $_FILES['image']['name']);
    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext[1], $extensions) === true && $file_size < 9097152) {

        move_uploaded_file($_FILES['image']['tmp_name'], $view->getCategory_Image_server_path() . $newimage);
        // move_uploaded_file($_FILES['category_image']['tmp_name'], "category/" . $image);
        // echo $view->getCategory_Image_server_path() . $newimage;
        // echo "<br>";
        // echo $image;
        // echo "<br>";
        // echo $newimage;
        // exit();
        // exit();
    } else {
        $_SESSION['msg'] = "File Extension should be .jpeg,jpg,png or File Size less than 2MB.";
        header("Location:../manageProduct.php?edit&id=" . $id);
        exit();
    }

    $product_name = $function->escape_string($_POST["product_name"]);

    // $products->productDuplicate($product_name, $entrepreneur);
    if ($_SESSION['msg']) {
        header("Location:../manageProduct.php?edit&id=$id");
        exit();
    }

    // move_uploaded_file($_FILES['category_image']['tmp_name'], $view->getCategory_Image_server_path() . $image);
    $editData = [
        'id' => $id,
        'name' => $product_name,
        'productType' => $product_type,
        'image' => $newimage,
        'quantity' => $product_quantity,
        'desc' => $product_description,
        'price' => $product_price,
        'entrepreneur' => $entrepreneur,
        'category' => $product_category,
    ];

    $execute = new ManageProduct(new UpdateProduct($editData));
    $execute->executeAction();
    exit();
}

if (isset($_GET['delete']) && $_GET['id']) {

    $id = $function->escape_string($_GET["id"]);

    $execute = new ManageProduct(new DeleteProduct($id));
    $execute->executeAction();
    exit();

}