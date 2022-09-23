<?php
include 'config.php';
use PHPMailer\PHPMailer\SMTP;

// function sendMail($email, $v_code)
// {
//     require "phpMailer/Exception.php";
//     require "phpMailer/PHPMailer.php";
//     require "phpMailer/SMTP.php";

//     $mail = new PHPMailer(true);
//     try {
//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
// $mail->isSMTP(); //Send using SMTP
// $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
// $mail->SMTPAuth = true; //Enable SMTP authentication
// $mail->Username = 'sanzidasultana822@gmail.com'; //SMTP username
// $mail->Password = 'zvrihssggixobrqz'; //SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
// $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
// $mail->SMTPOptions = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true,
//     ),
// );
//Recipients
// $mail->setFrom('sanzidasultana822@gmail.com', 'Sanzida');
// $mail->addAddress($email); //Add a recipient

// $mail->From = 'sanzidasultana822@gmail.com';
//   $mail->Sender = $email; //without it  mail goes in spam folder

//Content
//         $mail->isHTML(true); //Set email format to HTML
//         $mail->Subject = 'Email Verification';
//         $mail->Body = "Thanks for registration!<br>
//         enter the code to verified your account $v_code
//         ";

//         $mail->send();
//         return true;
//     } catch (Exception $e) {
//         return false;
//     }

// }

// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];
//     $name = $_POST['name'];
//     $phone_number = $_POST['phone'];

//     $password = $_POST['password'];
// $customer_id = uniqid('nstu');
// if (empty($name) || empty($email) || empty($phone_number) || empty($password)) {
//     echo "<script>
//   alert('Please Enter All Data');

//   </script>";
// } else {
//     $user_exist_query = "SELECT * FROM customers where email ='$email';";

//     $result = mysqli_query($conn, $user_exist_query);
//     if (mysqli_num_rows($result) > 0) {

//     echo "<script>
//   alert('User Already Exist');

//   </script>";
// } else {
//     $v_code = bin2hex(random_bytes(8));
//     $user_query = "INSERT INTO customers (customerName,email,phone,password,isVerified,vCode) VALUES ('$name','$email','$phone_number','$password',0,'$v_code');";
//     $result2 = (mysqli_query($conn, $user_query) && sendMail($email, $v_code));
//     // var_dump($result2);
//     if ($result2) {
//         echo "<script>
//        alert('আপনার ইমেইলে একটি ভেরিফিকেশন কোড পাঠানো হয়েছে');
//        window.location.href = 'isVerified.php';
//                </script>";
//                 //  header('Location:isVerified.php');
//             } else {
//                 echo "<script>
//             alert('');

//             </script>";
//             }
//         }
//     }

// }