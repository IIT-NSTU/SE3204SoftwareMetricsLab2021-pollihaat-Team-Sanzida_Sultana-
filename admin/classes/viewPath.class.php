<?php
class ViewPath
{

    private $SERVER_PATH;
    private $SITE_PATH;
    private $CATEGORY_IMAGE_SERVER_PATH;
    private $CATEGORY_IMAGE_SITE_PATH;

    public function __construct()
    {
        $this->SERVER_PATH = $_SERVER["DOCUMENT_ROOT"] . "/pollihaat/"; # C:/xamp/htdocs/pollihaat/
        $this->SITE_PATH = $_SERVER["SERVER_NAME"] . "/pollihaat/"; #SERVER_NAME return localhost,this full return localhost/pollihaat/

        $this->CATEGORY_IMAGE_SERVER_PATH = $this->SERVER_PATH . "images/category/"; #C:/xamp/htdocs/pollihaat/pollihaat/images/category
        $this->CATEGORY_IMAGE_SITE_PATH = $this->SITE_PATH . "images/category/"; # C:/xamp/htdocs/pollihaat/pollihaat/images/category

    }
    public function getSERVER_PATH()
    {

        return $this->SERVER_PATH;
    }

    public function getSITE_PATH()
    {

        return $this->SITE_PATH;
    }

    public function getCategory_Image_server_path()
    {

        return $this->CATEGORY_IMAGE_SERVER_PATH;
    }
    public function getCategory_Image_site_path()
    {

        return $this->CATEGORY_IMAGE_SITE_PATH;
    }

}
// <!DOCTYPE html>
// <html lang="en">

// <head>
//     <meta charset="UTF-8">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Document</title>

// </head>

// <body>
//     <?php
// $a = new ViewPath();
// // echo $a->getCategory_Image_site_path();?>


<!-- // </body>

//

</html> -->