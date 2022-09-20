<?php

class OrderDetails
{
    private $orderId;
    private $customerId;
    private $productId;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }
    public function showOrder()
    {

        // $sql = "SELECT * from customer_order join order_details on customer_order.orderId=order_details.orderId on customer on customer_order.customerId=customers.Id";
        // echo $sql;
        // exit();
        //   SELECT * from customer_order join order_details on customer_order.orderId=order_details.orderId join customers on customer_order.customerId=customers.Id;
        // $sql = "SELECT * from customer_order join customers on customer_order.customerId=customers.id";

        $sql = "SELECT * from customer_order";
        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }

            return $array;

        }

    }

    public function getProductDetailsByOrderId($orderId)
    {
        $this->orderId = $orderId;
        $sql = "SELECT * from order_details join products on order_details.productsId=products.id where orderId='$this->orderId'";
        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }

            return $array;

        }

    }

    public function getCustomerByOrderId($orderId)
    {
        $this->orderId = $orderId;
        $sql = "SELECT * from customer_order join customers on customer_order.customerId=customers.id where orderId='$this->orderId'";
        $query = $this->connection->query($sql);
        $array = array();

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }

            return $array;

        }

    }

    public function getEntrepreneurByProductId()
    {

    }

    public function checkCustomerBuyingProduct($productId, $customerId)
    {
        $this->customerId = $customerId; //method for feedback
        $this->productId = $productId;
        $result = false; //first stoe the all order id of a customer
        //  $th
        $sql = "SELECT  customer_order.orderId from customer_order where customerId='$this->customerId' AND isDelivered='1' ";
        $orderData = array();
        $query = $this->connection->query($sql);

        $index = 0;
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $orderData[$index] = $row['orderId'];
                $index = $index + 1;

            }
            // print_r($orderData);
            // exit();
            // return $userdata;

        }

        $index1 = 0;
        $productData = array();
        foreach ($orderData as $id) {
            $sql1 = "SELECT productsId from order_details where orderId=$id";

            $query1 = $this->connection->query($sql1);

            $index1 = 0;
            if ($query->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($query1)) {
                    $productData[$index1] = $row['productsId'];
                    echo $productData[$index1];

                    if ($productData[$index1] == $this->productId) {
                        $result = true;
                        // echo $productData[$index1];
                        //    break;
                        return $result;

                    }

                }

                // print_r($userdata);
                // exit();
                // return $userdata;

            }

        }
        return $result;
    }

}