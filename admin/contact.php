<?php

include "includes/header.php";
//session_start();
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";
$user = new User();
$user->isOwner();

?>

<body>

    <?php
$contact = new Contact();
$converter = new Converter();
// $connection = new DbConnection();
// $view = new ViewPath();

$arr = $contact->selectContact();

if ($_SESSION['role'] == 0) {

    if (!empty($arr)) {?>
    <div class="row justify-content-center">
        <div class="row p-4 m-4">
            <h1 class="font-weight-bolder justify-content-center">মেসেজ সমূহ</h1>
        </div>

    </div>

    <?php foreach ($arr as $contact_data) {
        $time = $converter::en2bn($contact_data['added_on']);

        ?>

    <div class="container" style="font-size:18px;box-shadow: 0px 0px 6px 2px #f19d8b;">
        <div class="row justify-content-center">

            <div class="col-lg-12 font-weight-bolder">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <p><?php echo $time ?> </p>


                            <div class="row">

                                <div class="col-lg-6">
                                    <p> নাম:<?php echo $contact_data['name'] ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <p> ইমেইল: <?php echo $contact_data['email'] ?></p>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-12">
                                    <p> মোবাইল : <?php echo $contact_data['mobile'] ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p> মেসেজ :<?php echo $contact_data['comment'] ?></p>
                                </div>
                            </div>

                            <div style="display:flex;justify-content:center ;">
                                <a href="includes/manageContact.inc.php?delete&id=<?php echo $contact_data['id']; ?>"
                                    class=""
                                    style="width:10%;text-align:center;cursor:pointer;color:#ab0d0d;margin-top:1rem;font-size:25px"
                                    onclick="return confirm('মেসেজ টি কী আপনি মুছে ফেলতে চান?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>

                        </div>







                    </div>




                </div>



            </div>
            <br><br>





        </div>

    </div>

    <?php }} else {}}?>


    <?php include "includes/footer.php"?>