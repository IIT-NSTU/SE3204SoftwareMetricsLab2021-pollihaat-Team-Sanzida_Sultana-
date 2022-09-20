<?php
include_once 'DbConnection.class.php';

class EntrepreneurDetailsCheck
{
    private $name;
    private $mobile;
    private $gmail;
    private $password;
    #private $imgName;

    public function __construct($entrepreneurDetails)
    {
        $this->name = $entrepreneurDetails['name'];
        $this->gmail = $entrepreneurDetails['gmail'];
        $this->mobile = $entrepreneurDetails['mobile'];
        $this->password = $entrepreneurDetails['password'];

        #$this->imgName = $imgName;
        //   echo $this->type;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getGmail()
    {
        return $this->gmail;
    }
    public function getMobile()
    {
        return $this->mobile;
    }
    public function getPassword()
    {
        return $this->password;
    }

}

abstract class EntrepreneurHandler
{
    public $insert;
    public $connection;

    public function __construct()
    {

        $insert = new Entrepreneur();
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();

    }
    public $handler;

    public function setNextHandler(EntrepreneurHandler $handler)
    {
        $this->handler = $handler;

    }
    abstract public function processDetails(EntrepreneurDetailsCheck $details);

}

class UsernameCheck extends EntrepreneurHandler
{
    public function processDetails(EntrepreneurDetailsCheck $details)
    {

        $name = $details->getName();
        // $id = $this->connection->escape_string($this->id);
        $sql = "SELECT * from admin_users where username='$name'";
        // echo $sql;

        $query = $this->connection->query($sql);
        # $check = mysqli_fetch_assoc($query);
        if ($query->num_rows == 0) {
            // echo $name;
            // echo $name;
            $this->handler->processDetails($details);
        } else {
            $_SESSION['msg'] = "উদ্দ্যোক্তা ইতিমধ্যে আপনার সিস্টেমে বিদ্যমান";

        }
    }

}

class GmailCheck extends EntrepreneurHandler
{
    public function processDetails(EntrepreneurDetailsCheck $details)
    {

        $gmail = $details->getGmail();
        // $id = $this->connection->escape_string($this->id);
        $sql = "SELECT * from admin_users where gmail='$gmail' And role='1'";
        $query = $this->connection->query($sql);
        # $check = mysqli_fetch_assoc($query);
        if ($query->num_rows == 0) {
            $this->handler->processDetails($details);
        } else {
            $_SESSION['msg'] = "উদ্দ্যোক্তার জিমেইল একাউন্টটি আপনার সিস্টেমে ইতিমধ্যে বিদ্যমান";

        }
    }
}

class MobileCheck extends EntrepreneurHandler
{
    public function processDetails(EntrepreneurDetailsCheck $details)
    {
        $mobile = $details->getMobile();
        // $id = $this->connection->escape_string($this->id);
        $sql = "SELECT * from admin_users where mobile='$mobile' And role='1'";
        $query = $this->connection->query($sql);
        if ($query->num_rows == 0) {
            // $user . escape_string($name);
            //$name = $this->connection->escape_string($name);

            $sql = "
        INSERT INTO admin_users
        (username, password,role,gmail,mobile)
        VALUES ('" . $details->getName() . "','" . $details->getPassword() . "','1','" . $details->getGmail() . "','" . $details->getMobile() . "')";
            echo $sql;

            $query = $this->connection->query($sql);
            $_SESSION['msg'] = "উদ্দ্যোক্তা সফলভাবে সিস্টেমে যোগ করা হয়েছে";
            header('Location:../entrepreneur.php');
            exit();
        } else {
            $_SESSION['msg'] = "উদ্দ্যোক্তার মোবাইল নম্বরটি আপনার সিস্টেমে ইতিমধ্যে বিদ্যমান";

        }
    }
}