<?php
class customerOrder
{

    // private $transaction;
    private $customerId;
    private $pId;
    private $orderedQuantity;
    private $totalPrice;
    private $date;
    private $orderId;
    private $productPrice;

    #private $imgName;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function insertCustomerOrder($customerId, $date)
    {
        $this->customerId = $customerId;
        $this->date = $date;
        //  $this->totalPrice = $total_price;
        $sql = "INSERT into customer_order (customerId,placedOn)
     VALUES ('$this->customerId','$this->date')";
        $query = $this->connection->query($sql);

        $sql1 = "SELECT orderId from customer_order where placedOn ='$this->date' AND customerId='$this->customerId'";
        $query1 = $this->connection->query($sql1);
        if ($query1->num_rows > 0) {
            $row = mysqli_fetch_assoc($query1);
            $_SESSION['orderId'] = $row['orderId'];

            //    echo $_SESSION['orderId'];

        }

    }
    public function insertOrderDetails($orderId, $productsId, $orderedQuantity, $productsPrice)
    {
        $this->orderId = $orderId;
        $this->productsId = $productsId;
        $this->orderedQuantity = $orderedQuantity;
        $this->productPrice = $productsPrice;
        $sql = "INSERT into order_details  (orderId,productsId,orderedQuantity,productsPrice)
      VALUES ('$this->orderId','$this->productsId','$this->orderedQuantity','$this->productPrice')";
        $query = $this->connection->query($sql);
        $_SESSION['msg'] = "আপনার অর্ডার টি গ্রহণ করা হয়েছে ।";

    }

    public function deleteCart($customer_id)
    {
        $deleteCart = "DELETE from cart where customerId='$this->customerId'";
        $query1 = $this->connection->query($deleteCart);

    }

    public function getCustomerOrder($customerId)
    {
        $sql = "SELECT * from customer_order where customerId='$customerId'";
        $query = $this->connection->query($sql);

        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row['orderId'];

            }
            return $array;

        }
        // foreach ($array as $ar) {
        //     echo $ar;

        //     $sql1 = "SELECT * from order_details join products on order_details.productsId=products.id where order_details.orderId=$ar";

        //     $query1 = $this->connection->query($sql1);

        //     $array1 = array();

        //     if ($query1->num_rows > 0) {
        //         while ($row = mysqli_fetch_assoc($query1)) {
        //             $array1[] = $row;

        //         }
        //         //   print_r($array);
        //         return $array1;
        //         #  print_r($array);
        //     }

        // }

    }
    public function getCustomerProduct($orderId)
    {
        //  echo $orderId;

        $sql1 = "SELECT * from order_details join products on order_details.productsId=products.id where order_details.orderId=$orderId";
        //  echo $sql1;
        //exit();
        $query1 = $this->connection->query($sql1);

        $array1 = array();

        if ($query1->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query1)) {
                //echo "ds";
                //exit();
                $array1[] = $row;

            }
            //   print(count($array1));
            //   print_r($array);
            return $array1;
            #  print_r($array);
        }

    }

    public function getReceiveOrnot($orderId)
    {
        $sql = "SELECT * from customer_order where orderId=$orderId";
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

    // public function DeliverOrNot($orderId)
    // {
    //     $sql = "SELECT * from customer_order where orderId=$orderId";
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

}
