<?php

include "includes/header.php";
include "includes/autoloader.inc.php";
include "admin/classes/products.class.php";
include "admin/classes/Validatefunction.class.php";
?>

<section class="contact-us">

    <form action="includes/contact.inc.php" method="post">
        <h3>যোগাযোগ করুন</h3>
        <input type="text" name="name" placeholder="আপনার নাম লিখুন" class=" box" required=""
            oninvalid="this.setCustomValidity('অনুগ্রহ করে আপনার নাম লিখুন')" oninput="setCustomValidity('')">
        <input type="email" name="email" required placeholder="আপনার ইমেইল দিন" class="box" required=""
            oninvalid="this.setCustomValidity('অনুগ্রহ করে আপনার ইমেইল দিন')" oninput="setCustomValidity('')">

        <input type="number" name="number" placeholder="আপনার মোবাইল নম্বরটি লিখুন" class="box" required
            oninvalid="this.setCustomValidity('অনুগ্রহ করে মোবাইল নম্বরটি লিখুন')" oninput="setCustomValidity('')">

        <textarea name="message" class="box" placeholder="মেসেজ লিখুন" id="" cols="30" rows="10" required=""
            oninvalid="this.setCustomValidity('অনুগ্রহ করে মেসেজ লিখুন')" oninput="setCustomValidity('')"></textarea>
        <input type="submit" value="সেন্ড করুন" name="send" class="contact-btn">
    </form>

</section>


<?php include 'includes/footer.php'?>