<?php

// $user = new User();
class Entrepreneur
{
    public $connection;
    public $user;
    public $entrepreneur_name;
    // public $entrepreneur_id;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }
    // public function EntrepreneurDuplicate($data)
    // {
    //     $this->entrepreneur_name = $data["name"];
    //     $this->id = $data["id"];

    //     $name = $this->connection->escape_string($this->name);
    //     $id = $this->connection->escape_string($this->id);
    //     $sql = "SELECT * from admin_users where username='$name' And role='1'";
    //     $query = $this->connection->query($sql);
    //     $check = mysqli_fetch_assoc($query);

    //     if ($query->num_rows > 0) {
    //         //echo header("Location:../category.php");
    //         $_SESSION['msg'] = "Entrepreneur already exists";

    //         header("Location:../manageEntrepreneur.php?edit&id=$id");
    //         exit();
    //     }

    // }
    // public function insertEntrepreneur($data)
    // {
    //     // $user . escape_string($name);
    //     // $name = $this->connection->escape_string($this->entrepreneur_name);
    //     $name =
    //     $msg = '';
    //     // $sql = "SELECT * from categories where name='$name'";
    //     // // echo $sql;
    //     // $query = $this->connection->query($sql);
    //     // $check = mysqli_fetch_assoc($query);

    //     // if ($query->num_rows > 0) {
    //     //     //echo header("Location:../category.php");
    //     //     $_SESSION['msg'] = "category already exists";
    //     //     return;

    //     // } else {
    //     $sql = "
    //     INSERT INTO admin_users
    //     (username, password,role,email,mobile,statues)
    //     VALUES ('" . $image . "', '" . $name . "')";
    //     $query = $this->connection->query($sql);
    //     $_SESSION['msg'] = "category added successfully";

    // }
    public function selectEnrepreneur()
    {
        $sql = "SELECT * FROM admin_users Where role=1";
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

    public function countEntrepreneur()
    {
        $sql = "SELECT * FROM admin_users where role=1";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;

    }

    public function EntrepreneurEdit($name)
    { //return previous details of a form {
        // $category_name = $this->connection->escape_string($name);
        $sql = "SELECT * from admin_users WHERE username= '$name' AND role=1 LIMIT 1";
        $result = $this->connection->query($sql);
        // print_r($result);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function EntrepreneurDelete($name)
    {
        $sql = "DELETE  from admin_users where username='$name' and role='1'";

        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "উদ্দ্যোক্তার একাউন্টটি সফলভাবে মুছে ফেলা হয়েছে";

        header("Location:../entrepreneur.php");
        exit();

    }

    // public function getEntrepreneurName($product_id)
    // {
    //     $sql = "SELECT entrepreneurName from products where ";

    // }

}
