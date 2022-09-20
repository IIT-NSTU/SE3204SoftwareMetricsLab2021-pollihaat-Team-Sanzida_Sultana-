<?php

interface Strategy
{
    public function action();
}

class UpdateCategory implements Strategy
{
    public $name;
    public $categoryPriviousName;
    public $image;
    //  public $id;
    public $connection;

    public function __construct($editData)
    {
        $this->name = $editData['name'];
        $this->categoryPriviousName = $editData['previous'];
        $this->image = $editData['image'];
        //   $this->id = $editData['id'];
        //  echo $this->id;
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();

    }
    public function action()
    {
        $sql = "UPDATE categories SET name='$this->name', image='$this->image' where name='$this->categoryPriviousName'";

        $query = $this->connection->query($sql);

        header("Location:../category.php");
        $_SESSION['msg'] = "ক্যাটাগরিটি সফলভাবে আপডেট করা হয়েছে";

    }
}

class DeleteCategory implements Strategy
{
    public $name;
    public $connection;
    public function __construct($name)
    {
        $this->name = $name;

        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }
    public function action()
    {
        $sql = "DELETE  from categories where name='$this->name'";
        echo $sql;
        $query = $this->connection->query($sql);

        header("Location:../category.php");
        $_SESSION['msg'] = "ক্যাটাগরিটি সফলভাবে মুছে ফেলা হয়েছে";
    }

}

class ManageCategory
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