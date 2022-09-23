<?php

interface Strategy
{
    public function action();
}

class UpdateProduct implements Strategy
{
    public $name;
    public $image;
    public $quantity;
    public $desc;
    public $price;
    public $id;
    public $category;
    public $entrepreneur;
    public $connection;
    public $productType;

    public function __construct($editData)
    {
        $this->name = $editData['name'];
        $this->image = $editData['image'];
        $this->quantity = $editData['quantity'];
        $this->desc = $editData['desc'];
        $this->price = $editData['price'];
        $this->entrepreneur = $editData['entrepreneur'];

        $this->id = $editData['id'];
        $this->category = $editData['category'];
        //  echo $this->id;
        $this->productType = $editData['productType'];
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
        echo $this->category;

    }
    public function action()
    {
        $sql = "UPDATE products SET name='$this->name', image='$this->image',quantity='$this->quantity',
        description='$this->desc',price='$this->price',entrepreneurName='$this->entrepreneur',category='$this->category',
        productType='$this->productType'
        where id='$this->id'";
        echo $sql;
        $query = $this->connection->query($sql);

        header("Location:../product.php");
        $_SESSION['msg'] = "পণ্যটি সফলভাবে আপডেট করা হয়েছে";

    }
}

class DeleteProduct implements Strategy
{
    public $id;
    public $connection;
    public function __construct($id)
    {
        $this->id = $id;
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }
    public function action()
    {
        $sql = "DELETE  from products where id='$this->id'";

        $query = $this->connection->query($sql);

        header("Location:../product.php");
        $_SESSION['msg'] = "পণ্যটি সফলভাবে মুছে ফেলা হয়েছে";
    }

}

class ManageProduct
{
    public $strategy;
    public function __construct(Strategy $str)
    {
        $this->strategy = $str;
    }
    public function executeAction()
    {
        return $this->strategy->action();
    }

}