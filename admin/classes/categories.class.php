<?php

// $user = new User();
class Categories
{
    public $connection;
    public $user;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function categoryDuplicate($name)
    {
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from categories where name='$name'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {
            //echo header("Location:../category.php");
            $_SESSION['msg'] = "ক্যাটাগরিটি ইতিমধ্যে আপনি যোগ করেছেন";

            //header("Location:../manageCategory.php?edit&name=$name");
            // exit();
        }

    }
    public function categoryDuplicateEdit($name)
    {
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from categories where name <>'$name'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($name == $row['name']) {
                    //echo header("Location:../category.php"); {
                    $_SESSION['msg'] = "ক্যাটাগরিটি ইতিমধ্যে আপনি যোগ করেছেন";

                }}

            //header("Location:../manageCategory.php?edit&name=$name");
        } // exit();
    }

    public function insertCat($name, $image)
    {
        // $user . escape_string($name);
        // $name = $this->connection->escape_string($name);

        $sql = "
        INSERT INTO categories
        (image, name)
        VALUES ('" . $image . "', '" . $name . "')";
        $query = $this->connection->query($sql);
        $_SESSION['msg'] = "ক্যাটাগরিটি সফলভাবে সিস্টেমে যোগ হয়েছে";

    }
    public function selectCat()
    {
        $sql = "SELECT * FROM categories";
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

    public function getCategoriesLimit($limit, $type)
    {
        if ($type = "latest") {
            $sql = "SELECT * FROM categories order by id desc limit $limit ";

        }
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

    public function CategoryEdit($name)
    {
        // $category_name = $this->connection->escape_string($name);
        $sql = "SELECT * from categories WHERE name= '$name' LIMIT 1";
        $result = $this->connection->query($sql);
        // print_r($result);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function getCategories()
    { //for product category select
        $sql = "SELECT * from categories";
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

    public function countCategory()
    {
        $sql = "SELECT * FROM categories";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;

    }

}

?>

<?php
// interface Image
// {
//     public function imageSizeCheck();
//     public function imageFormatCheck($file);
// }

// class ValidImage implements Image
// {
//     public $invalid = false;
//     // protected $file;
//     public function imageFormatCheck($file)
//     {
//         $this->invalid = true;

//     }

//     public function imageSizeCheck()
//     {
//         $this->invalid = true;
//     }

// }

// #$image->imageFormatCheck("kk");

// class proxyImage implements Image
// {

//     public $image;
//     public $invalid = true;

//     public function __construct()
//     {
//         $this->image = new ValidImage();
//     }

//     public function imageFormatCheck($file)
//     {

//         if ($_FILES['category_image']['type'] != '' && $_FILES['category_image']['type'] != 'image/jpeg' && $_FILES['category_image']['type'] != 'image/png' && $_FILES['category_image']['type'] != 'image/jpg') {
//             // print_r($file);
//             $_SESSION['msg'] = "please select only jpg,jpeg or png format";
//             $this->invalid = false;

//         } else {
//             $this->image->imageFormatCheck($file);

//         }
//     }

//     public function imageSizeCheck()
//     {
//         if ($_FILES['category_image']['size'] != '' && $_FILES['category_image']['size'] > 400000) {
//             $_SESSION['msg'] = "Please select image less than 4mb";
//             echo $_FILES['category_image']['size'];
//             $this->invalid = false;

//         } else {
//             $this->image->imageSizeCheck();

//         }
//     }

//s }
?>