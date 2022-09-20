<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $product_id = $_GET['id'];
    //unset($_COOKIE['recent']);
    if (isset($_COOKIE['recent'])) {
        // setcookie('recent', null, -1, '/'); //to destroy cookie
        // exit(); //to destroy cookie
        // echo "d";
        $arrRecent = unserialize($_COOKIE['recent']); //to insert data into array from cookie need unserialize(human readable format) it

        if (($key = array_search($product_id, $arrRecent)) !== false) {

            unset($arrRecent[$key]);

        }

        $arrRecent[] = $product_id;
        setcookie('recent', serialize($arrRecent), time() + 60 * 60 * 24 * 365, "/");

        //  header("Location:product.php?id=$product_id");

        // print_r(unserialize($_COOKIE['recent']));

    } else { //to insert data into cookie first need to serialize(memory readable format) it
        // setcookie('recent', null, -1, '/'); //to destroy cookie
        // exit(); //to destroy cookie

        //   echo $product_id;
        // setcookie('recent', null, -1, '/'); //to destroy cookie
        // exit(); //to destroy cookie
        // echo "d";
        $arrRecent[] = $product_id;
        //   echo "Fdf";
        //  print_r($arrRecent);
        $cookie_name = "recent";
        //   $cookie_value = "Alex Porter";
        // $name = 'recently_viewed';
        //   print_r($arrRecent);

        // setcookie($name, serialize($arrRecent), time() + (86400 * 30), "/");
        // print_r($_COOKIE[$name]);

        // $cookie_name = "recent";
        setcookie('recent', serialize($arrRecent), time() + 60 * 60 * 24 * 365, "/");
        // header('Location:product.php?id=' . $product_id);
        header("Location:product.php?id=$product_id");

        // $cookie_value = "";
        // setcookie($cookie_name, serialize($arrRecent), time() + (86400 * 30), "/");
        //  print_r(unserialize($_COOKIE['recent']));
        print_r(unserialize($_COOKIE[$cookie_name]));

    }

}

?>


<?php include "includes/header.php";
include "admin/classes/products.class.php";
include "includes/autoloader.inc.php";
include "admin/classes/DbConnection.class.php";
include "admin/classes/orderDetails.class.php";
include "classes/Converter.class.php";
$product = new Products();

if (!isset($_GET['id'])) {?>
<script>
window.location.href = 'index.php';
</script>

<?php
}
// if (isset($_GET['id']) && $_GET['id'] != '') {
//     $product_id = $_GET['id'];

//      $_COOKIE['recently_viewed'] = $product_id;
//      setcookie('recently_viewed', $product_id, time() + 60 * 60 * 24 * 365);

// }
$review = new Review();
$arr1 = $review->getReview($product_id);
$converter = new Converter();
?>



<body>
    <section class="kutir-shilpo">

        <div class="container" style="margin-bottom: 60px;margin-top:30px">
            <h2>পণ্যের বিবরণ দেখে অর্ডার করুন</h2>

        </div>

        <?php $arr = $product->getProductById($product_id);
