<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>পল্লীহাট</title>
    <!-- cart a eita kaj korche -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
        type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- <script src="https://kit.fontawesome.com/5ac63e5c98.js" crossorigin="anonymous"></script> -->

    <!-- font awesome cdn -->

    <script src="https://kit.fontawesome.com/5ac63e5c98.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> -->


    <!-- jquery cdn -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

    <!-- Main CSS File -->

    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" href="assets/css/header.css">

    <link rel="stylesheet" href="assets/css/responsive.css">






    <!--
    themify
    <link rel="stylesheet" href="css/themify-icons.css"> -->
</head>

<?php session_start();
if (isset($_SESSION['msg'])) {

    echo '
      <div class="message">


         <span>' . $_SESSION['msg'] . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';

}
unset($_SESSION['msg']);

?>

<header class="header">

    <div class="flex">

        <a class="navbar-brand" href="#">
            <img style="margin-top:0" src="admin/images/logo (transparent3).png" alt="" width="200" height="70px">
        </a>

        <span>

            <?php

// if (isset($_SESSION['customer_name'])) {
//     echo $_SESSION['customer_name'];

// }
;
?></span></a>

        <?php
if (isset($_SESSION['cus_id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'pollihaat');
    $id = $_SESSION['cus_id'];
    $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE customerId = '$id'") or die('query failed');
    $cart_rows_number = mysqli_num_rows($select_cart_number);
    $select_order = mysqli_query($conn, "SELECT * FROM customer_order where customerId='$id' AND isReceived='1' AND isDelivered='0'") or die('query failed');
    $count_order = mysqli_num_rows($select_order);

}
//$cart->cartNotification($_SESSION['cus_id']);

?>

        <nav class="navbar navbar-expand-lg navbar-light">

            <a  href="index.php">হোম</a>
            <a href="marketplace.php">ক্যাটাগরি</a>
            <a href="allProduct.php">পণ্যসমূহ</a>
            <a href="customerOrder.php">অর্ডারসমূহ</a>
            <a href="contact.php">যোগাযোগ</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search.php" class="fas fa-search"
                style="font-size:25px;color:black ; font-weight:600;text-decoration:none;margin-right:4px"></a>

            <?php
# $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
# $cart_rows_number = mysqli_num_rows($select_cart_number);
?>

            <a href="customerOrder.php"> <i class="fa-solid fa-bell"
                    style="font-size:25px;color:black ; font-weight:600;text-decoration:none;margin-right:px"></i>
                <span
                    style="font-size:20px;color:black ; weight:400;text-decoration:none">(<?php if (isset($_SESSION['cus_id'])) {echo $count_order;}?>)</span>
            </a>
            <a href="cart.php"> <i class="fas fa-shopping-cart"
                    style="font-size:25px;color:black ; font-weight:600;text-decoration:none;margin-left:px"></i>
                <span
                    style="font-size:20px;color:black ; weight:400;text-decoration:none">(<?php if (isset($_SESSION['cus_id'])) {echo $cart_rows_number;}?>)</span>
            </a>
            <div id="user-btn" class="fas fa-user"></div>

        </div>

        <div class="account-box">
            <?php
if (isset($_SESSION['customer_name'])) {
    ?> <p style="font-size:18px;font-weight:550">নাম : <span> <?php echo $_SESSION['customer_name'];
    ?> </span></p>

            <?php }if (!isset($_SESSION['customer_name'])) {?>
            <div><a href="login.php" class=""><i style="margin:10px;font-size:20px" class="fa-solid fa-user"></i>ক্রেতা
                    লগ ইন </a></div>

            <?php }if (isset($_SESSION['customer_name'])) {?>
            <div style="display: flex;justify-content:center;font-size:16px;">
                <a style="text-align: center;font-size:18px;color:white;font-weight:560" href="includes/logout.inc.php"
                    class="delete-btn">লগ আউট</a>
            </div>
            <!-- <div><i style="margin:10px;font-size:20px" class="fa-solid fa-pen"></i><a href="">প্রোফাইল
                    ইডিট করুন</a></div> -->
            <?php }?>
            <?php if (!isset($_SESSION['customer_name'])) {?>
            <div style="margin-bottom:20px"><i style="margin:10px;font-size:20px;"
                    class="fa-sharp fa-solid fa-user"></i><a href="admin/login.php">এডমিন । উদ্দ্যোক্তা লগ ইন</a></div>
            <?php }?>
        </div>
    </div>
</header>


<!-- <script>
$(document).ready(function() {
    $(".wish-icon i").click(function() {
        $(this).toggleClass("fa-heart fa-heart-o");
    });
});
let navbar = document.querySelector(".header .flex .navbar");
let userBox = document.querySelector(".header .flex .account-box");

document.querySelector("#menu-btn").onclick = () => {
    navbar.classList.toggle("active");
    userBox.classList.remove("active");
};

document.querySelector("#user-btn").onclick = () => {
    userBox.classList.toggle("active");
    navbar.classList.remove("active");
};

window.onscroll = () => {
    navbar.classList.remove("active");
    userBox.classList.remove("active");
};
</script> -->