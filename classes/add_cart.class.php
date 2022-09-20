<?php

class Add_cart
{

    public $connection;
    public $pid;

    public $productName;
    public $price;
    public $image;
    public $customerID;
    public $quantity;
    public $CartId;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function checkDuplicate($pid, $cid)
    {
        $this->pid = $pid;

        $this->customerID = $cid;
        // echo $this->pid;
        // echo $this->id;
        // exit();
        $sql = "SELECT * from cart where pid='$this->pid' and customerId='$this->customerID'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {
            //echo header("Location:../category.php");
            $_SESSION['msg'] = "পণ্যটি ইতিমধ্যে আপনি কার্টে যোগ করেছেন";
            echo $_SESSION['msg'];

            //header("Location:../manageCategory.php?edit&name=$name");
            // exit();
        }

    }

// public function getCustomerCartItems($customer_id){
//     $this->customerID=$customer_id;
//     $sql="SELECT * from cart where customerId = '$this->customerID'";
//     $query = $this->connection->query($sql);
//     $array = array();

//     if ($query->num_rows > 0) {
//         while ($row = mysqli_fetch_assoc($query)) {
//             $array[] = $row;

//         }
//         //   print_r($array);
//         return $array;
//         #  print_r($array);
//     }

// }

    public function deleteAllFromCart($customer_id)
    {
        $this->customerID = $customer_id;

        $sql = "DELETE from cart where customerId=$this->customerID";
        $query = $this->connection->query($sql);
        $_SESSION['msg'] = "কার্টের সমস্ত পণ্য মুছে ফেলা হয়েছে";

    }

    public function GetAllValues($Cid)
    {
        $this->customerID = $Cid;
        $sql = "SELECT * from cart JOIN products where cart.pid=products.id and customerId=$this->customerID";
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
    public function getCart($cid)
    {
        $sql = "SELECT * from cart where customerId=$cid";
        $query = $this->connection->query($sql);
        $array = array();
        //   $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }
            //     print_r($array);
            //    exit();
            return $array;
            #  print_r($array);
        }

    }

    public function updateCart($CartId, $quantity)
    {
        $this->quantity = $quantity;
        $this->CartId = $CartId;
        $sql = "UPDATE cart set qty='$this->quantity' where cartId='$this->CartId'";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "কার্ট আপডেট করা হয়েছে";

    }

    public function insertCart($data)
    {
        $this->customerID = $data['cusId'];

        $this->pid = $data['pid'];
        $this->quantity = $data['qty'];
        // $this->productName = $data['productName'];
        //  $this->image = $data['image'];
        // $this->price = $data['price'];
        $sql = "
        INSERT INTO cart
        (customerId, pid,qty)
        VALUES ('$this->customerID','$this->pid','$this->quantity')";
        $query = $this->connection->query($sql);
        $_SESSION['msg'] = 'পণ্যটি কার্টে যোগ করা হয়েছে';

    }

    public function deleteCart($cartId)
    {
        $this->CartId = $cartId;
        $sql = "DELETE from cart where cartId =$this->CartId";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "কার্ট থেকে পণ্যটি মুছে ফেলা হয়েছে";

    }

    public function TotalCartItem($customer_id)
    {
        $this->customerID = $customer_id;
        $sql = "SELECT * from cart where customerId=$this->customerID";
        $query = $this->connection->query($sql);
        $row = mysqli_fetch_all($query);
        $count = mysqli_num_rows($query);
        return $count;

    }

    public function getAllDetailsPrice($customer_id)
    {
        // $this->customerID=$customer_id;
        // $sql="SELECT "

    }

    public function deleteProductzeroQuantity()
    {

        $sql = "SELECT * from products where products.quantity=0";
        $query = $this->connection->query($sql);

        $array = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                //   if ($row['quantity'] == 0) {

                $array[] = $row['id'];
                //     }
                //     $array[] = $row['quantity'];

            }
            print_R($array);
            //  exit();

        }

        foreach ($array as $pid) {
            $sql1 = "DELETE from cart where pid=$pid ";
            $query = $this->connection->query($sql1);

        }

        // $sql = "DELETE from cart join products on cart.pid=products.id where products.quantity=0";

        // $query = $this->connection->query($sql);

    }

    public function cartNotification($customerId)
    {

        $sql = "SELECT * FROM cart";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;

    }

}
