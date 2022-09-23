<?php
include "includes/header.php";
include "admin/classes/products.class.php";
include "admin/classes/DbConnection.class.php";

include "classes/Converter.class.php";
include "admin/classes/categories.class.php";
include 'classes/add_cart.class.php';
include 'admin/classes/Validatefunction.class.php';
?>

<!-- pollihaat-image -->
<section class="pollihaat-image">
    <div class="backgound-image">
        <div class="overlay">
            <h1 style="font-size:28px;font-weight:600">পল্লীহাট</h1>
            <p style="font-weight:600 ;font-size:25px">"বাংলার পণ্য কিনুন,
বাঙালি সংস্কৃতির সাথেই থাকুন"</p>
        </div>
    </div>

</section>

<!-- <hr style="margin-top:20px ; margin-bottom:2px"> -->


<!-- best selling div hobe -->


<!--  product show -->

<section class="category-display">
    <h2>জনপ্রিয় ক্যাটাগরি</h2>
</section>

<section class="product " style="margin-top:5px">
    <div class="container">



        <div class="row" style="margin-top:60px">
            <!-- product box one -->
            <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4 ">
                <a href="#shajgoj">
                    <div class="product-box text-center position-relative">
                        <div class="product-inner">
                            <div class="product-image position-relative overflow-hidden">
                                <img src="assets/images/rebecca-grant-cqIygVsfrgM-unsplash.jpg " style="height:500px"
                                    alt="product" class="image-fluid">
                                <div class="product-overlay">

                                </div>
                                <div class="product-info">
                                    <div class="product-info-inner">

                                        <!-- <p class="product-title-1 font-weight-bold">Don't miss this chance</p> -->
                                        <button type="button " class="btn btn-outline-primary mt-4">
                                            শৌখিন সামগ্রী</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- product two -->
            <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4 d-flex flex-column justify-content-between">

                <a href="#choto">
                    <div class="product-box text-center position-relative mb-4 mb-sm-0">
                        <div class="product-inner">
                            <div class="product-image position-relative overflow-hidden">
                                <img src="assets/images/khelna.jpg " style="height:360px" alt="product"
                                    class="image-fluid">
                                <div class="product-overlay">

                                </div>
                                <div class="product-info">
                                    <div class="product-info-inner">

                                        <button type="button " class="btn btn-outline-primary mt-4">
                                            ছোটদের খেলনা সামগ্রী
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#grihoshojjaa">
                    <div class="product-box text-center position-relative">
                        <div class="product-inner">
                            <div class="product-image position-relative overflow-hidden">
                                <img src="assets/images/shokinshamogi.png " style="height:360px" alt="product"
                                    class="image-fluid">
                                <div class="product-overlay">

                                </div>
                                <div class="product-info">
                                    <div class="product-info-inner">

                                        <button type="button " class="btn btn-outline-primary mt-4">গৃহসজ্জা সরঞ্জাম
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <!--
                product three -->
            <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4">
                <a href="#mritshilpo">
                    <div class="product-box text-center position-relative">
                        <div class="product-inner">
                            <div class="product-image position-relative overflow-hidden">
                                <img src="assets/images/4.jpg" style="height:500px" alt="product" class="image-fluid">
                                <div class="offer-overlay">

                                </div>
                                <div class="product-info">
                                    <div class="product-info-inner">
                                        <!-- <p class="headline"> Sale 30%</p> -->
                                        <!-- <p class="product-title-1 font-weight-bold">Don't miss this chance</p> -->
                                        <button type="button " class="btn btn-outline-primary mt-4">মৃৎশিল্প


                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

</section>




<?php
$product = new Products();
$convert = new Converter();

?>




<?php if (isset($_COOKIE['recent'])) {
    //  setcookie('recent', null, -1, '/'); //to destroy cookie

    $arrRecentlyViewed = unserialize(($_COOKIE['recent']));
    $count = count($arrRecentlyViewed);
    //  echo $count;
    $countStart = $count - 8;
    if ($count > 8) {
        $arrRecentlyViewed = array_slice($arrRecentlyViewed, $countStart, 8);
        $arrRecentlyViewed = array_reverse($arrRecentlyViewed, true);
        //  print_r($arrRecentlyViewed);
    }

    $arrayImplode = implode(",", $arrRecentlyViewed);
    // var_dump($arrayImplode);
    // print_r($arrayImplode);

    // exit();
    $arr3 = $product->getProductByMultipleIds($arrayImplode);
    // echo "<pre>";
    // print_r($arr3);
    // echo "<pre>";
    //  echo "<pre>";

    // print_r($uniqueViewProduct);

    //  print_r($uniqueViewProduct);
    // $arrayImplode = implode(",", $uniqueViewProduct);

    // print_r($arrayImplode);

    // print_r(unserialize($_COOKIE['recent']));}

    ?>
<!-- !-- Kutir SHilpo --> -->
<section class="kutir-shilpo">

    <div class="container">
        <h2>প্রস্তাবিত পণ্য</h2>
        <div class="row" style="display:flex;flex-direction:row;flex-wrap:wrap;width:100%;justify-content:center" ;>

            <?php
if (!empty($arr3)) {
        foreach ($arr3 as $product_data) {
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
            <?php }}} else {

    }
}
?>

        </div>
    </div>
    </div>

