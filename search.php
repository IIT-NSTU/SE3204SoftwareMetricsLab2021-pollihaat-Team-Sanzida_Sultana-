<?php

include "includes/header.php";
include "includes/autoloader.inc.php";
include "admin/classes/products.class.php";
include "admin/classes/Validatefunction.class.php";

$product = new Products();
$function = new Validatefunction();
$convert = new Converter();
$arr = $product->selectSpecificProduct(12, "latest");

?><section class="cateogry-marketplace">
    <div class="category-image">
        <div class="overlay">


            <a href="#search" class="btn-shop">পণ্য অনুসন্ধান করুন</a>
        </div>
    </div>
</section>


<div class="container " id="search">
    <section class="searchform">
        <form action="" method="post" style="display:flex;flex-direction:row">
            <input type="text" name="searchName" placeholder="পণ্য অনুসন্ধান করুন...." class="box">
            <input class="search-btn"
                style="background:#554308;margin-left:20px;margin-bottom:15px;padding:.8rem .6rem;border-radius:2px;color:#fff;font-weight:550;font-size:16px"
                type="submit" value="অনুসন্ধান  করুন" name="search">
        </form>
    </section>

</div>
<?php
if (isset($_POST['search']) && isset($_POST['search']) != '') {
    $name = $function->escape_string($_POST['searchName']);
    //  echo $name;

    $product = new Products();
    $function = new Validatefunction();
    $product = new Products();
    $arr = $product->searchProduct($name);
    if (empty($arr)) {

        $arr = $product->selectSpecificProduct(8, "latest");
    }

}

?>





<section class="kutir-shilpo">

    <div class="container">
        <h2>পণ্যসমূহ</h2>
        <div class="row">

            <?php
if (!empty($arr)) {
    foreach ($arr as $product_data) {
        if ($product_data['quantity'] > 0) {

            $product_quantity = $convert::en2bn($product_data['quantity']);
            $product_price = $convert::en2bn($product_data['price']);

            ?>
            <div class="col-md-3 col-sm-6">

                <div class="product-grid">
                    <div class="product-image">
                        <a href="product.php?id=<?php echo $product_data['id'] ?>" class="image">
                            <img src="images/category/<?php echo $product_data['image'] ?>" width="300" height="300">
                        </a>
                        <span class="product-discount-label"
                            style="background-color:#7c6414;font-weight:550;font-size:15px"><?php echo $product_price ?>৳
                        </span>
                        <ul class="product-links">
                            <!-- <li><a href="#"><i class="fa fa-search"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-random"></i></a></li> -->
                        </ul>
                        <form action="includes/cart.inc.php" method="post">
                            <input type="submit" class="add-to-cart" value="কার্টে যোগ করুন" name="cart-add"
                                style="background-color:#836c27;font-weight:550;border-radius:8px">
                            <!-- <a href="includes/cart.inc.php?pid=<?php #echo $product_data['id'] ?>"
                                class="add-to-cart">কার্টে
                                যোগ করুন</a> -->

                    </div>


                    <div class="product-content">

                        <input type="hidden" name="product_id" value="<?php echo $product_data['id'] ?>">
                        <span style="font-size:16px;font-weight:550">পরিমাণঃ</span> <input type="number" placeholder=""
                            value="1" min="1" max="<?php echo $product_data['quantity'] ?>" name="quantity"
                            style="height:30px;font-size:20px;text-align:center;width:130px;background-color:#e3e0d9eb">
                        <input type="hidden" name="product_name" value="<?php #echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value=<?php #echo $product_data['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php #echo $fetch_products['image']; ?>">
                        <!-- <h3 class="title">/h3> -->
                        <h3 style="font-size:15px;font-weight:550"> <?php echo $product_data['name'] ?>
                            (<span><?php echo $product_quantity ?>
                                <?php echo $product_data['productType'] ?></span> ) </h3>


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {}?>
        </div>
    </div>

</section>



<?php
include "includes/footer.php"
?>