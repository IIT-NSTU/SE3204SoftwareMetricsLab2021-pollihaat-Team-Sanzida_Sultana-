<?php
class ManageEntrepreneur
{
    private $name;
    private $gmail;
    private $mobile;

    private $prevName;

    public function __construct()
    {
        // $this->name = $entrepreneurDetails['name'];
        // $this->gmail = $entrepreneurDetails['gmail'];
        // $this->mobile = $entrepreneurDetails['mobile'];

        // $this->prevName = $entrepreneurDetails['prev_name'];

        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();

        #$this->imgName = $imgName;
        //   echo $this->type;
    }

    public function NameDuplicate($name)
    {
        $this->name = $name;
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from admin_users where username <>'$this->name'";
        echo $sql;

        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {

            while ($row = mysqli_fetch_assoc($query)) {
                print_r($row);
                if ($row['username'] != '$this->name') {
                    echo "D";
                    //echo header("Location:../category.php"); {
                    //  $_SESSION['msg'] = "উদ্দ্যোক্তা ইতিমধ্যে আপনার সিস্টেমে বিদ্যমান করেছেন";
                    //    echo $_SESSION['msg'];
                    //    header("Location:../Entrepreneur.php");

                } else {
                    $_SESSION['msg'] = "উদ্দ্যোক্তা ইতিমধ্যে আপনার সিস্টেমে বিদ্যমান করেছেন";
                    header("Location:../Entrepreneur.php");

                }

            }
            //     exit();

            //header("Location:../manageCategory.php?edit&name=$name");
        } // exit();
    }

    public function GmailDuplicate($gmail)
    {
        $this->gmail = $gmail;
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from admin_users where gmail <>'$this->gmail'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($gmail == $row['gmail']) {
                    //echo header("Location:../category.php"); {
                    $_SESSION['msg'] = "উদ্দ্যোক্তার জিমেঈল একাউন্টটি ইতিমধ্যে আপনার সিস্টেমে বিদ্যমান করেছেন";
                    header("Location:../manageEntrepreneur.php?edit&name='$this->prevName'");
                    exit();

                }}

            //header("Location:../manageCategory.php?edit&name=$name");
        } // exit();
    }

    public function mobileDuplicate($mobile, $prevName)
    {
        $this->mobile = $mobile;
        $this->prevName = $prevName;
        //  $name = $this->connection->escape_string($name);
        $sql = "SELECT * from admin_users where mobile <>'$this->mobile'";
        $query = $this->connection->query($sql);
        $check = mysqli_fetch_assoc($query);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($mobile == $row['mobile']) {
                    //echo header("Location:../category.php"); {
                    $_SESSION['msg'] = "উদ্দ্যোক্তার মোবাইল নম্বরটি ইতিমধ্যে আপনার সিস্টেমে বিদ্যমান করেছেন";
                    header("Location:../manageEntrepreneur.php?edit&name='$this->prevName'");
                    exit();

                }}

            //header("Location:../manageCategory.php?edit&name=$name");
        } else {
            $sql1 = "UPDATE admin_users set username='$this->name',gmail='$this->gmail',mobile='$this->mobile' where username='$this->prevName'

  ";
            echo "dfd";
            header('Location:../entrepreneur.php');
            exit();

        }
        // exit();
    }

}