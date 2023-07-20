<?php
require_once("Models/createSneaker.php");

class createProductController
{
    static $title;
    static $description;
    static $price;
    static $categorie;
    static $brand;
    static $stock;
    static $image = array();
    static $files;

    public static function create()
    {
        $error = true;
        switch (false) {
            case self::checkPost():
                $error = false;
                break;
            case self::formatStock():
                $error = false;
                break;
            case self::secureHTML():
                $error = false;
                break;
            case self::verifImage():
                $error = false;
                break;
            default:
                $create = new createSneaker(self::$title, self::$description, self::$price, self::$categorie, self::$brand, self::$stock, self::$image);
                $error = $create->create();
                break;
        }

        return $error;
    }

    public static function checkPost()
    {
        $checkPost = false;
        if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["categorie"]) && isset($_POST["brand"]) && isset($_POST["stock"]) && isset($_FILES["image"])) {
            $checkPost = true;
        }
        return $checkPost;
    }

    public static function formatStock()
    {
        $formatStock = false;
        self::$stock = explode(" ", $_POST["stock"]);
        if (sizeof(self::$stock) > 0) {
            $formatStock = true;
        }
        return $formatStock;
    }

    public static function secureHTML()
    {
        self::$title = self::verifCaract($_POST["title"], "string", 100);
        self::$description = self::verifCaract($_POST["description"], "string", 651);
        self::$price = self::verifcaract($_POST["price"], "int", null);
        self::$categorie = self::verifCaract($_POST["categorie"], "int", null) ? $_POST["categorie"] : self::verifCaract($_POST["otherCategorie"], "string", 100);
        self::$brand = self::verifCaract($_POST["brand"], "int", null) ? $_POST["brand"] : self::verifCaract($_POST["otherBrand"], "string", 100);
        // self::$stock = self::verifCaract($_POST["stock"], "int", null) && $_POST["stock"] >= 0 ? $_POST["stock"] : false;
        self::$files = $_FILES["image"];
        $secureHTML = true;
        $text = "";
        switch (false) {
            case self::$title:
                $secureHTML = false;
                $text = "title";
                break;
            case self::$description:
                $secureHTML = false;
                $text = htmlspecialchars($_POST["description"]);
                break;
            case self::$price:
                $secureHTML = false;
                $text = "price";
                break;
            case self::$categorie:
                $secureHTML = false;
                $text = "categorie";
                break;
            case self::$brand:
                $secureHTML = false;
                $text = "brand";
                break;
            case self::$stock:
                $secureHTML = false;
                $text = "stock";
                break;
        }
        return $secureHTML;
    }
    public static function verifCaract($string, $type, $length)
    {
        $verifCaract = false;
        if ($type == "string") {
            $verifCaract = strlen(htmlspecialchars($string)) <= $length ? htmlspecialchars($string) : false;
        } else if ($type == "int") {
            $verifCaract = is_numeric($string) ? $string : false;
        }

        return $verifCaract;
    }

    public static function verifImage()
    {
        $verifImage = true;

        for ($i = 0; $i < sizeof(self::$files); $i++) {
            if (!empty(self::$files["name"][$i])) {
                $type = self::$files["type"][$i];
                $extensions = array("image/jpeg", "image/png");
                if (in_array($type, $extensions) && self::$files["size"][$i] < 100000000) {
                    array_push(self::$image, ["name" => self::$files["name"][$i], "type" => self::$files["type"][$i], "tmp_name" => self::$files["tmp_name"][$i], "size" => self::$files["size"][$i]]);
                } else {
                    $verifImage = false;
                }
            }
        }

        return $verifImage;
    }
}
