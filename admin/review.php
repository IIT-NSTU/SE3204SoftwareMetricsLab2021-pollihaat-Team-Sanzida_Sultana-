<?php
include "includes/header.php";
include "includes/autoloader.inc.php";
include "../classes/review.class.php";
include "../classes/Converter.class.php";
?>

<body>

    <?php
$rev = new Review();
$converter = new Converter();
//$connection = new DbConnection();
// $view = new ViewPath();

$arr = $rev->getAllReview();

if ($_SESSION['role'] == 0) {

    if (!empty($arr)) {?>
    <div class="row justify-content-center">
        <div class="row p-4 m-4">
            <h1 class="font-weight-bolder justify-content-center">পণ্যের ব্যাপারে ক্রেতার মতামত</h1>
        </div>

    </div>

    <?php foreach ($arr as $review_data) {
        $productId = $converter::en2bn($review_data['productId']);
        $date = $converter->en2bn($review_data['placedOn']);
        $customerId = $converter->en2bn($review_data['id'])
        ?>


    <div class="container" style="font-size:18px;box-shadow: 0px 0px 6px 2px #f19d8b;">


        <div class="col-lg-12 font-weight-bolder">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <p> সময়:<?php echo $date ?> </p>


                        <div class="row">

                            <div class="col-lg-6">
                                <p> পণ্য: <?php echo $review_data['name']; ?> (<span><?php echo $productId ?></span>)
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p> উদ্যোক্তা : <?php echo $review_data['entrepreneurName']; ?></p>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <p> <?php echo $review_data['customerName'] ?> <span>(<?php echo $customerId ?>)</span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>রেটিং: <?php echo $review_data['rating']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p> মতামত : <?php echo $review_data['feedback']; ?></p>
                            </div>
                        </div>

                        <div style="display:flex;justify-content:center ;">
                            <a href="includes/manageReview.inc.php?delete&id=<?php echo $review_data['reviewId']; ?>"
                                class=""
                                style="width:10%;text-align:center;cursor:pointer;color:#ab0d0d;margin-top:1rem;font-size:25px"
                                onclick="return confirm('প্রতিক্রিয়াটি কী আপনি মুছে ফেলতে চান?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>

                    </div>







                </div>




            </div>



        </div>



    </div>
    <?php }} else {

        echo '<p class="empty">কোনো প্রতিক্রিয়া নেই!</p>';

    }}?>

    <?php
if ($_SESSION['role'] == 1) {
    $arr1 = $rev->getEntrepreneurProductReview($_SESSION['user_name']);

    if (!empty($arr1)) {?>
    <div class="row justify-content-center">
        <div class="row p-4 m-4">
            <h1 class="font-weight-bolder justify-content-center">আপনার পণ্যের ব্যাপারে ক্রেতার মতামত</h1>
        </div>

    </div>

    <?php foreach ($arr1 as $review_data) {
        // $productId = $converter::en2bn($review_data['productId']);
        $date = $converter->en2bn($review_data['placedOn']);
        // $customerId = $converter->en2bn($review_data['id'])
        ?>


    <div class="container" style="font-size:18px;box-shadow: 0px 0px 6px 2px #f19d8b;">


        <div class="col-lg-12 font-weight-bolder">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <p> সময়:<?php echo $date ?> </p>


                        <div class="row">

                            <div class="col-lg-6">
                                <p> পণ্য: <?php echo $review_data['name']; ?>
                                </p>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <p> <?php echo $review_data['customerName'] ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>রেটিং: <?php echo $review_data['rating']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p> মতামত : <?php echo $review_data['feedback']; ?></p>
                            </div>
                        </div>


                    </div>







                </div>




            </div>



        </div>



    </div>
    <?php }} else {
          echo '<p class="empty">কোনো প্রতিক্রিয়া নেই!</p>';

    }}?>







</body>

</html>