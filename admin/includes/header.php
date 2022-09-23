<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:login.php');
    die();
}
// echo $_SESSION['user_name'];
// exit();
include_once 'classes/user.class.php';

$user = new User();

//fetch user data
// $sql = "SELECT * FROM admin_users WHERE id = '" . $_SESSION['user'] . "'";
// $row = $user->details($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>পল্লীহাট</title>
        <!-- cart a eita kaj korche -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            type="text/css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous" />

        <script src="https://kit.fontawesome.com/5ac63e5c98.js" crossorigin="anonymous"></script>

        <!-- font awesome cdn -->
        <script src="https://kit.fontawesome.com/5ac63e5c98.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


        <!-- jquery cdn -->

        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/admin_style.css" />
        <link rel="stylesheet" href="../css/responsive.css">

        <!--
    themify
    <link rel="stylesheet" href="css/themify-icons.css"> -->
    </head>
</head>

<body>

</body>

</html>

<?php

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
            <img style="margin-top:0" src="images/logo (transparent3).png" alt="" width="200" height="70px">
        </a>
        <?php if ($_SESSION['role'] == 0) {

    ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a style="font-weight:580" href="../index.php">হোম</a>
            <a style="font-weight:580" href="admin_home.php">এডমিন প্যানেল</a>
            <a style="font-weight:580" href="category.php">ক্যাটাগরি</a>
            <a style="font-weight:580" href="product.php">পণ্য</a>
            <a style="font-weight:580" href="entrepreneur.php">উদ্দ্যোক্তা</a>
            <a style="font-weight:580" href="customer.php">ক্রেতা</a>
            <a style="font-weight:580" href="orderDetails.php">অর্ডার</a>
            <a style="font-weight:580" href="review.php">প্রতিক্রিয়া</a>
            <a style="font-weight:580" href="contact.php">যোগাযোগ</a>
        </nav>
        <?php }?>
        <?php if ($_SESSION['role'] == 1) {

    ?>
        <nav class="navbar navbar-expand-lg navbar-light">

            <a style="font-weight:580" href="../index.php">হোম</a>

            <a style="font-weight:580" href="product.php">পণ্য</a>

            <a style="font-weight:580" href="entrepreneurOrderDetails.php">অর্ডার</a>
            <a style="font-weight:580" href="review.php">প্রতিক্রিয়া</a>
        </nav>
        <?php }?>




        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="account-box">
            <p style="font-size:16px;font-weight:590"> নাম: <span><?php echo $_SESSION['user_name']; ?></span></p>
            <!-- <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>  -->
            <a style="font-size:18px;font-weight:550" href="includes/logout.inc.php" class="delete-btn">লগআউট</a>
            <!-- <div>new <a href="login.php">login</a> | <a href="register.php">register</a> </div> -->
        </div>

    </div>

</header>
<script>
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
</script>