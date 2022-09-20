<?php
include "includes/header.php";
include "../classes/Converter.class.php";
include "includes/autoloader.inc.php";
$user = new User();
$user->isOwner();
$order = new OrderDetails();
$convert = new Converter();
$arr = $order->showOrder();

?>

<div class="category-display">
    <table class="category-display-table" style="text-align:left">

        <thead style="background-color:#e9d18a ;">
            <tr style="">
                <th style="font-size:18px;border:1px solid #fff">নং</th>
                <th style="font-size:18px;border:1px solid #fff">পণ্যের বিবরণ</th>
                <th style="font-size:18px;border:1px solid #fff">সময়</th>
                <th style="font-size:18px;border:1px solid #fff">ক্রেতার বিবরণ</th>
                <!-- <th>পরিমাণ</th> -->
                <th style="font-size:18px;border:1px solid #fff">পণ্যের উদ্দ্যোক্তাগণ</th>
                <th style="font-size:18px;border:1px solid #fff"> পণ্যের মূল্য</th>
                <!-- <th style="font-size:14px"> মোট মূল্য</th> -->

                <!-- <th>পেন্ডিং স্ট্যাটাস</th> -->
                <th style="font-size:18px;border:1px solid #fff">পণ্য গ্রহণ</th>
                <th style="font-size:18px;border:1px solid #fff">পণ্য ডেলিভারি</th>
                <th style="font-size:18px;border:1px solid #fff">কার্যক্রম</th>




            </tr>

        </thead>


        <?php

if (!empty($arr)) {
    // print_r($arr);
    foreach ($arr as $order_data) {

        //   echo $order_data['orderId'] . "-";
        // echo $order_data['isReceived'];
        $time = $convert::en2bn($order_data['placedOn'])
        ?>
        <tr style="">
            <td style="font-weight:550;font-size:16px ;border:1px solid #701b08">
                <?php echo $convert::en2bn($order_data['orderId']) ?></td>

            <td style="font-weight:550;font-size:16px;border:1px solid #701b08"> <?php
$product = $order->getProductDetailsByOrderId($order_data['orderId']);
        if (!empty($product)) {
            //  print_r($product);
            //   exit();
            foreach ($product as $productData) {?>

                <div><?php #echo $convert::en2bn($productData['id']) ?>
                    <?php echo $productData['name'] ?>
                    <span>-</span><?php echo $convert::en2bn($productData['orderedQuantity']) ?>
                    <?php echo $productData['productType'] ?>
                </div>
                <?php

            }} else {
            "";}

        ?>
            </td>
            <td style="font-weight:550;font-size:16px;border:1px solid #701b08"> <?php echo $time ?> </td>


            <td style="font-weight:550;font-size:16px;border:1px solid #701b08">
                <?php
$customer = $order->getCustomerByOrderId($order_data['orderId']);
        if (!empty($customer)) {
            foreach ($customer as $customerData) {

            }?>

                <div>আইডিঃ<?php echo $convert::en2bn($customerData['id']) ?> </div>
                <div> <?php echo $customerData['customerName'] ?></div>
                <div> <?php echo $customerData['phone'] ?></div>
                <div><?php echo $customerData['email'] ?></div>


                <?php

        } else {" ";}

        ?>
            </td>
            <td style="font-weight:550;font-size:16px;border:1px solid #701b08"><?php
$product = $order->getProductDetailsByOrderId($order_data['orderId']);
        if (!empty($product)) {
            //  print_r($product);
            //   exit();
            foreach ($product as $productData) {?>

                <div><?php #echo $convert::en2bn($productData['id']) ?>
                    <?php echo $productData['name'] ?>
                    <span>-</span><?php echo $convert::en2bn($productData['entrepreneurName']) ?>

                </div>
                <?php

            }} else {
            "";}

        ?>

            </td>
            <td style="font-weight:550;font-size:16px;border:1px solid #701b08">
                <?php
$product = $order->getProductDetailsByOrderId($order_data['orderId']);
        if (!empty($product)) {
            //  print_r($product);
            //   exit();
            foreach ($product as $productData) {?>

                <div><?php echo $productData['name'] ?> :

                    <?php echo $convert::en2bn($productData['productsPrice']) ?>

                </div>
                <?php

            }} else {
            "";}

        ?>


            </td>
            <!-- <td style="font-weight:550;font-size:13px"> <?php
// $total = $convert::en2bn($order_data['totalPrice']);
//         echo $total;
        ?>

            </td> -->
            <form action="includes/order.inc.php" method="post">
                <?php #$a = $order_data['orderId']?>
                <input type="hidden" name="orderId" value="<?php echo $order_data['orderId'] ?>"
                    placeholder="<?php echo $a ?>">

                <td style="font-weight:550;font-size:16px;text-align:center;border:1px solid #701b08">
                    <select name="accept" style="font-size:12px;">
                        <?php if ($order_data['isReceived'] == 0) {?>
                        <option value="0" style="color:#993721" selected>হয়নি</option>
                        <option value="1" style="color:#06340f">হয়েছে</option>

                        <?php } else {?>
                        <option value="0">হয়নি</option>
                        <option value="1" selected>হয়েছে</option>
                        <?php }?>
                    </select>


                </td>
                <td style="font-weight:550;font-size:16px;text-align:center;border:1px solid #701b08">
                    <select name="deliver" style="font-size:12px">
                        <?php if ($order_data['isDelivered'] == 0) {?>
                        <option style="font-size:13px;" value="0" selected>হয়নি</option>
                        <option value="1">হয়েছে</option>

                        <?php } else {?>
                        <option value="0">হয়নি</option>
                        <option value="1" selected>হয়েছে</option>
                        <?php }?>
                    </select>

                </td>

                <td style="border:1px solid #701b08">
                    <div style="display:flex;justify-content:center;">
                        <button style="color:#0b5319;" type="submit" name="update"> <i style="font-size:29px ;"
                                class="fa-solid fa-check-to-slot"></i></button>
                    </div>
                    <div style="display:flex;justify-content:center;">

                        <button style="color:#bb1b1be3" type="submit" name="delete"
                            onclick="return confirm('অর্ডারটি কী মুছে ফেলতে চান?');"> <i style="font-size:29px ;"
                                class="fa-sharp fa-solid fa-trash"></i></button>
                        <!--
<a style="color:#bb1b1be3" href="includes/order.inc.php.inc.php?delete" class=""
    onclick="return confirm('অর্ডারটি কী মুছে ফেলতে চান?');">
    <i class="fas fa-trash"></i>
</a> -->
                    </div>
                    <div style="display:flex;justify-content:center;">
                        <button style="color:#cf7528e3" type="submit" name="invoice"> <i style="font-size:29px"
                                class="fa-solid fa-file-lines"></i>
                        </button>
                    </div>




                    <!-- <div style="display:flex;justify-content:center"> -->
                    <!-- <input type="submit" name="update" value="update" class="btn"> -->


                    <!-- <a style="color:#cf7528e3" href="manageProduct.php?edit&id=<?php #echo $product_data['id']; ?>"
                            class="">
                            <i class="fa-solid fa-check-to-slot"></i>
                        </a> -->
                    <!-- </div> -->

                </td>



            </form>


        </tr>
        <?php }} else {
    echo "<p class='empty'>কোন অর্ডার নেই </p>";

}?>

</div>