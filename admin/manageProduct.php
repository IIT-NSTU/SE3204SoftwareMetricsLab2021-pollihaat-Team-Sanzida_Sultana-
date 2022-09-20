<?php
include "includes/header.php";
include "includes/autoloader.inc.php";

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
$products = new products();
$function = new Validatefunction();
$categories = new Categories();
$categories_data = $categories->getCategories();

if (isset($_GET['edit']) && isset($_GET['id'])) {

    $product_id = $function->escape_string($_GET['id']);
    $result = $products->productEdit($product_id);
    if ($result) {
        ?>
            <form action="includes/manageProd.inc.php" method="post" enctype="multipart/form-data">
                <h3 class="title">update the prduct</h3>
                <input type="hidden" name="id" value="<?php echo $result['id']; ?> ">

                <input type="text" id="category_name" value="<?php echo $result['name']; ?>"
                    placeholder="পণ্যের নাম লিখুন" name="product_name" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের নাম লিখুন')" oninput="setCustomValidity('')">



                <select class="form-control select1" style="  margin-top: 13px;
  font-size: 16px;
  margin-bottom: 20px;height:50px" id="" name="product_type" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের ধরণ বাছাই করুন ')"
                    oninput="setCustomValidity('')">
                    <!-- <select name="category" id=""> -->
                    <option value="<?php echo $result['productType'] ?> " selected>পণ্যের ধরণ বাছাই করুন</option>

                    </option>
                    <option value="কে. জি">কে. জি.</option>
                    <option value="টি">টি</option>



                </select>

                <?php $prod = $products->getProductCat($product_id); // categroy name retrieve for a specific product  to be selected in dropdown

        ?>
                <select class="form-control select2" style="  margin-top: 10px;
  font-size: 16px;
  margin-bottom: 15px; height:50px" id="" name="category" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের ক্যাটাগরি বাছাই করুন')"
                    oninput="setCustomValidity('')">
                    <!-- <select name="category" id=""> -->
                    <option value="<?php echo $result['category'] ?>">ক্যাটাগরি বাছাই করুন</option>
                    <!-- <option class="h3">
                    <p class="h3" style="font-size:30px"></p>
                </option> -->

                    <?php
foreach ($categories_data as $data) {?>
                    <option class="h4" value=" <?php echo $data["name"]; ?>">


                        <?php if ($data['name'] == $prod) {?>
                    <option value="<?php echo $prod ?>" selected> <?php echo $prod ?> </option>

                    <?php } else {?>
                    <option value="<?php echo $data['name']; ?> "><?php echo $data['name']; ?> <?php #echo $prod ?>
                    </option>

                    <?php }
            ?>


                    </option>

                    <?php }?>


                </select>

                <input type="hidden" name="image" value="<?php echo $result['image'] ?>">
                <input type="number" placeholder="পণ্যের মূল্য লিখুন" value="<?php echo $result['price']; ?>"
                    name="product_price" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের মূল্য লিখুন')"
                    oninput="setCustomValidity('')">

                <input type="number" placeholder="পণ্যের পরিমাণ উল্লেখ করুন" value="<?php echo $result['quantity']; ?>"
                    name="product_quantity" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের পরিমাণ উল্লেখ করুন')"
                    oninput="setCustomValidity('')">

                <textarea id="txtArea" rows="3" cols="44" style=" font-size:18px; max-width:100%" name='description'
                    placeholder=" পণ্য সম্পর্কে বিস্তারিত কিছু লিখুন"> <?php echo trim($result['description']); ?>
                </textarea>
                <!-- <p><img id="output" width="100" img src="../images/category/<?php #echo $result['image'] ?>"></p> -->

                <p><img id="output" width="100" /></p>
                <!-- <input type="file" name="uploadfile" id="img" style="display:none;"> -->

                <input type="file" name="uploadfile" id="img" style="display:none;" <p><input type="file"
                    accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">

                <p class="h4"><label for="file" style="cursor: pointer">
                        <i class="fa-sharp fa-solid fa-cloud-arrow-up h1" id="icon" style="display:block"></i>
                        পণ্যের ছবি নির্বাচন করুন</label></p>

                <input type="submit" value="পরিবর্তন করুন" name="edit" class="update-btn">
                <a href="category.php " class="back-btn">পিছনে ফিরে যান</a>


            </form>

            <?php } else {

        return false;
    }}

?>

            <?php include "includes/footer.php"?>



            <script>
            var loadFile = function(event) {
                var picture = document.getElementById('output');
                picture.src = URL.createObjectURL(event.target.files[0]);

                var icon = document.getElementById("icon").style.display = "none";
            };
            </script>