<?php

class Review
{

    private $customerId;
    private $productId;
    private $rating;
    private $review;
    private $date;
    private $id;
    private $name;

    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function getReview($product_id)
    {
        $this->productId = $product_id;

        $sql = "SELECT * FROM review  join products ON review.productId='$this->productId' and products.id='$this->productId' join customers ON review.customerId=customers.id order by review.placedOn desc";

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

    public function getAllReview()
    {
        $sql = "SELECT * from review join products ON review.productId=products.id join customers ON review.customerId=customers.id order by review.placedOn desc";

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

    public function getAllOrderByCustomerId($customerId)
    {
        $this->customerId = $customerId;

        $sql = "SELECT orders.productsId FROM orders  where cId='$this->customerId'";

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
        // print_r($array);
        // exit();

    }
    public function deleteReview($id)
    {
        $this->id = $id;
        $sql = "DELETE from review where reviewId ='$this->id'";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "প্রতিক্রিয়াটি সফলভাবে মুছে ফেলা হয়েছে";

    }

//     public function checkCustomerBuyProduct($AllProducts, $buyingproductId)
//     {
//         $this->productId = $buyingproductId;
//         $this->productsId = $AllProducts;
//         print_r($AllProducts);
//         var_dump($AllProducts);
//         exit();
//         foreach ($AllProducts as $all) {
//             if ($all == $buyingproductId) {

//                 return true;
//                 break;
//             }

//         }
//         return false;
//     }
//     // if (in_array($buyingproductId, $AllProducts)) {
//     //     return true;
//     // }

    public function getEntrepreneurProductReview($name)
    {
        $this->name = $name;
        $sql = "SELECT * from review join products ON review.productId=products.id join customers ON review.customerId=customers.id And entrepreneurName='$this->name'order by review.placedOn desc";
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

    public function insertReview($reviewData)
    {
        $this->customerId = $reviewData['cId'];
        $this->productId = $reviewData['pId'];
        $this->rating = $reviewData['rating'];
        $this->review = $reviewData['review'];
        $sql = "
    INSERT INTO review
    (customerId, productId,rating,feedback)
    VALUES ('$this->customerId','$this->productId','$this->rating','$this->review')";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "ধন্যবাদ আপনার মূল্যবান মতামত দেওয়ার জন্য";

    }

}
