<?php
if (!isset($_SESSION['customer_name'])) {
    header('location:index.php');

}
include "includes/header.php";
include "includes/autoloader.inc.php";

// $price = $_GET['price'];
// if ($price == null || $price == '') {
//     header('location:index.php');
//     exit();

// }

$function = new Validatefunction();
$cart = new Add_cart();
$convert = new Converter();
$grandTotal = 0;
?>

<section class="cateogry-marketplace">
    <div class="category-image">
        <div class="overlay">
            <h1>পল্লীহাট</h1>
            <p>আমার সংস্কৃতি, আমার অহংকার</p>
            <a href="#load_category" class="btn-shop">পণ্য দেখুন</a>
        </div>
    </div>
</section>

<?php

$arr = $cart->GetAllValues($_SESSION['cus_id']);
?>
<section class="display-order"><?php
if (!empty($arr)) {
    foreach ($arr as $cart_data) {

        // $total_price = $convert::en2bn($cart_data['qty'] * $cart_data['price']);
        $grandTotal += ($cart_data['qty'] * $cart_data['price']);
        $product_quantity = $convert::en2bn($cart_data['quantity']);
        $product_selected_qty = $convert::en2bn($cart_data['qty']);
        $product_price = $convert::en2bn($cart_data['price']);
        $product_id = $cart_data['id'];

        ?>



    <p><?php echo $cart_data['name'] ?><span>(<?php echo $product_price ?>৳ x
            <?php echo $product_selected_qty ?>)</span> </p>


    <?php
}
} else {
    ?>
    <div class="align-middle" style="    height: 200px;
        width: 500px;
        margin: 0 auto;
        background-color: #c7ac87;
        font-size: 30px;
        display:flex;
        align-items:center;
        font-weight: 600;
        text-align: center;
        margin-top:9rem;
        margin-bottom:11rem;
        justify-content: center;">
        <?php
echo "কার্টে কোন পণ্য নেই";}

?>


        <?php if ($grandTotal > 0) {?>

        <div class="grand-total"> সর্বমোট মূল্য : <span><?php echo $convert::en2bn($grandTotal) ?></span> </div>
        <?php }?>
        <!--  -->
</section>






<!-- <div class="flex">
        <a href="marketplace.php" class="option-btn" style="font-weight:550">শপিং চালিয়ে যান</a>

    </div> -->
</div>


<section class="checkout-form">

    <form action="includes/checkout.inc.php" method="post" onsubmit="return validatePhone()">
        <h3>আপনার অর্ডার দিন</h3>
        <div class="flex">
            <div class="inputBox">

                <input type="text" id="phone" placeholder="আপনার ফোন নম্বর লিখুন" name="mobile" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে আপনার ফোন নম্বর লিখুন')"
                    oninput="setCustomValidity('')" tyle="font-size:16px">
            </div>



            <div class="inputBox">


                <input type="text"
                    placeholder="০১৮৮২৪২৮৯৮০ নম্বরটিতে সর্বমোট মূল্য পাঠিয়ে প্রাপ্ত বিকাশ ট্রানজেকশন আইডিটি লিখুন"
                    name="transaction" class="box" required=""
                    oninvalid="this.setCustomValidity('অনুগ্রহ করে বিকাশ ট্রানজেকশন আইডি লিখুন ')"
                    oninput="setCustomValidity('')" style="font-size:16px">
            </div>
        </div>
        <input type="submit" value="অর্ডার করুন" class="checkout-button" name="order_btn">
    </form>

</section>




<?php include "includes/footer.php"?>