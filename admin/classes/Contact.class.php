<?php

class Contact
{
    private $name;
    private $email;
    private $mobile;
    private $comment;
    private $added_on;

    public $connection;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();
    }

    public function selectContact()
    {
        $array = array();
        $sql = "SELECT * FROM contact_us order by added_on desc";
        $result = $this->connection->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
    public function deleteContact($id)
    {
        $id = $this->connection->escape_string($_GET['id']);
        $sql = "DELETE FROM  contact_us WHERE id ='$id'";
        $result = $this->connection->query($sql);
        header("Location:../contact.php");
        die();
    }

    public function insertContact($contactData)
    {

        $this->name = $contactData['name'];
        $this->email = $contactData['email'];
        $this->mobile = $contactData['mobile'];
        $this->comment = $contactData['comment'];
        $this->added_on = $contactData['date'];

        $sql = "
        INSERT INTO contact_us
        (name, email,mobile,comment,added_on)
        VALUES ('$this->name','$this->email','$this->mobile','$this->comment','$this->added_on')";
        $query = $this->connection->query($sql);

        $_SESSION['msg'] = "আপনার মেসেজটি গ্রহণ করা হয়েছে। শিঘ্রই আপনাকে ফোন করা হবে।ধন্যবাদ";

    }
}