<?php
include "includes/header.php";
//session_start();
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";
$user = new User();
$user->isOwner();
$converter = new Converter();
?>

<!-- <section class="cateogry-marketplace">
    <div class="category-image">
        <div class="overlay">
            <h1>ড্যাশবোর্ড</h1>
            <!-- <p>আমার সংস্কৃতি, আমার অহংকার</p> -->
<!-- <a href="#load_category" class="btn-shop">পণ্য দেখুন</a>
        </div>
    </div>
</section> -->


<?php

$calculate = new CalculateTotal();

?>

<section class="dashboard">

    <h1 class="title" style="font-weight:600;font-size:28px ;">এডমিন প্যানেল </h1>

    <div class="box-container">

        <div class="box">
            <?php

?>

            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateCategory()) ?> </h3>

            <p>ক্যাটাগরি </p>

        </div>

        <div class="box">
            <?php
?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateProducts()) ?></h3>
            <p>পণ্য</p>
        </div>

        <div class="box">
            <?php
?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateOrder()) ?></h3>
            <p>গৃহিত অর্ডার</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateOrderPending()) ?></h3>
            <p>অর্ডার পেন্ডিং</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculatedDeliveryComplete()); ?></h3>
            <p>অর্ডার সম্পন্ন</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550">
                <?php echo $converter::en2bn($calculate->calculateEntrepreneur()) ?>
            </h3>
            <p>উদ্দ্যোক্তার সংখ্যা</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateCustomer()) ?></h3>
            <p>ক্রেতার সংখ্যা</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550">
                <?php echo $converter::en2bn($calculate->calculateEntrepreneur() + $calculate->calculateCustomer()) ?>
            </h3>
            <p>সর্বমোট একাউন্ট</p>
        </div>





    </div>
</section>


<?php include "includes/footer.php"?>