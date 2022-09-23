<?php
include_once 'DbConnection.class.php';

class Validation
{
    private $size;
    private $type;
    private $fieldName;
    private $imgName;

    public function __construct($imgName, $type, $size, $fieldName)
    {
        $this->type = $type;
        $this->size = $size;
        $this->fieldName = $fieldName;
        $this->imgName = $imgName;
        //   echo $this->type;
    }
    public function getImageName()
    {
        return $this->imgName;
    }
    public function getImageType()
    {
        return $this->type;
    }
    public function getfieldName()
    {
        return $this->fieldName;
    }

    public function getImageSize()
    {
        return $this->size;
    }

}

abstract class ImageHandler
{
    public $insert;

    public function __construct()
    {

        $insert = new Categories();
        $this->insert = $insert;

    }
    public $handler;
    public function setNextHandler(ImageHandler $handler)
    {
        $this->handler = $handler;

    }
    abstract public function processImage(Validation $image);

}

class PNGCheck extends ImageHandler
{
    public function processImage(Validation $image)
    {
        //   echo $image->getImageType();
        // if ($image->getImageType() == "") {
        //     $_SESSION['msg'] = "please select a image";
        // } else
        if ($image->getImageSize() >= '8992144') {
            echo $image->getImageSize();
            $_SESSION['msg'] = "Size must be less then 3 MB";
            exit();
        }
        if ($image->getImageType() != 'image/png') {
            $this->handler->processImage($image);

        } else if ($image->getImageType() == 'image/png') {
            //  print_r($image);
            // echo $image->getImageName();
            $this->insert->insertCat($image->getfieldName(), $image->getImageName());
        }

    }

}

class JPGCheck extends ImageHandler
{
    public function processImage(Validation $image)
    {
        //  echo $image->type;
        if ($image->getImageType() != 'image/jpg') {
            $this->handler->processImage($image);

        } else if ($image->getImageType() == 'image/jpg') {
            echo "jpg ";
        }

    }

}

class JPEGCheck extends ImageHandler
{
    public function processImage(Validation $image)
    {

        if ($image->getImageType() != 'image/jpeg') {
            //  echo "jperg";
            echo "not a valid format";
            $_SESSION['msg'] = "please select only jpg,jpeg or png format";
        } else {
            echo "jpeg";
        }

    }

}