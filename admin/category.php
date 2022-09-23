<?php include "includes/header.php";
include "includes/autoloader.inc.php";

$user = new User();
$user->isOwner();

?>
<div class="category_container">

    <div class="admin-category-form-container">

        <form action="includes/addCategory.inc.php" method="post" enctype="multipart/form-data">
            <?php #echo $_SERVER['PHP_SELF'] ?>

            <h3 style="font-weight:600;">ক্যাটাগরি যোগ করুন</h3>
            <!-- <input type="text" id="category_name" placeholder="enter category name" name="category_name" class="box"
                required> -->
            <input type="text" placeholder="ক্যাটাগরির নাম লিখুন" name="category_name" class="box" required=""
                oninvalid="this.setCustomValidity('অনুগ্রহ করে ক্যাটাগরির নাম  লিখুন')" oninput="setCustomValidity('')">
            <!-- <input type="number" placeholder="enter product price" name="product_price" class="box"> -->
            <!-- <input type="file" class="box" name="category_image" accept="image/png, image/jpeg, image/jpg" required> -->

            <p><img id="output" width="100" /></p>
            <!-- <input type="file" name="uploadfile" id="img" style="display:none;"> -->

            <input type="file" name="uploadfile" id="img" style="display:none;" <p><input type="file" accept="image/*"
                name="category_image" id="file" onchange="loadFile(event)" style="display: none;">

            <p class="h4"><label for="file" style="cursor: pointer">
                    <i class="fa-sharp fa-solid fa-cloud-arrow-up h1" id="icon" style="display:block"></i>
                    ক্যাটাগরির ছবি নির্বাচন করুন</label></p>

            <!-- <input type="file" id="category_image" name="category_image" class="box" required> -->
            <input type="submit" class="category-btn" name="submit" value="ক্যাটাগরি যোগ করুন">
        </form>

    </div>


    <section class="eProduct-display" id="product">
        <h2>ক্যাটাগরিসমূহ</h2>

    </section>
    <div class="category-display">
        <table class="category-display-table">
            <thead>
                <tr>
                    <th>ক্যাটাগরির নাম</th>
                    <th>ক্যাটাগরির ছবি</th>

                    <th>ক্যাটাগরি</th>
                </tr>
            </thead>
            <?php

$category = new Categories();
//$connection = new DbConnection();
$view = new ViewPath();

$arr = $category->selectCat();
if (!empty($arr)) {
    foreach ($arr as $category_data) {

        // echo $view->getCategory_Image_site_path();
        // echo "</br>";
        // echo $view->getCategory_Image_site_path() . $category_data['image'];
        // echo "</br>";
        ?>
            <tr>

                <td style="font-weight:550"><?php echo $category_data['name']; ?></td>
                <td>
                    <?php
$cat = trim($category_data['image']);
        //  echo $cat;
        // echo "category/ $cat_name ";
#echo $category_data['image'];
        ?>


                    <!-- <img src="../images/category/31937642-82376909_501983377421849_5976358683561426944_n.jpg<?php #"localhost/pollihaat/images/category/" . $category_data['image'];?>"
                        height="100" width="100" alt="image"> -->
                    <!-- <img src="../images/category/Screenshot_2019-01-17-22-55-53.png" height="100" width="100"
                        alt="image"> -->


                    <img src="../images/category/<?php echo $category_data['image'] ?>" height="100" width="100"
                        alt="image">

                </td>







                <td>
                    <a href="manageCategory.php?edit&name=<?php echo $category_data['name']; ?>" class="btn">
                        <i class="fas fa-edit"></i>
                        পরিবর্তন </a>
                    <a href="includes/manageCat.inc.php?delete&name=<?php echo $category_data['name']; ?>" class="btn"
                        onclick="return confirm('ক্যাটাগরিটি কী মুছে ফেলতে চান?');">
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


<script>
var loadFile = function(event) {
    var picture = document.getElementById('output');
    picture.src = URL.createObjectURL(event.target.files[0]);

    var icon = document.getElementById("icon").style.display = "none";
};
</script>