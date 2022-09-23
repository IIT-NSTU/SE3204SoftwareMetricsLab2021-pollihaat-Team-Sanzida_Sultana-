<?php
include "includes/header.php";
?>

<body>
    <section class="" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-11" style="margin-top: 50px; margin-bottom:50px;">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body py-5">
                            <div class="row justify-content-center">
                                <div class="col-sm-6 d-flex align-items-center order-1 order-lg-2"
                                    style="    justify-content: space-around;">

                                    <img src="images/lo.png" width="70%" height="auto" class=" img-fluid"
                                        alt="Sample image">

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-weight:550 ;">লগ ইন </h1>

                                    <form action="includes/login.inc.php" method="post">

                                        <!-- <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control form-control-lg" placeholder="Your email" />
                                            </div>
                                        </div> -->

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control" placeholder="ইমেইল" type="email"
                                                    style="padding:18px;font-size:17px ;" name="email" autofocus required>
                                            </div>
                                        </div>
                                        <!-- <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example3c" class="form-control form-control-lg" placeholder="Phone Number" />
                                            </div>
                                        </div> -->

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 10px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control;font-size:17px" placeholder="পাসওয়ার্ড" type="password"
                                                    style="padding:17px" name="password" required>

                                            </div>
                                        </div>

                                        <!-- <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-key fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control form-control-lg p-2" placeholder="Confirm Password" />
                                            </div>
                                        </div> -->
                                        <div class="d-flex align-items-center"
                                            style="justify-content: space-between;margin-bottom:10px;    margin-left: 26px;">

                                            <a href="forgetpassword.php" class="float-end ms-auto forgot">
                                                <small style="color:#993721;font-weight:600;font-size:15px"> পাসওয়ার্ড
                                                    ভুলে গেছেন?</small>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4" style="">
                                            <button type="submit" name="login" class="btn-lg"
                                                style="background-color:#993721;color:white;font-weight:600;padding:10px 20px">লগ
                                                ইন</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center  mb-3 mb-lg-4">
                                        <p><small style="font-size:14px;font-weight:550">কোন একাউন্ট নেই? </small></p>
                                        <a href="registration.php"
                                            style="text-decoration: none; padding-left:3px;"><small
                                                style="color:#993721;font-weight:600;font-size:14px"> সাইন আপ করুন
                                            </small></a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <?php
if (isset($_SESSION['message'])) {
    ?>
    <div class="alert alert-info text-center">
        <?php echo $_SESSION['message'];

    ?>

    </div>
    <?php

    unset($_SESSION['message']);
}
?>
    </div>
    </div>
    </div>





    <script>
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
    </script>
    <?php include "includes/footer.php"?>