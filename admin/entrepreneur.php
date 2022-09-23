<?php include "includes/header.php";
include "includes/autoloader.inc.php";
include "../classes/Converter.class.php";
// include "includes/Entrepreneur.class.php";

$user = new User();
$user->isOwner();
$converter = new Converter();
?>
<div class="category_container">

    <div class="admin-category-form-container">

        <form action="includes/addEntrepreneur.inc.php" method="post" enctype="multipart/form-data">
            <?php #echo $_SERVER['PHP_SELF'] ?>

            <h3 style="font-weight:600">উদ্দ্যোক্তা যোগ করুন</h3>
            <input type="text" id="category_name" placeholder="উদ্দ্যোক্তার নাম  লিখুন" name="name" class="box"
                required>
            <!-- <input type="number" placeholder="enter product price" name="product_price" class="box"> -->
            <input type="email" id="category_image" placeholder="উদ্দ্যোক্তার ইমেইল লিখুন" name="gmail" class="box"
                required>

            <input type="number" id="number" min="0" name="mobile" placeholder="উদ্দ্যোক্তার মোবাইল নম্বর লিখুন"
                class="box" required>
            <input type="password" id="number" name="password" placeholder="উদ্দ্যোক্তার পাসওয়ার্ড দিন" class="box"
                required>
            <input type="submit" class="category-btn" name="submit" value="উদ্দ্যোক্তা যোগ করুন">
        </form>

    </div>


    <div class="category-display">
        <table class="category-display-table">
            <thead>
                <tr>
                    <th>উদ্দ্যোক্তার নাম</th>
                    <th>উদ্দ্যোক্তার ইমেইল</th>
                    <th>উদ্দ্যোক্তার মোবাইল</th>

                    <th>উদ্দ্যোক্তার পাসওয়ার্ড</th>
                    <th>কার্যক্রম</th>
                </tr>
            </thead>
            <?php

$entrepreneur = new Entrepreneur();
//$connection = new DbConnection();

$arr = $entrepreneur->selectEnrepreneur();
if (!empty($arr)) {
    foreach ($arr as $entrepreneur_data) {
        $mobile = $converter::en2bn($entrepreneur_data['mobile']);
        $password = $converter::en2bn($entrepreneur_data['password']);

        // echo $view->getCategory_Image_site_path();
        // echo "</br>";
        // echo $view->getCategory_Image_site_path() . $category_data['image'];
        // echo "</br>";
        ?>
            <tr>

                <td><?php echo $entrepreneur_data['username']; ?></td>
                <td><?php echo $entrepreneur_data['gmail']; ?></td>
                <td><?php echo $mobile ?></td>
                <td><?php echo $password ?></td>









                <td>
                    <a href="manageEntrepreneur.php?edit&name=<?php echo $entrepreneur_data['username']; ?>"
                        class="btn">
                        <i class="fas fa-edit"></i>
                        পরিবর্তন </a>
                    <a href="includes/manageEntrepreneur.inc.php?delete&name=<?php echo $entrepreneur_data['username']; ?>"
                        class="btn" onclick="return confirm('উদ্দ্যোক্তাকে কি সিস্টেম থেকে মুছে ফেলতে চান?');">
                        <i class="fas fa-trash"></i>
                        মুছুন </a>
                </td>
                <?php }} else {'';}?>

            </tr>

        </table>
        <div class="err"></div>
    </div>

</div>
<?php include "includes/footer.php"?>