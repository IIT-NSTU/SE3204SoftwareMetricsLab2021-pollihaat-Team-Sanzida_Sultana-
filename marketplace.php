<?php
include "includes/header.php";
include "includes/autoloader.inc.php";
// include "classes/category.class.php";
include "admin/classes/categories.class.php";
include "admin/classes/products.class.php";
include "admin/classes/DbConnection.class.php";
include "classes/Converter.class.php";
include "admin/classes/Validatefunction.class.php";

?>


<!-- <section class="cateogry-marketplace">
    <div class="category-image">
        <div class="overlay">
            <h1>পল্লীহাট</h1>
            <p>আমার সংস্কৃতি, আমার অহংকার</p>
            <a href="#load_category" class="btn-shop">পণ্য দেখুন</a>
        </div>
    </div>
</section> -->

<section class="category-display">
    <h2>ক্যাটাগরিসমূহ</h2>
    <!-- <div class="all-category" style="display:flex;justify-content:center;align-items:center"> -->
    <?php
$cat = new Categories();
$arr = $cat->getCategories();
$convert = new Converter();
$function = new Validatefunction();
?>
    <div class="category-show">

        <?php
if (!empty($arr)) {

    foreach ($arr as $category_data) {

        ?>


        <div class="container-fluid">
            <a href="#">
                <div>

                    <img src="images/category/<?php echo $category_data['image'] ?>" style="max-width:100%;
    height:250px;" alt="Avatar" class="image" style="width:100%">
                    <div class="middle">
                        <a href="marketplace.php?name=<?php echo $category_data['name'] ?>">
                            <div class="text" style="text-decoration:none"><?php echo $category_data['name'] ?></div>
                        </a>
                    </div>
                    <div class="" style="margin-bottom:30px;"></div>
                </div>



        </div>


        <?php }}?>
        </a>
    </div>
    </a>

</section>
<!-- <section class="product-display" id="product">
    <h2>আমাদের পণ্য</h2>

</section> -->



<!-- category_product -->
<!-- <section class="sharee" id="loaded_cat">

    <div class="container" id="load_category">
        <h2> পণ্য</h2>
        <div class="row">
           -->



<?php
$cat = new Products();
$function = new Validatefunction();
if (isset($_GET['name']) && $_GET['name'] != '') {

    $category_name = $function->escape_string($_GET['name']);
    $cat = new Products();
    $arr = $cat->getProductByCategoryName($category_name);

    ?>

<!-- Kutir SHilpo -->


<?php
if (!empty($arr)) {?>
<section class="kutir-shilpo" id="shoukhin">

    <div class="container">
        <h2>পণ্য</h2>
        <div class="row"><?php
foreach ($arr as $product_data) {
        if ($product_data['quantity'] > 0) {
            $product_quantity = $convert::en2bn($product_data['quantity']);
            $product_price = $convert::en2bn($product_data['price']);

            ?>
            <div class="col-md-3 col-sm-6">

                <div class="product-grid" id="shoukhin">
                    <div class="product-image">
                        <a href="product.php?id=<?php echo $product_data['id'] ?>" class="image">
                            <img src="images/category/<?php echo $product_data['image'] ?>" width="300" height="300">
                        </a>
                        <span class="product-discount-label"
                            style="background-color:#b51e2ce8;font-weight:550;font-size:15px"><?php echo $product_price ?>৳
                        </span>
                        <ul class="product-links">
                            <!-- <li><a href="#"><i class="fa fa-search"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-random"></i></a></li> -->
                        </ul>
                        <form action="includes/cart.inc.php" method="post">
                            <input type="submit" class="add-to-cart" value="কার্টে যোগ করুন" name="cart-add"
                                style="background-color:#dd505dc2;font-weight:550;border-radius:8px">
                            <!-- <a href="includes/cart.inc.php?pid=<?php #echo $product_data['id'] ?>"
                                class="add-to-cart">কার্টে
                                যোগ করুন</a> -->

                    </div>


                    <div class="product-content">

                        <input type="hidden" name="product_id" value="<?php echo $product_data['id'] ?>">
                        <span style="font-size:16px;font-weight:550;">পরিমাণঃ</span> <input type="number" placeholder=""
                            value="1" min="1" max="<?php echo $product_data['quantity'] ?>" name="quantity" style="">
                        <input type="hidden" name="product_name" value="<?php #echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value=<?php #echo $product_data['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php #echo $fetch_products['image']; ?>">
                        <!-- <h3 class="title">/h3> -->
                        <h3 style="font-size:15px;font-weight:550"> <?php echo $product_data['name'] ?>
                            (<span><?php echo $product_quantity ?>
                                <?php echo $product_data['productType'] ?></span> ) </h3>


                        <p style="font-size:14px ;font-weight:550">
                            <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>


<?php include 'includes/footer.php '?>