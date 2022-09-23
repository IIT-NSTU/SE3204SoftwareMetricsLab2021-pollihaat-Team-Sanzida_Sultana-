<?php
session_start();

if (!isset($_SESSION['customer_name'])) {?>
<script>
window.location.href = '../login.php';
</script>

<?php
}
include "autoloader.inc.php";
include "../admin/classes/products.class.php";
include "../admin/classes/order.class.php";
include "../classes/review.class.php";
$function = new Validatefunction();
$products = new Products();
$rev = new Review();

if (isset($_POST['review']) && isset($_POST['product_id'])) {
    echo $_SESSION['customer_name'];

    if (!isset($_SESSION['customer_name'])) {
        header('Location:../login.php');
        exit();

    }

    $productId = $function->escape_string($_POST['product_id']);
    $customerId = $_SESSION['cus_id'];
    $rating = $function->escape_string($_POST['rating']);
    $review = $function->escape_string($_POST['feedback']);
    $reviewData = [

        'pId' => $productId,

        'cId' => $customerId,
        'rating' => $rating,
        'review' => $review,

        // 'desc'=>
        // 'image' => $image,
    ];

    $rev->insertReview($reviewData);
    if (isset($_SESSION['msg'])) {
        header('Location:../product.php?id=' . $productId);
        exit();

    }
    echo $_SESSION['msg'];

    exit();
    // $arr = $rev->getAllOrderByCustomerId($customerId); //get all rows of products id of a customer order
    // if (!empty($arr)) {
    //     $array = array();
    //     foreach ($arr as $orderData) {

    //         $productId = $orderData['productsId'];

    //         $productId = array_map('intval', explode(',', $productId));
    //         foreach ($productId as $Id) {

    //             $array[] = $Id; //put all products id  one by one of a customer that were bought
    //         }
    //         $check = $rev->checkCustomerBuyProduct($array, $productId); //ekhane $array te akta particular customer koita product previously kinche sheta ache.then $productId holo
    //         if ($check) {
    //             echo "true";

    //         } else {
    //             echo "False";
    //         }
    //         //shea j product ta akn kinte chacce.jodi akoner er product ta previous products id er shte match hoi taile review dite parbe

    //         // if(!isset[])
    //     }
    // }

}
?>