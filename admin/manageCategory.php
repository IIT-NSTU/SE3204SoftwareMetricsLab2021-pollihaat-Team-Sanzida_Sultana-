<?php
// if (!isset($_GET['edit'])) {
//     header('Location:admin_home.php');
// }
include "includes/header.php";
include "includes/autoloader.inc.php";

$user = new User();
$user->isOwner();
// @include 'config.php';

// $id = $_GET['edit'];

// if (isset($_POST['update_product'])) {

//     $product_name = $_POST['product_name'];
//     $product_price = $_POST['product_price'];
//     $product_image = $_FILES['product_image']['name'];
//     $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
//     $product_image_folder = 'uploaded_img/' . $product_image;

//     if (empty($product_name) || empty($product_price) || empty($product_image)) {
//         $message[] = 'please fill out all!';
//     } else {

//         $update_data = "UPDATE products SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
//         $upload = mysqli_query($conn, $update_data);

//         if ($upload) {
//             move_uploaded_file($product_image_tmp_name, $product_image_folder);
//             header('location:admin_page.php');
//         } else {
//             $$message[] = 'please fill out all!';
//         }

//     }
// }
// ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
// if (isset($message)) {
//     foreach ($message as $message) {
//         echo '<span class="message">' . $message . '</span>';
//     }
// }
?>

    <div class="container">


        <div class="admin-product-form-container centered">

            <?php
$categories = new Categories();
$function = new Validatefunction();
// $view = new ViewPath();

if (isset($_GET['edit']) && isset($_GET['name'])) {

    $category_name = $function->escape_string($_GET['name']);
    $result = $categories->CategoryEdit($category_name);
    if ($result) {
        ?>
            <form action="includes/manageCat.inc.php" method="post" enctype="multipart/form-data">
                <h3 style="font-weight:600" class="title">ক্যাটাগরি আপডেট করুন</h3>
                <!-- <input type="hidden" name="id" value="<?php echo $result['id']; ?> "> -->
                <!-- <input type="text" class="box" name="category_name" value="<?php #echo $result['name']; ?>"
                    placeholder="enter the product name">  -->
                <input type="hidden" name="catprevious_name" value="<?php echo $category_name ?>">
                <input type="text" placeholder="ক্যাটাগরির নাম লিখুন" value="<?php echo $_GET['name'] ?>"
                    name="category_name" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে ক্যাটাগরির নাম  লিখুন')"
                    oninput="setCustomValidity('')">

                <p><img id="output" width="100" img src="../images/category/<?php echo $result['image'] ?>" "></p>

<p><img id=" output" width="100"></p>
                <!-- <input type=" file" name="uploadfile" id="img" style="display:none;"> -->

                <input type="file" name="uploadfile" id="img" style="display:none;" <p><input type="file"
                    accept="image/*" name="category_image" id="file" onchange="loadFile(event)" style="display: none;">

                <p class="h4"><label for="file" style="cursor: pointer">
                        <i class="fa-sharp fa-solid fa-cloud-arrow-up h1" id="icon" style="display:block"></i>
                        ক্যাটাগরির ছবি নির্বাচন করুন</label></p>
                <!-- <input type="file" class="box" name="category_image"
                    value="../images/category/<?php # echo $result['image'] ?>" accept="image/png, image/jpeg, image/jpg"
                    required> -->
                <input type="submit" value="ক্যাটাগরি পরিবর্তন করুন" name="edit_cat" class="update-btn">
                <a href="category.php" class="back-btn">পিছনে ফিরে যান!</a>
            </form>

            <?php } else {

        return false;
    }}

// if (isset($_GET['delete']) && $_GET['name']) {
//     $execute = new Context(new DeleteCategory());
// }
?>










            <?php
;?>



        </div>

    </div>

</body>

</html><?php include "includes/footer.php"?>



<script>
var loadFile = function(event) {
    var picture = document.getElementById('output');
    picture.src = URL.createObjectURL(event.target.files[0]);

    var icon = document.getElementById("icon").style.display = "none";
};
</script>