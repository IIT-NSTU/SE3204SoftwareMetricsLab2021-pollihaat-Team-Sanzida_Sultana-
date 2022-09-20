<?php
include "autoloader.inc.php";

session_start();

$function = new Validatefunction();
$verified = new Registration();

if (isset($_POST['verified'])) {
    // echo $_POST['email'];
    //echo $_POST['vscode'];
    $email = $function->escape_string($_POST['email']);
    $code = $function->escape_string($_POST['vscode']);
    $verified->checkVerified($email, $code);

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        // exit();
        header('location:../isVerified.php');
        //  exit();

    }

}
if (isset($_POST['submit'])) {

    $email = $function->escape_string($_POST['email']);
    $name = $function->escape_string($_POST['name']);
    $phone_number = $function->escape_string($_POST['phone']);
    $password = $function->escape_string($_POST['password']);
    $cpassword = $function->escape_string($_POST['cPassword']);
    if ($password != $cpassword) {

        $_SESSION['msg'] = "দুঃখিত পাসওয়ার্ড মিলে নি| আবার চেষ্টা করুন।";
        header('Location:../registration.php');
        exit();
    }
    if (empty($name) || empty($email) || empty($phone_number) || empty($password)) {
        echo "<script>
  alert('অনুগ্রহ করে সব তথ্য দিন');

  </script>";
    } else {
        // $reg = new Registration();
        $verified->userExist($email);
        if (isset($_SESSION['msg'])) {
            header('Location:../login.php');
            exit();
        }

    }

    $v_code = bin2hex(random_bytes(8));
    $customerData = ['name' => $name,
        'email' => $email,
        'phone' => $phone_number,
        'password' => $password,
        'vCode' => $v_code,
    ];
    $verified->insertCustomer($customerData);
    $verified->sendMail($email, $v_code);

}

if (isset($_POST['forgetpass']) && isset($_POST['forgetpass']) != '') {

    $email = $function->escape_string($_POST['femail']);
    $_SESSION['forget_email'] = $email;
    // $reg = new Registration();
    $v_code = bin2hex(random_bytes(8));
    $verified->userForResetPass($email, $v_code);

    $verified->sendMail($email, $v_code);

}
if (isset($_POST['f_verified']) && isset($_POST['f_verified']) != '') {

    $code = $function->escape_string($_POST['f_vscode']);
    $verified->verifiedPinCode($code);

}