<?php
include "includes/header.php";
include "includes/autoloader.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
// if (isset($message)) {
//     foreach ($message as $message) {
//         echo '<span class="message">' . $message . '</span>';
//     }
// }
?>

    <div class="container">


        <div class="admin-product-form-container centered">

            <?php
$entrepreneur = new Entrepreneur();

#$view = new ViewPath();
$function = new Validatefunction();
if (isset($_GET['edit']) && isset($_GET['name'])) {

    $entrepreneur_name = $function->escape_string($_GET['name']);
    $result = $entrepreneur->EntrepreneurEdit($entrepreneur_name);
    if ($result) {
        ?>
            <form action="includes/manageEntrepreneur.inc.php" method="post" enctype="multipart/form-data">
                <h3 style="font-weight:600" class="title">উদ্দ্যোক্তার তথ্য পরিবর্তন করুন</h3>
                <input type="hidden" name="prev_name" value="<?php echo $result['username']; ?> ">
                <input type="text" class="box" name="entrepreneur_name" value="<?php echo $result['username']; ?>"
                    placeholder="উদ্দ্যোক্তার নাম লিখুন" required>
                <!-- <input type="file" class="box" name="category_image" value="<?php # echo $result['image'] ?>"
                    accept="image/png, image/jpeg, image/jpg"> -->
                <input type="number" class="box" name="entrepreneur_mobile" value="<?php echo $result['mobile']; ?>"
                    placeholder="উদ্দ্যোক্তার মোবাইল নম্বর লিখুন" required>
                <input type="text" class="box" name="entrepreneur_gmail" value="<?php echo $result['gmail']; ?>"
                    placeholder="উদ্দ্যোক্তার ইমেইল দিন" required>
                <input type="text" class="box" name="entrepreneur_password" value="<?php echo $result['password']; ?>"
                    placeholder="উদ্দ্যোক্তার পাসওয়ার্ড দিন" required>

                <input type="submit" style="background-color:#554308" value="উদ্দ্যোক্তার তথ্য পরিবর্তন করুন"
                    name="edit_entrepreneur" class="btn">
                <a href="entrepreneur.php" style="background-color:#B5973F" class="btn">পিছনে ফিরে যান!</a>
            </form>

            <?php } else {

        return false;
    }}

// if (isset($_GET['delete']) && $_GET['name']) {
//     $execute = new Context(new DeleteCategory());
// }
?>










            <?php
;?>



        </div>

    </div>

</body>

</html><?php include "includes/footer.php"?>