</section>











<?php

$arr1 = $product->selectSpecificProduct(8, "latest");
$convert = new Converter();
?>



<!-- latest product -->
<section class="kutir-shilpo">

    <div class="container">
        <h2>নতুন পণ্য</h2>
        <div class="row">

            <?php
if (!empty($arr1)) {
    foreach ($arr1 as $product_data) {
        if ($product_data['quantity'] > 0) {
            $product_quantity = $convert::en2bn($product_data['quantity']);
            $product_price = $convert::en2bn($product_data['price']);

            ?>
            <div class="col-md-3 col-sm-6">

                <div class="product-grid" id="">
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
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>



















<!-- Kutir SHilpo -->
<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('হাতে তৈরি গহনা'));

// print_r($arr);
// exit();
?>

<!-- Kutir SHilpo -->
<section class="kutir-shilpo" id="">

    <div class="container">
        <h2>হাতে তৈরি গহনা</h2>
        <div class="row">

            <?php
if (!empty($arr)) {
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
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>



<!-- bangali voj -->

<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('বাঙালি ভোজ'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container">
        <h2>বাঙালি ভোজ</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>


<!-- SHaree -->

<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('শাড়ি সমগ্র'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container">
        <h2>শাড়ি সমগ্র</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>


<!-- শৌখিন সামগ্রী -->

<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('শৌখিন সামগ্রী'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container" id="shajgoj">
        <h2>শৌখিন সামগ্রী</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>






<!-- chotoder khelna -->

<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('ছোটদের খেলনা সামগ্রী'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container" id="choto">
        <h2>ছোটদের খেলনা সামগ্রী</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>



<!-- মৃৎশিল্প -->


<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('মৃৎশিল্প'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container" id="mritshilpo">
        <h2>মৃৎশিল্প  </h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>




<!-- বাঁশের তৈরি সামগ্রী -->


<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('বাঁশের তৈরি সামগ্রী'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container">
        <h2>বাঁশের তৈরি সামগ্রী</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>

<!-- 
বেতের তৈরি সামগ্রী -->


<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('বেতের তৈরি সামগ্রী '));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container">
        <h2>বেতের তৈরি সামগ্রী </h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>



<!-- 
গৃহসজ্জা সরঞ্জাম -->



<?php
$cat = new Products();
$function = new Validatefunction();

$arr = $cat->getProductByCategoryName($function->escape_string('গৃহসজ্জা সরঞ্জাম'));

$convert = new Converter();
// print_r($arr);
// exit();
?>


<section class="kutir-shilpo">

    <div class="container" id="grihoshojjaa">
        <h2>গৃহসজ্জা সরঞ্জাম</h2>
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


                        <p style="font-size:14px ;font-weight:550"> <?php echo $product_data['entrepreneurName'] ?></p>


                    </div>
                    </form>
                </div>
            </div>
            <?php }}} else {
    echo '<p class="কোন পণ্য নেই!</p>';
}

?>

        </div>
    </div>
    </div>

</section>


<!-- <div class="category" id="category">
    <h3 class="" style="text-align:center">ক্যাটাগরিসমূহ</h3>

</div>

<section class="show-categories">

    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12  ">
                <a href="#" style="text-decoration:none">
                    <div class="cat-1 m-1">
                        <div class="category-image">

                            <div class="overlay">
                                <h2>গৃহসজ্জা </h2>
                                <h2>সরঞ্জাম</h2>

                            </div>
                        </div>
                    </div>

                </a>

            </div>
            <div class="col-md-6 col-sm-12">
                <a href="#" style="text-decoration:none">
                    <div class="cat-2 m-1">
                        <div class="category-image">
                            <div class="overlay">
                                <h2>গৃহসজ্জা </h2>
                                <h2>সরঞ্জাম</h2>

                            </div>
                        </div>
                    </div>

                </a>

            </div>
            <div class="col-md-12 col-sm-12">
                <a href="#" style="text-decoration:none">
                    <div class="cat-3 m-1">
                        <div class="category-image">
                            <div class="overlay">
                                <h2>গৃহসজ্জা </h2>
                                <h2>সরঞ্জাম</h2>

                            </div>
                        </div>
                    </div>

                </a>

            </div>
            <div class="col-md-6 col-sm-12  ">
                <a href="#" style="text-decoration:none">
                    <div class="cat-4 m-1">
                        <div class="category-image">
                            <div class="overlay">
                                <h2>গৃহসজ্জা </h2>
                                <h2>সরঞ্জাম</h2>

                            </div>
                        </div>
                    </div>

                </a>

            </div>
            <div class="col-md-6 col-sm-12">
                <a href="#" style="text-decoration:none">
                    <div class="cat-5 m-1">
                        <div class="category-image">
                            <div class="overlay">
                                <h2>গৃহসজ্জা </h2>
                                <h2>সরঞ্জাম</h2>

                            </div>
                        </div>
                    </div>

                </a>

            </div>


        </div>
    </div>




</section> -->


<?php
include "includes/footer.php"
?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="assets/js/script.js"></script>
</body>

</html>