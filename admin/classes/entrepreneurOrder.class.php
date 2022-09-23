<?php

class EntrepreneurOrder
{
    private $orderId;
    private $customerId;
    private $productId;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function showOrder($orderId, $name)
    {

        $sql1 = "SELECT * from order_details join products on order_details.productsId=products.id where orderId=$orderId AND products.entrepreneurName='$name'";

        $query1 = $this->connection->query($sql1);
        $array = array();
        if ($query1->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query1)) {

                $array[] = $row;

            }

        }
        return $array;

        // exit();

    }

    public function getOrder()
    {
        $sql = "SELECT * from customer_order order by placedOn desc ";
        $query = $this->connection->query($sql);
        $array = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;

            }

            return $array;
        }
    }

    // public function getDate($orderId)
    // {
    //     $sql = "SELECT *from order_details join customer_order on order_details.orderId=customer_order.orderId where customer_order.orderId=$orderId  ";
    //     $query = $this->connection->query($sql);
    //     $array = array();
    //     if ($query->num_rows > 0) {
    //         while ($row = mysqli_fetch_assoc($query)) {
    //             $array[] = $row['placedOn'];

    //         }
    //         print_r($row['placedOn']);

    //         return $array;
    //     }

    // }

    public function getDate($id)
    {
        $sql = "SELECT * from customer_order where orderId='$id'";
        echo $sql;
        exit();
        $query = $this->connection->query($sql);
        $array = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row['placedOn'];

            }
            print_r($row['placedOn']);

            return $array;
        }

    }
}