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
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-weight:600 ;">সাইন আপ
                                    </h1>

                                    <form action="includes/isVerified.inc.php" class="mx-1 mx-md-4" method="post">

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="name" style="padding:19px"
                                                    class="form-control form-control-lg"
                                                    placeholder="আপনার নাম লিখুন" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="আপনার ইমেইল লিখুন" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example3c" name="phone"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="ফোন নম্বরটি লিখুন" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="পাসওয়ার্ড দিন" required />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="cPassword"
                                                    style="padding:19px" class="form-control form-control-lg"
                                                    placeholder="পাসওয়ার্ড নিশ্চিত করুন"  required/>

                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4">
                                            <button type="submit" name="submit"
                                                style="background-color:#993721;border:#993721;font-weight:600"
                                                class="btn btn-primary btn-lg">রেজিস্টার</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center  mb-3 mb-lg-4">
                                        <p><small>আপনার কি ইতিমধ্যে একটি একাউন্ট আছে? </small></p>
                                        <a href="login.php"
                                            style="text-decoration: none;color:#993721; padding-left:3px;"><small>
                                                লগ ইন করুন
                                            </small></a>

                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center order-1 order-lg-2"
                                    style="    justify-content: space-around;">

                                    <img src="images/category/a.png" width="70%" height="auto" class=" img-fluid"
                                        alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>
<?php
include "includes/footer.php";
?>