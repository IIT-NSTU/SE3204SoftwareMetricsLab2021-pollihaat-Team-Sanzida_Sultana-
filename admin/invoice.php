<?php
include "includes/header.php";
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";
?>

<?php
$function = new Validatefunction();
$convert = new Converter();
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

    <div class="container p-4" id="invoice">
        <div class="row justify-content-center">
            <h1 class="font-weight-bolder justify-content-center">পল্লীহাট</h1>

        </div>
        <div class="row justify-content-center">
            <h1 class="font-weight-bolder justify-content-center">"পল্লীহাট" থেকে পণ্য ক্রয় করার জন্য ধন্যবাদ</h1>

        </div>

        <br>
        <?php if (!empty($arr)) {
        foreach ($arr as $invoiceData) {

            ?>

        <div class="row">
            <div class="col-8">
                <p style="font-size:18px" class="text-decoration-underline font-weight-bolder ">ক্রেতা এবং পণ্যের বিবরণ</p>
                <hr>
                <?php $date = $convert::en2bn($invoiceData['placedOn']);

            ?>
                <p style="font-size:18px;font-weight:500"><?php echo $invoiceData['customerName'] ?></p>
                <p style="font-size:18px;font-weight:500"><?php echo $convert::en2bn($invoiceData['phone']) ?></p>
                <p style="font-size:18px;font-weight:500"><?php echo $invoiceData['email'] ?></p>
                <?php }} else {
        echo "<p class='empty'>No invoice placed yet </p>";

    }?>
                <hr>
                <br>
                <?php
if (!empty($productInfo)) {?>
                <div class="row">
                    <div class="col-3">
                        <p style="font-size:18px;font-weight:600" class="font-weight-bolder">পণ্যের নাম</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:18px;font-weight:600" class="font-weight-bolder">পণ্যের পরিমাণ</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:18px;font-weight:600" class="font-weight-bolder">মূল্য</p>
                    </div>
                    <div class="col-3">
                        <p style="font-size:18px;font-weight:600" class="font-weight-bolder">উদ্যোক্তার নাম</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
$totalPrice = 0;
        foreach ($productInfo as $productData) {

            ?>

                    <div class="col-3" style="font-size:18px;font-weight:550">
                        <?php echo $productData['name'] ?>
                    </div>
                    <div class="col-3" style="font-size:18px;font-weight:550">
                        <?php echo $productData['orderedQuantity'] ?>
                    </div>
                    <div class="col-3" style="font-size:18px;font-weight:550">
                        <?php echo $convert::en2bn($productData['productsPrice']);
            $totalPrice = $totalPrice + $productData['productsPrice']
            ?>
                    </div>
                    <div class="col-3">
                        <p style="font-size:18px;font-weight:550"></p>
                        <p style="font-size:18px;font-weight:550"><?php echo $productData['entrepreneurName'] ?></p>

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
                        <p style="font-size:20px;font-weight:600" class="font-weight-bolder">
                            সর্বমোট মূল্য:<?php echo $convert::en2bn($totalPrice) ?>
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
                <p style="font-size:18px;font-weight:550">ইনভয়েস#<?php echo $convert::en2bn($oid) ?></php>
                <p style="font-size:18px;font-weight:550">অর্ডার নিশ্চিতকরণের তারিখ এবং সময়:</p>
                <p style="font-size:18px;font-weight:550"><?php echo $convert::en2bn($date)?></p>
            </div>
        </div>


        <a style="font-size:35px;font-weight:850;color:#d96046;text-decoration:none" href="javascript:void(0)" class="btn-download" >ইনভয়েস তৈরি করুন </a>


    </div>
    </div>
    </div>



<?php
}
?>

<script src="js/jquery.min.js"></script>





<script src="./js/jspdf.debug.js"></script>
<script src="./js/html2canvas.min.js"></script>
<script src="./js/html2pdf.min.js"></script>


<script>

    const options = {
      margin: 0.5,
      filename: 'invoice.pdf',
      image: { 
        type: 'jpeg', 
        quality: 500
      },
      html2canvas: { 
        scale: 1 
      },
      jsPDF: { 
        unit: 'in', 
        format: 'letter', 
        orientation: 'portrait' 
      }
    }
    
    $('.btn-download').click(function(e){
      e.preventDefault();
      const element = document.getElementById('invoice');
      html2pdf().from(element).set(options).save();
    });


    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>



</body>

</html>