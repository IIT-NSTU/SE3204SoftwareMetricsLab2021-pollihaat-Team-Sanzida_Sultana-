<?php
include "includes/header.php";
include "includes/autoloader.inc.php";
?>

<?php
$function = new Validatefunction();
?>
<?php
if (isset($_GET['id'])) {

    $invoice = new Invoice();
    $oid = $function->escape_string($_GET['id']);
    $arr = $invoice->getCustomerInfo($oid);
    if (empty($arr)) {

        header('Location:orderDetails.php');
    }

    $productInfo = $invoice->getCustomerProduct($oid);
    //   echo "<pre>";
    //   print_r($productInfo);

    ?>


<body>

    <div class="container p-4">
        <div class="row justify-content-center">
            <h1 class="font-weight-bolder justify-content-center">পল্লীহাট</h1>

        </div>
        <div class="row justify-content-center">
            <h1 class="font-weight-bolder justify-content-center">Thanks for buying products from our site</h1>

        </div>

        <br>
        <?php if (!empty($arr)) {
        foreach ($arr as $invoiceData) {

            ?>

        <div class="row">
            <div class="col-8">
                <p style="font-size:18px" class="text-decoration-underline font-weight-bolder ">Customer and product
                    details</p>
                <hr>
                <?php $date = $invoiceData['placedOn'];

            ?>
                <p style="font-size:15px;font-weight:500"><?php echo $invoiceData['customerName'] ?></p>
                <p style="font-size:15px;font-weight:500"><?php echo $invoiceData['phone'] ?></p>
                <p style="font-size:15px;font-weight:500"><?php echo $invoiceData['email'] ?></p>
                <?php }} else {
        echo "<p class='empty'>No invoice placed yet </p>";

    }?>
                <hr>
                <br>
                <?php
if (!empty($productInfo)) {?>
                <div class="row">
                    <div class="col-3">
                        <p style="font-size:16px;font-weight:600" class="font-weight-bolder">Product Name</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:16px;font-weight:600" class="font-weight-bolder">Product Quantity</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:16px;font-weight:600" class="font-weight-bolder">Amount</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:16px;font-weight:600" class="font-weight-bolder">Entrepreneur's Name</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
$totalPrice = 0;
        foreach ($productInfo as $productData) {

            ?>

                    <div class="col-3" style="font-size:15px;font-weight:550">
                        <?php echo $productData['name'] ?>
                    </div>
                    <div class="col-3" style="font-size:15px;font-weight:550">
                        <?php echo $productData['orderedQuantity'] ?>
                    </div>
                    <div class="col-3" style="font-size:15px;font-weight:550">
                        <?php echo $productData['productsPrice'];
            $totalPrice = $totalPrice + $productData['productsPrice']
            ?>
                    </div>
                    <div class="col-3">
                        <p style="font-size:15px;font-weight:550"></p>
                        <p style="font-size:15px;font-weight:550"><?php echo $productData['entrepreneurName'] ?></p>

                    </div>


                    <?php }}?>
                </div>
                <hr>

                <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                        <p style="font-size:17px;font-weight:600" class="font-weight-bolder">
                            Total:<?php echo $totalPrice ?>
                        </p>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
                <hr>
                <br>
            </div>
            <br>


            <div class="col-4 justify-content-center">
                <p style="font-size:15px;font-weight:550">Invoice#<?php echo $oid ?></php>
                <p style="font-size:15px;font-weight:550">Order creation Date and Time:</p>
                <p style="font-size:15px;font-weight:550"><?php echo $date ?></p>
            </div>
        </div>





    </div>
    </div>
    </div>





</body>

</html>

<?php
}
?>