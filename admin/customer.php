<?php include "includes/header.php";
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";

$user = new User();
$user->isOwner();
$converter = new Converter();
?>

<section class="eProduct-display" id="product">


</section>
<div class="category-display">
    <table class="category-display-table">
        <thead>
            <tr>
                <th>ক্রেতার আইডি</th>
                <th>ক্রেতার নাম</th>

                <th>মোবাইল</th>
                <th>ইমেইল</th>

            </tr>
        </thead>
        <?php

$customer = new Customer();

$arr = $customer->getCustomer();
if (!empty($arr)) {
    foreach ($arr as $customer_data) {
        $id = $converter::en2bn($customer_data['id'])

        ?>
        <tr>

            <td style="font-weight:550"><?php echo $id ?></td>


            <td style="font-weight:550"><?php echo $customer_data['customerName'] ?></td>
            <td style="font-weight:550"><?php echo $customer_data['phone'] ?></td>
            <td style="font-weight:550"><?php echo $customer_data['email'] ?></td>





            <?php }} else {'';}?>

        </tr>

    </table>
    <div class="err"></div>
</div>