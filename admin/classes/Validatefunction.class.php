<?php
class Validatefunction
{

    public $connection;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function escape_string($value)
    {
        if ($value != '') {
            $value = trim($value);

            // $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value);
            $string1 = preg_replace('/\s+/', ' ', $value);
            return $this->connection->real_escape_string($string1);
            //   return $this->conn->real_escape_string($string);
        }
    }

    public function isOwner()
    {
        if ($_SESSION['role'] == 0) {
            // echo $_SESSION['role'];
            //  echo "DFDF";
            //    exit();
            header("Location:../admin/product.php");

        }
        //   echo $_SESSION['role'];
        //  echo "dfdf";

    }

    public function isEntrepreneur()
    {

        if ($_SESSION['role'] == 1) {

            header("Location:../product.php");

        }

    }
}