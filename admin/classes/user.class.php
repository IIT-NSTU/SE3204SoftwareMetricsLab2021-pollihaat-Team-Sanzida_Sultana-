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

    public function check_login($username, $password)
    {

        $sql = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);

        if ($total > 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['role'] = $row['role'];

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
            echo $_SESSION['role'];

            header("Location:../admin/product.php");

        }
        //   echo $_SESSION['role'];
        //  echo "dfdf";

    }

    public function isEntrepreneur()
    {

        if ($_SESSION['role'] == 0) {
            echo $_SESSION['role'];

            header("Location:../admin/admin_home.php");

        }
        //   echo $_SESSION['role'];
        //  echo "dfdf";

    }

}
