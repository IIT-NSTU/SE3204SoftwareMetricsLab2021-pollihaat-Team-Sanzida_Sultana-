<?php include "includes/header.php";
if (!isset($_SESSION['customer_name'])) {?>
<script>
window.location.href = 'login.php';
</script>

<?php }
include "includes/autoloader.inc.php";

?>



<body>



    <!-- <section class="cateogry-marketplace">
        <div class="category-image">
            <div class="overlay">
                <h1>পল্লীহাট</h1>
                <p>শপিং কার্ট</p>
                <a href="#load_category" class="btn-shop">পণ্য দেখুন</a>
            </div>
        </div>
    </section> -->




    <section class="category-display">
        <h2>আপনার যোগকৃত কার্টে পণ্যসমূহ</h2>
    </section>

    <?php

$cart = new Add_cart();
$arr = $cart->GetAllValues($_SESSION['cus_id']);
$convert = new Converter();
$grandTotal = 0;
$product_id = 0;
// $cart->deleteProductzeroQuantity();
if (!empty($arr)) {

    ?>
    <section class="product-cart-show">
        <div class="category-show-1">

            <div class="category-display" style="overflow-x:auto">
                <table class="category-display-table table">
                    <thead>
                        <tr style="color:#fff">
                            <th>পণ্যের ছবি</th>

                            <th>পণ্যের নাম </th>
                            <th>একক মূল্য</th>

                            <th>পণ্যের সর্বোচ্চ পরিমাণ</th>
                            <th>মোট মূল্য</th>
                            <th>পরিমাণ নির্ধারন করুন</th>

                            <th>মুছুন</th>
                        </tr>
                    </thead>

                    <?php

    // print_r($arr);

    foreach ($arr as $cart_data) {

        $total_price = $convert::en2bn($cart_data['qty'] * $cart_data['price']);
        $grandTotal += ($cart_data['qty'] * $cart_data['price']);
        $product_quantity = $convert::en2bn($cart_data['quantity']);

        $product_selected_qty = $convert::en2bn($cart_data['qty']);
        $product_price = $convert::en2bn($cart_data['price']);
        $product_id = $cart_data['id'];

        ?>

                    <tr>


                        <td>
                            <?php
?>

                            <img src="images/category/<?php echo $cart_data['image'] ?>" height="100" width="100"
                                alt="image">

                        </td>
                        <td style="font-weight:550"> <?php echo $cart_data['name']; ?></td>

                        <td style="font-weight:550"> <?php echo $product_price; ?></td>


                        <td style="font-weight:550"><?php echo $product_quantity; ?></td>
                        <td style="font-weight:550"><?php echo $total_price; ?></td>

                        <form action="includes/cart.inc.php" method="post">
                            <!-- <input type="hidden" name="product-number" value="<?php #echo $cart_data['pid'] ?>"> -->
                            <input type="hidden" name="cart-nb" value="<?php echo $cart_data['cartId'] ?>">
                            <td style="font-weight:550;"><input type="number" name="quantity" id="inputQty" min="1"
                                    max="<?php echo $cart_data['quantity'] ?>" value="<?php echo $cart_data['qty'] ?>">
                                <input type="submit" class="option-btn"
                                    style="font-size:16px;max-width:8.2rem;background-color:#95402ce6;padding:5px 3px"
                                    name="update-cart" value="আপডেট">
                        </form>


                        <td>

                            <a href="includes/cart.inc.php?delete&id=<?php echo $cart_data['cartId']; ?>"
                                style="background-color:transparent;" class="btn"
                                onclick="return confirm('আপনি কি কার্ট থেকে পণ্যটি মুছে ফেলতে চান?');">
                                <i class=" fas fa-trash" style="font-size:24px;color:#8b230d ;"></i>
                            </a>
                        </td>

                        <?php }

    $grandTotal = $convert::en2bn($grandTotal);

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
echo "কার্টে কোন পণ্য নেই";
    ?>


                        </div>

                        <?php
}

?>

                    </tr>


                </table>


                <input type="hidden" name="cart-id" value="<?php ?>">
                <input type="hidden" id="quantity" name="quantity" value="<?php ?>">

                <!-- <input type="submit" class="order-now" name="submit" value="ক্যাটাগরি যোগ করুন"> -->

            </div>

            <div style="display:flex;justify-content:center;">
                <a href="includes/cart.inc.php?delete_all&&customer_id=<?php echo $_SESSION['cus_id'] ?>"
                    class="btn delete-btn <?php echo ($grandTotal > 0) ? '' : 'disabled' ?> "
                    style="margin-top:8px;padding:10px;font-size:17px"
                    onclick="return confirm('আপনি কি কার্ট এর সকল পণ্য মুছে ফেলতে চান?');">
                    কার্টের সকল পণ্য মুছুন</a>
            </div>

            <div class="cart-total">
                <p>সর্বমোট মূল্য :<?php echo $grandTotal; ?> <span>৳/-</span></p>
                <div class="" style="display:flex;flex-direction:row;justify-content:center;">
                    <a href="marketplace.php" class="option-btn" style="font-weight:550;margin:5px">শপিং চালিয়ে যান</a>
                    <a href="includes/checkout.inc.php?id=<?php echo $_SESSION['cus_id'] ?>" name="checkout"
                        style="margin:5px"
                        class=" checkout-button btn <?php echo ($grandTotal > 0) ? '' : 'disabled' ?>"
                        <?php # echo ($grand_total > 1) ? '' : 'disabled'; ?>">অর্ডার করুন
                    </a>
                </div>
            </div>







        </div>

    </section>
    <script>
    function getInputVal() {
        //     var qty = document.getElementById("inputQty").value;

        //     alert(qty);

        // }
    </script>


    <?php include "includes/footer.php"?>