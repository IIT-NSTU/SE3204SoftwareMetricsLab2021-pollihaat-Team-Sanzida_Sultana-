<?php include "includes/header.php";
if (!isset($_SESSION['customer_name'])) {?>
<script>
window.location.href = 'login.php';
</script>

<?php }
include "includes/autoloader.inc.php";
$cusOrder = new CustomerOrder();
$converter = new Converter();
$arr = $cusOrder->getCustomerOrder($_SESSION['cus_id']);

?>

<body>



    <!-- <section class="cateogry-marketplace">
        <div class="category-image">
            <div class="overlay">
                <h1>পল্লীহাট</h1> -->
    <!-- <p>আপনার অর্ডার </p> -->
    <!-- <a href="#load_category" class="btn-shop">পণ্য দেখুন</a>
            </div>
        </div>
    </section> -->
    <?php if (!empty($arr)) {
    // print_r($arr);
    // exit();

    ?>
    <section class="product-cart-show">
        <div class="category-show-1">

            <div class="category-display" style="overflow-x:auto">
                <table class="category-display-table table">
                    <thead>
                        <tr style="color:#fff">
                            <th>পণ্যের বিবরণ</th>
                            <th>মোট মূল্য</th>
                            <th>অর্ডার এর অবস্থা</th>
                            <th>পণ্য ডেলিভেরি</th>
                        </tr>

                    </thead>
                    <?php foreach ($arr as $arr_data) {

        ?>

                    <tr>


                        <td style="font-weight:550">
                            <?php $arr1 = $cusOrder->getCustomerProduct($arr_data);
        //  print_r($arr1);
        //  exit();
        if (!empty($arr1)) {
            foreach ($arr1 as $data) {

                ?>

                            <div><?php echo $data['name'] ?><?php echo " " . $converter::en2bn($data['orderedQuantity']);
                echo " " . $data['productType'] ?>
                            </div>





                            <?php }}?>
                        </td>


                        <td style="font-weight:550">
                            <?php $arr1 = $cusOrder->getCustomerProduct($arr_data);
        if (!empty($arr1)) {
            $totalPrice = 0;
            foreach ($arr1 as $data) {
                $totalPrice += $data['productsPrice'];}
            ?>

                            <div><?php echo $converter::en2bn($totalPrice) ?></div>





                            <?php }?>


                        </td>

                        <?php $arr2 = $cusOrder->getReceiveOrnot($arr_data);
        foreach ($arr2 as $receive) {

            ?>
                        <td style="font-weight:550">
                            <?php

            if ($receive['isReceived'] == 0) {?>
                            <div>অপেক্ষা করুন</div>

                            <?php } else if ($receive['isReceived'] == 1) {?>

                            <div>পণ্য গ্রহণ করুন</div>
                            <?php }}?>



                        </td>
                        <?php $arr3 = $cusOrder->getReceiveOrnot($arr_data);
        foreach ($arr3 as $deliver) {

            ?>
                        <td style="font-weight:550">
                            <?php

            if ($deliver['isDelivered'] == 0) {?>
                            <div>করা হয়নি</div>

                            <?php } else if ($receive['isDelivered'] == 1) {?>

                            <div>করা হয়েছে</div>
                            <?php }}?>



                        </td>






                    </tr>
                    <?php }} else {
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
echo "কোন অর্ডার নেই";
    ?>


                    </div>

                    <?php
}

?>
                </table>

            </div>

    </section>


    <?php include 'includes/footer.php'?>