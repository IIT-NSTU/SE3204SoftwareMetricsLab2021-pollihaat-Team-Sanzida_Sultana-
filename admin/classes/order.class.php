<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Order
{
    private $pId;
    private $cId;
    private $oId;
    private $entrepreneur;
    private $quantity;
    private $price;
    private $isPending;
    private $isReceived;
    private $isDelivered;
    private $transaction;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function getCustomerMailandName($orderId)
    { //forsending mail
        $this->oId = $orderId;
        $sql = "SELECT * from customer_order join customers on customer_order.customerId=customers.id WHERE orderId='$this->oId'";

        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($array, $row['email']);
                array_push($array, $row['customerName']);

            }

        }
        return $array;
    }

    public function getOrder()
    {
        // $sql = "SELECT * FROM orders join products  on orders.productsId=products.id Order by orders.placedOn desc";

        $sql = "SELECT * FROM orders join products  on orders.productsId=products.id";

        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }
            //   print_r($array);
            return $array;
            #  print_r($array);
        }

    }

    public function getProductById($productsId)
    {
        // print_r($productsId);
        foreach ($productsId as $id) {

            $sql = "SELECT * from products where id='$id'";

            $query = $this->connection->query($sql);
            if ($query->num_rows > 0) {
                $row = mysqli_fetch_assoc($query);
                $products[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'type' => $row['productType'],

                );

            }

        }
        return $products;
    }

    public function getCustomerDetails($customerId)
    {
        // print_r($productsId);

        $sql = "SELECT * from customers where id='$customerId'";

        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }
            return $array;
        }

    }

    public function getEntrepreneur($productsId)
    {
        foreach ($productsId as $id) {

            $sql = "SELECT * from products where id='$id'";

            $query = $this->connection->query($sql);
            if ($query->num_rows > 0) {
                $row = mysqli_fetch_assoc($query);
                $entrepreneur[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'entrepreneur' => $row['entrepreneurName'],

                );

            }

        }
        return $entrepreneur;

    }
    public function getProductPrice($productsId, $quantity)
    {
        $count = 0;

        foreach ($productsId as $id) {

            $sql = "SELECT * from products where id='$id'";

            $query = $this->connection->query($sql);
            if ($query->num_rows > 0) {
                //   print_r($quantity[$count]);
                // echo "dfdf";
                $row = mysqli_fetch_assoc($query);

                $productPrice[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'] * $quantity[$count],

                );
                $count = $count + 1;
            }

        }

        return $productPrice;

    }

    public function deleteOrder($id)
    {
        echo $id;

        $sql = "DELETE from customer_order where orderId=$id";
        echo $sql;
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "অর্ডারটি মুছে ফেলা হয়েছে";

    }

    //for update order receive or deliver
    public function editOrder($editData)
    {
        $received = $editData['isReceived'];
        //  echo $received;
        $orderId = $editData['oId'];
        //  echo $orderId;
        $delivered = $editData['isDelivered'];
        // print_r($editData);

        $sql = "UPDATE customer_order set isReceived='$received' , isDelivered='$delivered' where orderId=$orderId";

        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "অর্ডারটি আপডেট করা হয়েছে";

    }

    public function totalOrder()
    {
        $sql = "SELECT * from customer_order";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;
    }

    public function OrderPending()
    {
        $sql = "SELECT * from customer_order where isReceived=0";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;
    }

    public function orderDelivery()
    {
        $sql = "SELECT * from customer_order where isDelivered=1";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;
    }

    public function sendMail($customerDetails, $v_code, $oid)
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
            $mail->addAddress($customerDetails[0]); //Add a recipient

            $mail->From = 'sanzidasultana822@gmail.com';
            $mail->Sender = $customerDetails[0]; //without it  mail goes in spam folder

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = "Your package is ready for collection ($oid)";
            $mail->Body = "<b>Hi $customerDetails[1]</b>,
            Item(s) from your order  #$oid is now ready for pick up at Bibi Khadija hall, with the details listed below, present your One Time Password (OTP) $v_code to collect it. Please only share the OTP
            and with the agent at the pick-up point.
            <br>
            <br>



            <b>প্রিয় গ্রাহক $customerDetails[1]</b><br>
            নিম্নে বর্ণিত তালিকা সহ, আপনার অর্ডারের #$oid পণ্য (গুলো) বিবি খাদিজা হল থেকে পিকআপ করার জন্য প্রস্তুত আছে, আপনার One Time Password (OTP) $v_code দেখাবেন কালেক্ট করার জন্য, অনুগ্রহ করে পিকআপ পয়েন্টের এজেন্টের সাথে শুধু OTP শেয়ার করবেন।
            <br>
            <br>

            <b>What's next </b><br><br>
            <ul>
            <li>Please collect your package within 3 days from the inbound day.</li>
            <li>Please have your One Time Password (OTP) code ready for verification.</li>


            </ul>
            <b>Thank you for shopping with us.</b></br></br>
<br>
<br>
            <ul>
            <li> অনুগ্রহ করে প্যাকেজ আসার দিন থেকে ৩ দিনের মধ্যে কালেক্ট করবেন।</li>
            <li>আপনার One Time Password (OTP) কোডটি অনুগ্রহ করে প্রস্তুত রাখবেন ভেরিফিকেশনের জন্য।</li>


            </ul>
            <br>
            <br>
            <b>ধন্যবাদ পল্লীহাট এর সাথে থাকার জন্য।</b>


            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
        exit();

    }

}