<?php

class Invoice
{
    private $oid;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function getCustomerInfo($oid)
    {
        $this->oid = $oid;

        $sql = "SELECT * from customers join customer_order on customer_order.customerId=customers.id where customer_order.orderId='$this->oid'";
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

}
