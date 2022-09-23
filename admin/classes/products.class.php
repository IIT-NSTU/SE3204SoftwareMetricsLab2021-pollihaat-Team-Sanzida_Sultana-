<?php
class Products
{
    public $name;

    public $connection;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();

    }

    public function getProductByCategoryName($name)
    {
        // $this->name = $name;
        $sql = "SELECT * from products where category='$name' order by products.id desc LIMIT 8 ";

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

    public function searchProduct($name)
    {
        $sql = "SELECT * from products where products.name LIKE '%$name%' or products.description LIKE '%$name%' or products.category LIKE '%category%'";

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
    public function selectProduct()
    {
        $sql = "SELECT * FROM products order by products.id desc;";
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
    public function selectSpecificProduct($limit, $type)
    {
        if ($type = "latest") {
            $sql = "SELECT * FROM products order by id desc limit $limit ";

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

    public function selectEntrepreneurProduct($name)
    {
        $sql = "SELECT * FROM products where entrepreneurName='$name' ";
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
    public function productDuplicate($productName, $entrepreneurName)
    {
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from products where name='$productName' ANd entrepreneurName='$entrepreneurName'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);
        if ($query->num_rows > 0) {
            //echo header("Location:../category.php");
            $_SESSION['msg'] = "পণ্যটি ইতিমধ্যে আপনি আপলোড করেছেন";

        }

    }

    public function productEdit($id)
    {
        // $category_name = $this->connection->escape_string($name);
        $sql = "SELECT * from products WHERE id= '$id' LIMIT 1";
        $result = $this->connection->query($sql);
        // print_r($result);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }

    }
    public function insertProduct($productData)
    {
        $name = $productData['name'];
        $image = $productData['image'];
        $quantity = $productData['quantity'];
        $description = $productData['desc'];
        $price = $productData['price'];
        $entrepreneur_name = $productData['entrepreneur'];
        $category = $productData['category'];
        $productType = $productData['productType'];

        $sql = "
        INSERT INTO products
        (name, image,quantity,description,price,entrepreneurName,category,productType)
        VALUES ('$name','$image','$quantity','$description','$price','$entrepreneur_name','$category','$productType')";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "পণ্যটি সফলভাবে যোগ হয়েছে";
    }

    public function getProductCat($id)
    {
        $sql = "SELECT category from products where id='$id'";
        $result = $this->connection->query($sql);
        //  $row=mysqli_fetch_assoc($result);

        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            $value = $data['category'];

            return $value;
            exit();
        } else {
            return false;
        }

    }
    public function getProductById($id)
    {
        $sql = "SELECT * from products where id=$id";
        $query = $this->connection->query($sql);
        //  $row=mysqli_fetch_assoc($result);

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

    public function countProduct()
    {
        $sql = "SELECT * FROM products";
        $query = $this->connection->query($sql);
        $total = mysqli_num_rows($query);
        return $total;

    }

    public function quantityUpdate($id, $qty)
    { //when order placed quantity deducted from products

        $sql = "SELECT quantity from products where id =$id";
        $query = $this->connection->query($sql);
        $array = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row['quantity'];

            }
            //  print_r($array);
            //$sql = "UPDATE products  SET quantity='$this->name', email='$this->email' where id='$this->id' AND role=''1";

        }
        foreach ($array as $ar) {
            $updateQty = $ar - $qty;
            $sql1 = "UPDATE products  SET quantity=$updateQty where id=$id";
            $query = $this->connection->query($sql1);

        }

    }

    public function checkProductQuantity($pid, $qty, $customer)
    {

        // echo $pid;
        // exit();
        $sql = "SELECT * from cart join products on cart.pid=products.id where cart.pid=$pid  AND customerId='$customer'"; //for cart quantity before order placed
        $query = $this->connection->query($sql);

        $array = array();
        //  $array1 = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                //  if ($row['quantity'] == 0) {
                //     $sql1 = "DELETE * from cart where qty='$'row[quantity]' and pid=$pid";
                //          $query = $this->connection->query($sql1);

                //  }

                //  echo $row['id'];
                $array[] = $row['quantity'];

                if ($row['quantity'] < $qty) {
                    echo $qty;
                    // echo $row['pid'];
                    echo "<br>";
                    echo $row['quantity'];
                    //  exit();
                    $_SESSION['msg'] = "পণ্যের পরিমাণ সর্বোচ্চ পরিমাণ সাপেক্ষে পরিবর্তন করুন " . "";

                }
                //   $msg = " আপডেট করুন";

            }
            // print_r($array);
            // exit();

        }

        // foreach ($array as $productqty) {
        //     //  echo $productqty;
        //     //    echo $qty;
        //     // exit();
        //     if ($productqty < $qty) {
        //         $_SESSION['msg'] = "পণ্যের পরিমাণ সর্বোচ্চ পরিমাণ সাপেক্ষে পরিবর্তন করুন";
        //         echo $qty;
        //         exit();

        //     }

        // }

    }

    public function getProductByMultipleIds($productArray)
    {
        //  var_dump($productArray);
        // exit();
        $sql = "SELECT * from products where id in($productArray)";
        $query = $this->connection->query($sql);
        //  $row=mysqli_fetch_assoc($result);

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

}