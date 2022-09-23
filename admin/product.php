<?php
include "includes/header.php";

include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";

?>

<?php

$categories = new Categories();
$product = new Products();
$categories_data = $categories->getCategories();
$converter = new Converter();

?>

<div class="category_container">

    <?php

if ($_SESSION['role'] == 1) {

    ?>
    <div class="admin-category-form-container">

        <form action="includes/addProduct.inc.php" method="post" enctype="multipart/form-data">
            <?php #echo $_SERVER['PHP_SELF'] ?>

            <h3 style="font-weight:600">পণ্য যোগ করুন</h3>
            <input type="text" id="category_name" placeholder="পণ্যের নাম লিখুন" name="product_name" class="box"
                required="" oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের নাম লিখুন')"
                oninput="setCustomValidity('')">

            <select class="form-control select1" style="  margin-top: 13px;
  font-size: 16px;
  margin-bottom: 20px;height:50px" id="" name="product_type" required=""
                oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের ধরণ বাছাই করুন ')"
                oninput="setCustomValidity('')">
                <!-- <select name="category" id=""> -->
                <option value="">পণ্যের ধরণ বাছাই করুন</option>
                <option value="কে. জি">কে. জি.</option>
                <option value="টি">টি</option>



            </select>




            <!-- <div class="form-group"> -->
            <!-- <label for="exampleFormControlSelect1">Categories</label> -->
            <select class="form-control select2" style="  margin-top: 10px;
  font-size: 16px;
  margin-bottom: 15px; height:50px" id="" name="category" required=""
                oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের ক্যাটাগরি বাছাই করুন')"
                oninput="setCustomValidity('')">
                <!-- <select name="category" id=""> -->
                <option value="">ক্যাটাগরি বাছাই করুন</option>
                <!-- <option class="h3">
                    <p class="h3" style="font-size:30px"></p>
                </option> -->
                <?php
foreach ($categories_data as $data) {?>
                <option class="h4" value="<?php echo $data["name"]; ?>">



                    <?php echo $data["name"];
        ?>

                </option>

                <?php }?>


            </select>
            <!-- </div> -->
            <input type="number" placeholder="পণ্যের একক মূল্য লিখুন" min="1" name="product_price" class="box" min="1"
                required="" oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের মূল্য লিখুন')"
                oninput="setCustomValidity('')">

            <input type="number" min="1" style="margin-bottom:24px" placeholder="পণ্যের পরিমাণ উল্লেখ করুন"
                name="product_quantity" class="box" required=""
                oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের পরিমাণ উল্লেখ করুন')"
                oninput="setCustomValidity('')">
            <!-- <input type="file" name="uploadfile" id="img" style="display:none;" required=""
                oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের নাম লিখুন')" oninput="setCustomValidity('')"
                <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                style="display: none;"> -->
            <!-- </p> -->
            <!-- <input type="textArea" rows="6" cols="44" style="background: rgba(0,0,0,.5);"> -->
            <textarea id="txtArea" rows="6" cols="48" style=" font-size:18px; max-width:100%" name='description'
                placeholder=" পণ্য সম্পর্কে বিস্তারিত কিছু লিখুন"></textarea>

            <p><img id="output" width="100" /></p>
            <!-- <input type="file" name="uploadfile" id="img" style="display:none;"> -->

            <input type="file" name="uploadfile" id="img" style="display:none;" <p><input type="file" accept="image/*"
                name="image" id="file" onchange="loadFile(event)" style="display: none;">

            <p class="h4"><label for="file" style="cursor: pointer">
                    <i class="fa-sharp fa-solid fa-cloud-arrow-up h1" id="icon" style="display:block"></i>
                    পণ্যের ছবি নির্বাচন করুন</label></p>

            <input type="submit" class="category-btn" name="submit" value="পণ্য যোগ করুন"
                style="font-weight:600;font-size:20px">
        </form>

    </div>
    <?php }?>

    <?php
if ($_SESSION['role'] == 0) {?>
    <section class="eProduct-display" id="product">
        <h2 style="margin-top:15px" ;>উদ্দ্যোক্তাদের পণ্যসমূহ</h2>

    </section>

    <?php }?>

    <?php
