<?php
include "header.php";
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

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4">Sign up</h1>

                                    <form class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control form-control-lg" placeholder="Your Name" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control form-control-lg" placeholder="Email Address" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example3c" class="form-control form-control-lg" placeholder="Phone Number" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control form-control-lg" placeholder="Password" />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-key fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control form-control-lg p-2" placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center  mb-3 mb-lg-4">
                                        <p><small>Do you have an account? </small></p>
                                        <a href="#" style="text-decoration: none; padding-left:3px;"><small> Sign in</small></a>

                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center order-1 order-lg-2" style="    justify-content: space-around;">

                                    <img src="1.jpg" width="80%" height="auto" class=" img-fluid" alt="Sample image">

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
include "footer.php";
?>