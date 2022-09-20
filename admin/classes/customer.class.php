<?php

class Customer
{
    private $cId;
    private $customerName;
    private $mobile;
    private $gmail;
    public $connection;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function getCustomer()
    {
        //   $this->productId = $product_id;

        $sql = "SELECT * from customers";

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
    public function countCustomer()
    {
        $sql = "SELECT * FROM customers";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;

    }

}