if ($_SESSION['role'] == 1) {?>
    <section class="eProduct-display" id="product">
        <h2>আপনার পণ্যসমূহ</h2>

    </section>
    <?php }?>


    <div class="category-display">
        <table class="category-display-table">
            <thead>
                <tr>
                    <th>পণ্যের ছবি</th>
                    <!-- <th>id</th> -->
                    <th>পণ্যের নাম </th>
                    <th>ক্যাটাগরি</th>
                    <th>পরিমাণ</th>
                    <th>একক মূল্য</th>
                    <!-- <th>description</th> -->
                    <?php
if ($_SESSION['role'] == 0) {?>
                    <th>উদ্দ্যোক্তার নাম</th>
                    <?php }?>


                    <th>কার্যক্রম</th>
                </tr>
            </thead>
            <?php
$product = new Products();
//$connection = new DbConnection();
$view = new ViewPath();

$arr = $product->selectProduct();
$eArr = $product->selectEntrepreneurProduct($_SESSION['user_name']);

if ($_SESSION['role'] == 0) {
    if (!empty($arr)) {
        foreach ($arr as $product_data) {
            $quantity = $converter::en2bn($product_data['quantity']);
            $price = $converter::en2bn($product_data['price']);
            ?>
            <tr>


                <td>
                    <?php
?>

                    <img src="../images/category/<?php echo $product_data['image'] ?>" height="100" width="100"
                        alt="image">

                </td>
                <td style="font-weight:550"><?php echo $product_data['name']; ?></td>
                <td style="font-weight:550"><?php echo $product_data['category']; ?></td>
                <td style="font-weight:550"><?php echo $quantity; ?></td>
                <td style="font-weight:550"><?php echo $price; ?></td>

                <td style="font-weight:550"><?php echo $product_data['entrepreneurName']; ?></td>

                <td>
                    <a href="manageProduct.php?edit&id=<?php echo $product_data['id']; ?>" class="btn">
                        <i class="fas fa-edit"></i>
                        পরিবর্তন </a>
                    <a href="includes/manageProd.inc.php?delete&id=<?php echo $product_data['id']; ?>" class="btn">
                        <i class="fas fa-trash"></i>
                        মুছুন </a>
                </td>
                <?php }} else {'';}?>

            </tr>

            <?php }?>

            <?php
if ($_SESSION['role'] == 1) {
    if (!empty($eArr)) {

        foreach ($eArr as $product_data) {
            $quantity = $converter::en2bn($product_data['quantity']);
            $price = $converter::en2bn($product_data['price']);
            ?>
            <tr>


                <td>
                    <?php
?>

                    <img src="../images/category/<?php echo $product_data['image'] ?>" height="100" width="100"
                        alt="image">

                </td>
                <td><?php echo $product_data['name']; ?></td>
                <td><?php echo $product_data['category']; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $price; ?></td>
                <!-- <td><?php #echo $product_data['description']; ?></td> -->
                <?php if ($_SESSION['role'] == 0) {

                ?>

                <td><?php echo $product_data['entrepreneurName']; ?></td>
                <?php }?>
                <td>
                    <a href="manageProduct.php?edit&id=<?php echo $product_data['id']; ?>" class="btn">
                        <i class="fas fa-edit"></i>
                        পরিবর্তন </a>
                    <a href="includes/manageProd.inc.php?delete&id=<?php echo $product_data['id']; ?>" class="btn"
                        onclick="return confirm('পণ্যটি কী মুছে ফেলতে চান?');">
                        <i class="fas fa-trash"></i>
                        মুছুন </a>
                </td>
                <?php }} else {'';}?>

            </tr>

            <?php }?>






        </table>

    </div>

</div>

<?php include "includes/footer.php"?>



<script>
var loadFile = function(event) {
    var picture = document.getElementById('output');
    picture.src = URL.createObjectURL(event.target.files[0]);

    var icon = document.getElementById("icon").style.display = "none";
};
</script>