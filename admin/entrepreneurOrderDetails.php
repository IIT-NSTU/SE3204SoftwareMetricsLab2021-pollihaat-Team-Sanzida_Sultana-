<?php
include "includes/header.php";
include "../classes/Converter.class.php";
include "includes/autoloader.inc.php";
$user = new User();
$user->isEntrepreneur();

$order = new EntrepreneurOrder();
$convert = new Converter();
$arr = $order->getOrder();
//$arr = $order->showOrder($_SESSION['user_name']);

?>

<?php $count = 0;?>
<?php if (!empty($arr)) {

    ?>
<div class="category-display">
    <table class="category-display-table" style="text-align:left">
        <thead style="background-color:#e9d18a ;">
            <tr>


                <th style="font-size:14px">পণ্যের বিবরণ</th>
                <th style="font-size:14px">অর্ডার এর সময়</th>

                <th style="font-size:14px"> পণ্যের মূল্য</th>


                <th style="font-size:14px">পণ্য ডেলিভারি</th>





            </tr>

        </thead>


        <?php

    foreach ($arr as $order_data) {
        $time = $convert::en2bn($order_data['placedOn']);

        ?>

        <?php $arr1 = $order->showOrder($order_data['orderId'], $_SESSION['user_name'])?>


        <?php if (!empty($arr1)) {
            $count = $count + 1;
            //   print_r($arr1);

            ?><tr>
            <td>
                <?php

            foreach ($arr1 as $productData) {

                $count = $count + 1;

                //  print_r($arr1);
                //  exit();
                ?>
                <div><?php echo $productData['name'] ?>
                    <span>-</span><?php echo $convert::en2bn($productData['orderedQuantity']) ?>
                    <?php echo $productData['productType'] ?>
                </div>
                <?php }
            //  echo $count;

            ?>

            </td>

            <td>
                <?php echo $time = $convert::en2bn($order_data['placedOn']); ?>
            </td>


            <?php $arr1 = $order->showOrder($order_data['orderId'], $_SESSION['user_name'])?>
            <td>
                <?php if (!empty($arr1)) {
                foreach ($arr1 as $product) {

                    ?>

                <div><?php echo $product['name'] ?> :

                    <?php echo $convert::en2bn($product['productsPrice']) ?>

                </div>
                <?php

                }} else {
                "";}

            ?>


            </td>


            <td>
                <?php if ($order_data['isReceived'] == '0') {

                ?>
                <div> পাঠানো হয়নাই</div>


                <?php } else {

                ?>
                <div>পাঠানো হয়েছে</div>
                <?php }

            ?>
            </td>

        </tr>

        <?php

        } else {
            if ($count == 0) {

            }
            "";}

    }} else {

}?>



    </table>


</div>