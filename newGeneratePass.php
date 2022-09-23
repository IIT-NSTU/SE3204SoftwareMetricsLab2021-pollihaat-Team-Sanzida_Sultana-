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

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-weight:550 ;">নতুন পাসওয়ার্ড তৈরি করুন </h1>

                                    <form action="includes/isVerified.inc.php" method="post">

                                        <!-- <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control form-control-lg" placeholder="Your email" />
                                            </div>
                                        </div> -->

                                   
                                      
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="Npassword"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="নতুন পাসওয়ার্ড দিন" required />

                                            </div>
                                        </div>
                                        <!-- <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example3c" class="form-control form-control-lg" placeholder="Phone Number" />
                                            </div>
                                        </div> -->

                       
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="Cpassword"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="পাসওয়ার্ড নিশ্চিত করুন" required />

                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4" style="">
                                            <input type="submit" name="newPassgen" class="btn-lg"
                                                style="background-color:#993721;color:white;font-weight:600;padding:10px 20px" value="সাবমিট">
                                                </button>
                                        </div>
                                    </form>
             
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




    <?php include "includes/footer.php"?>