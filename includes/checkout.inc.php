<?php
session_start();

if (!isset($_SESSION['customer_name'])) {?>
<script>
window.location.href = 'login.php';
</script>

<?php
}
include "autoloader.inc.php";
include "../admin/classes/products.class.php";
$function = new Validatefunction();
$products = new Products();
// if (isset($_SESSION['cus_id'])) {

//     $name = $_SESSION['customer_name'];
// }
$customer = $function->escape_string($_SESSION['cus_id']);
$customer_id = $function->escape_string($_SESSION['cus_id']);
// echo "DXD";
if (isset($_GET['id']) && $_GET['id'] != '') {
//    $selectedQuantity = $function->escape_string(($_GET['qty']));
    //  echo $selectedQuantity;
    //   exit();
    $cart = new Add_cart();
    $arr = $cart->getCart($customer_id);

    if (!empty($arr)) {

        foreach ($arr as $cart_info) {

            $pid = $function->escape_string(($cart_info['pid']));
            $selectedQuantity = $function->escape_string($cart_info['qty']);
            $pQuantity = $function->escape_string($cart_info['qty']);
            //  echo $pid;
            // echo $selectedQuantity;
            echo $pid;
            echo "<br>";
            //echo $cart_info['cartId'];
            $products->checkProductQuantity($pid, $selectedQuantity, $customer_id);

            if (isset($_SESSION['msg'])) {
                header('Location:../cart.php');
                exit();
            }

        }

    }

    // echo "DXD";
    date_default_timezone_set('Asia/Dhaka');
    $placed_on = date('Y-m-d H:i:s');
    $customer_id = $function->escape_string($_SESSION['cus_id']);
    // $transaction_id = $function->escape_string($_POST['transaction']);

    $convert = new Converter();
    $grandTotal = 0;

    $orderInsert = new customerOrder();
    // $customer_id = $_SESSION['cus_id'];
    $arr1 = $cart->GetAllValues($customer_id);

    //  $total_price = 0;
    $orderInsert->insertCustomerOrder($customer_id, $placed_on);
    if (!empty($arr1)) {

        foreach ($arr1 as $cart_data) {

            // $total_price = $convert::en2bn($cart_data['qty'] * $cart_data['price']);
            // $grandTotal += ($cart_data['qty'] * $cart_data['price']);
            //   $product_quantity = $cart_data['quantity'];
            //  $products_id[] = $function->escape_string($cart_data['pid']);
            $products->quantityUpdate($function->escape_string($cart_data['pid']), $function->escape_string($cart_data['qty']));

            // $products_quantity[] = $function->escape_string($cart_data['qty']);
            $product_selected_qty = $function->escape_string($cart_data['qty']);
            $unitprice = $function->escape_string($cart_data['price']);
            $product_price = $unitprice * $product_selected_qty;
            $productId = $function->escape_string($cart_data['pid']);
            //   echo $_SESSION['orderId'];
            //   exit();
            $orderInsert->insertOrderDetails($_SESSION['orderId'], $productId, $product_selected_qty, $product_price);
            //    $cart->quantityUpdate($function->escape_string($cart_data['pid']), $function->escape_string($cart_data['qty']));
        }

    }

    //  $cart->deleteProductzeroQuantity();

    if (isset($_SESSION['msg'])) {
        $orderInsert->deleteCart($customer_id);
        header('Location:../cart.php');
    }

}