if (!empty($arr)) {

    foreach ($arr as $product_data) {

        ?>
        <section class="single-product-show" style="margin:60px">
            <div class="">
                <div class="container product-display d-flex justify-content-center">
                    <div class="row p-5 full-product">
                        <div class="col-md-6 col-sm-12 image-product ">
                            <div id="zoomC"
                                style="background-image:url('images/category/<?php echo $product_data['image'] ?>') ;">
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-12 show-description" style="width:500px ;">
                            <form action="includes/cart.inc.php" method="post">
                                <div class="product-description">
                                    <p class="product-name"><?php echo $product_data['name'] ?></p>
                                    <p style="font-size:15px;font-weight:600 ;">
                                        ক্যাটাগরি: <?php echo $product_data['category'] ?></p>
                                    <p><?php echo $product_data['description'] ?>
                                    </p>
                                    <p>উদ্দ্যোক্তাঃ<?php echo $product_data['entrepreneurName']; ?></p>
                                    <p>সর্বোচ্চ পরিমাণঃ<?php echo $product_data['quantity']; ?>
                                        <span><?php echo $product_data['productType'] ?></span>
                                    </p>


                                    <input type="hidden" name="product_id" value="<?php echo $product_data['id']; ?>">
                                    <input type="number" min="1" max="<?php echo $product_data['quantity']; ?>"
                                        placeholder="পণ্যের পরিমাণ নির্ধারণ করুন " name="quantity" id="product-quantity"
                                        onchange="calculatePrice()" required=""
                                        oninvalid="this.setCustomValidity('অনুগ্রহ করে পণ্যের পরিমাণ নির্ধারণ করুন')"
                                        oninput="setCustomValidity('')">
                                    <p id="price" style="margin-top:14px ;"><?php echo $product_data['price'] ?></p>
                                    <input type="submit" name="cart-add" style="background-color:#993721;color:#fff"
                                        value="কার্টে যোগ করুন">


                                </div>
                            </form>

                        </div>
                    </div>



                </div>

                <?php }} else {
    echo '<p class="empty">কোনো পণ্য এখনও যোগ করা হয়নি!</p>';
}
?>
                <?php if (isset($_SESSION['cus_id'])) {
    // echo $_SESSION['cus_id'];
    $getCustomerOrder = new OrderDetails();
    $productValue = $getCustomerOrder->checkCustomerBuyingProduct($product_id, $_SESSION['cus_id']);

    // print_r($arr);

    if ($productValue) {?>

                <form action="includes/review.inc.php" method="post">

                    <div class="provide-rating d-flex justify-content-center">
                        <select name="rating" id="" required=""
                            oninvalid="this.setCustomValidity('অনুগ্রহ করে আপনার মূল্যবান রেটিং দিন')"
                            oninput="setCustomValidity('')">
                            <option value="">রেটিং দিন

                            </option>
                            <option value="চমৎকার">চমৎকার

                            </option>
                            <option value="ভালো">ভালো

                            </option>
                            <option value="মোটামুটি">মোটামুটি

                            </option>
                            <option value="খারাপ">খারাপ

                            </option>
                        </select>
                    </div>
                    <div class="feedback-write d-flex justify-content-center">

                        <textarea name="feedback" placeholder="আপনার মতামত জানান..." id="" cols="100" rows="5" min="1"
                            maxlength=""></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <div class="d-flex justify-content-center">
                        <input type="submit" name="review" id="" value=" জানান" class=""
                            style="margin:20px;background-color:#993721;color:#fff;font-size:15px;font-weight:550;padding:9px ;border-radius:4px">
                    </div>




                </form>



                <?php }
    // echo $product_id;

}?>

                <!-- ---------------------review send-------------------------- -->







                <!-- ---------------review show------------------ -->



                <?php if (!empty($arr1)) {?>

                <div class=" show-feedback justify-content-center" style="margin:50px auto;padding:10px ;">
                    <?php

    foreach ($arr1 as $review_data) {

        $date = $converter::en2bn($review_data['placedOn'])
        ?>

                    <div class="justify-content-center" style="margin-bottom:5px">
                        <p style="padding-left:px;padding-right:15px;margin-bottom:0"><span
                                style="color:#7c6414;margin-top:20px;margin-left:20px;margin-right:4px;font-size:18px"><?php echo $review_data['rating'] ?>
                            </span><span>(<?php echo $review_data['customerName'] ?>)</span></p>
                        <p style="padding-left:24px;margin-top:0"><?php echo $date ?></p>
                        <p style="font-size:18px ; padding-left:20px;padding-right:15px" class="previous-feedback">

                            <?php echo $review_data['feedback'] ?>

                        </p>
                        <hr>
                        <hr>

                    </div>
                    <?php }} else {}?>

                    <!-- <div class="justify-content-center">
                        <p style="padding-left:px;padding-right:15px;margin-bottom:0"><span
                                style="color:#7c6414;margin:20px">very
                                good</span> <span>(name fdf)</span></p>
                        <p style="padding-left:24px;margin-top:0">45.56.45</p>
                        <p style="font-size:18px ; padding-left:20px;padding-right:15px" class="previous-feedback">

                            jnhhhhhhhhhhhhhhhhfsfsnfsifusnfiufnsifnnnnnnnnnnnnnfndsfn
                            jfignfdgnjdfgfn

                        </p>
                        <hr>

                    </div> -->








                </div>

            </div>


        </section>




        <?php include "includes/footer.php"?>

        <script>
        function calculatePrice() {
            let input = document.getElementById("product-quantity").value;
            document.getElementById("price").innerHTML = input * <?php echo $product_data['price'] ?> + " টাকা";
        }

        var addZoom = (target) => {
            // (A) GET CONTAINER + IMAGE SOURCE
            let container = document.getElementById(target),
                imgsrc = container.currentStyle || window.getComputedStyle(container, false);
            imgsrc = imgsrc.backgroundImage.slice(4, -1).replace(/"/g, "");


            let img = new Image();
            img.src = imgsrc;
            img.onload = () => {

                let ratio = img.naturalHeight / img.naturalWidth,
                    percentage = ratio * 100 + "%";


                container.onmousemove = (e) => {
                    let rect = e.target.getBoundingClientRect(),
                        xPos = e.clientX - rect.left,
                        yPos = e.clientY - rect.top,
                        xPercent = xPos / (container.clientWidth / 100) + "%",
                        yPercent = yPos / ((container.clientWidth * ratio) / 100) + "%";

                    Object.assign(container.style, {
                        backgroundPosition: xPercent + " " + yPercent,
                        backgroundSize: img.naturalWidth + "px"
                    });
                };


                container.onmouseleave = (e) => {
                    Object.assign(container.style, {
                        backgroundPosition: "center",
                        backgroundSize: "cover"
                    });
                };
            }
        };


        window.onload = () => {
            addZoom("zoomC");
        };
        </script>