<?php
include "includes/header.php";
//session_start();
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";
$user = new User();
$user->isEntrepreneur();
$converter = new Converter();

?>
<?php

$calculate = new CalculateTotal();

?>

<section class="dashboard">

    <h1 class="title">ড্যাশবোর্ড</h1>

    <div class="box-container">



        <div class="box">
            <?php
?>
            <h3 style="font-weight:550"><?php echo $converter::en2bn($calculate->calculateProducts()) ?></h3>
            <p>পণ্য</p>
        </div>

        <div class="box">
            <?php
?>
            <h3 style="font-weight:550"><?php ?></h3>
            <p>গৃহিত অর্ডার</p>
        </div>

        <div class="box">
            <?php

?>
            <h3 style="font-weight:550"><?php #echo $number_of_products; ?></h3>
            <p>অর্ডার সম্পন্ন</p>
        </div>









    </div>
</section>


<?php include "includes/footer.php"?>