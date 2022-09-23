<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Registration
{

    private $email;
    private $code;
    private $phone;
    private $mobile;
    private $password;
    private $name;

    #private $imgName;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function sendMail($email, $v_code)
    {
        require "phpMailer/Exception.php";
        require "phpMailer/PHPMailer.php";
        require "phpMailer/SMTP.php";

        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'sanzidasultana822@gmail.com'; //SMTP username
            $mail->Password = 'zvrihssggixobrqz'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            );
            //Recipients
            $mail->setFrom('sanzidasultana822@gmail.com', 'Sanzida');
            $mail->addAddress($email); //Add a recipient

            $mail->From = 'sanzidasultana822@gmail.com';
            $mail->Sender = $email; //without it  mail goes in spam folder

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body = "Thanks<br>
            enter the code to verified your account $v_code
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
        exit();

    }

    public function checkVerified($email, $code)
    {
        $this->email = $email;
        $this->code = $code;

        $sql = "SELECT * FROM customers WHERE email = '$this->email' AND vCode = '$this->code'";
        //  echo $sql;
        //  exit();
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);

        if ($total > 0) {
            $row = mysqli_fetch_assoc($query);
            $update = "UPDATE customers set isVerified='1' where email='$this->email' ";
            $query1 = $this->connection->query($update);

            header('Location:../login.php');

        } else {
            //   echo "dfd";

            $_SESSION['msg'] = "আপনি ভুল তথ্য দিয়েছেন";
            // header('Location:../isVerified.php');

        }

    }

    public function userExist($email)
    {
        $this->email = $email;
        $sql = "SELECT * from customers where email='$this->email' AND isVerified='1'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        if ($total > 0) {
            $_SESSION['msg'] = "আপনার একাউন্টটি ইতিমধ্যে বিদ্যমান";

        }

    }

    public function insertCustomer($customerData)
    {
        $this->email = $customerData['email'];
        $this->name = $customerData['name'];
        $this->phone = $customerData['phone'];
        $this->password = $customerData['password'];
        $this->code = $customerData['vCode'];

        $sql = "SELECT * from customers where email='$this->email' AND isVerified='0'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        if ($total > 0) {
            $sql1 = "DELETE from customers where email='$this->email'";
            $query1 = $this->connection->query($sql1);

        }

        $sql3 = "
        INSERT INTO customers
        (customerName,email,phone,password,isVerified,vCode)
        VALUES ('$this->name','$this->email','$this->phone','$this->password','0','$this->code')";
        $query = $this->connection->query($sql3);
        // sendMail($this->email, $this->code);
        if ($query) {
            echo "<script>
           alert('আপনার ইমেইলে একটি ভেরিফিকেশন কোড পাঠানো হয়েছে');
           window.location.href = '../isVerified.php';
           </script>";
            //  header('Location:isVerified.php');
        } else {
            echo "<script>
        alert('');

        </script>";
        }

    }

    public function userForResetPass($email, $v_code)
    {
        $this->email = $email;
        $this->code = $v_code;
        $sql = "SELECT * from customers where email='$this->email' AND isVerified='1'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        if ($total > 0) {
            $sql1 = "UPDATE customers set vCode='$this->code' where email='$this->email'";
            $query = $this->connection->query($sql1);
            echo "<script>
            alert('আপনার ইমেইলে একটি ভেরিফিকেশন কোড পাঠানো হয়েছে');
            window.location.href = '../forgetpassverified.php';
            </script>";

        } else {
            $_SESSION['msg'] = "আপনার কোন একাউন্ট খুঁজে পাওয়া যায়নি।অনুগ্রহ করে সাইন আপ করুন ";

            header('Location:../registration.php');
        }

    }


    // public function verifiedPinCode($v_code)
    // {
    //     $this->code = $v_code;

    //     $sql = "SELECT email from customers where vCode='$this->code'";
    //     $query = $this->connection->query($sql);
    //     $total = mysqli_num_rows($query);
    //     if ($total > 0) {
    //         while ($row = mysqli_fetch_assoc($query)) {
    //             $email = $row['email'];

    //         }

    //         $update = "UPDATE customers set isVerified='1' where email='email' ";
    //         $query1 = $this->connection->query($update);

    //         header('Location:../login.php');
    //     }

    //     else {
    //         $_SESSION['msg'] = "আপনার পিন কোডটি সঠিক নয়";

    //         header('Location:../registration.php');

    //     }

    // }

    public function verifiedPinCode($v_code)
    {

        $this->code = $v_code;
        $email = $_SESSION['forget_email'];
        $sql = "SELECT * from customers where email='$email' and vCode='$this->code'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        if ($total > 0) {
            $update = "UPDATE customers set isVerified='1' where email='$email' ";
            $query1 = $this->connection->query($update);
            // unset($_SESSION['forget_email']);
            header('Location:../newGeneratePass.php');

        } else {
            $_SESSION['msg'] = "আপনার পিন কোডটি সঠিক নয়";
            header('Location:../forgetpassverified.php');

        }
    }


    
    public function newPasswordGenerate($npass){
        $this->password=$npass;
        $this->email=$_SESSION['forget_email'];
     $sql="UPDATE customers set password='$this->password' where email='$this->email'";
     $query = $this->connection->query($sql);
     unset($_SESSION['forget_email']);
     $_SESSION['msg']="আপনার পাসওয়ার্ড টি পরিবর্তন করা হয়েছে";


     header('Location:../login.php');
  


    }

}