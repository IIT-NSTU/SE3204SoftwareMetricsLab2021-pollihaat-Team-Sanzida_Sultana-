<?php
include "includes/header.php";
include 'config.php';

?>
<?php
// if(isset($_POST['submit'])){
// $vsCode=$_POST['vscode'];
// $email=$_POST['email'];

// }
?>


<body>
    <section class="" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-6" style="margin-top: 50px; margin-bottom:50px;">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body py-5">
                            <div class="justify-content-center">
                                <div class="order-2 order-lg-1">

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4"
                                        style="font-size:17px;font-weight:600;">নিশ্চিত করুন</h1>

                                    <form action="includes/isVerified.inc.php" class="mx-1 mx-md-4" method="post">
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email"
                                                    style="padding:17px;" class="form-control form-control-lg"
                                                    placeholder="আপনার ইমেইল লিখুন" />
                                            </div>
                                        </div>

                                        <div class=" d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" name="vscode"
                                                    style="padding:17px" class="form-control form-control-lg"
                                                    placeholder="আপনার পিন নম্বরটি লিখুন" />

                                            </div>
                                        </div>







                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4">
                                            <button type="submit" name="verified"
                                                style="background-color:#993721;border:#993721"
                                                class="btn btn-primary btn-lg">Submit</button>
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
</body>
<?php
include "includes/footer.php";
?>