<?php
include_once 'DbConnection.class.php';

class User
{
    public $connection;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function check_login($email, $password)
    {

        $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password' AND isVerified='1'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);

        if ($total > 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['gmail'] = $row['email'];
            $_SESSION['cus_id'] = $row['id'];
            $_SESSION['customer_name'] = $row['customerName'];
            //  echo $_SESSION['cus_id'];

            //    exit();
            return true;
        } else {
            return false;
        }
    }

    // public function details($sql)
    // {

    //     $query = $this->connection->query($sql);

    //     $row = $query->fetch_array();

    //     return $row;
    // }

    public function escape_string($value)
    {
        if ($value != '') {
            $value = trim($value);
            return $this->connection->real_escape_string($value);
        }
    }

    public function isOwner()
    {
        if ($_SESSION['role'] == 1) {
            // echo $_SESSION['role'];
            //  echo "DFDF";
            //    exit();
            header("Location:../admin/product.php");

        }
        //   echo $_SESSION['role'];
        //  echo "dfdf";

    }
}