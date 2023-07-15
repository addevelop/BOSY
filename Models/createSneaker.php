<?php
require_once("db.php");
require_once("categorie.php");
require_once("brands.php");
class createSneaker
{
    public $title;
    public $description;
    public $price;
    public $categorie;
    public $brand;
    public $stock;
    public $image;
    public $id;
    public $db;

    public function __construct($title, $description, $price, $categorie, $brand, $stock, $image)
    {
        $this->db = Database::connect();
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->categorie = $categorie;
        $this->brand = $brand;
        $this->stock = $stock;
        $this->image = $image;
    }

    public function create()
    {
        $create = false;
        $categorie = new categorie();
        $categorie->setCategorie($this->categorie);
        $brand = new brands();
        $brand->setBrand($this->brand);
        $date = date("Y-m-d");
        $active = 1;
        switch (false) {
            case $categorie->isCategorieExist():
                $categorie->createCategorie();
                $this->categorie = $categorie->getCategoriebyCategorie()["ID_categorie"];
            case $brand->isBrandExist():
                $brand->createBrand();
                $this->brand = $brand->getBrandByBrand()["ID_brands"];
        }
        $stmt = $this->db->prepare("INSERT INTO products(title, description, price, created_at, activate, ID_categorie, ID_brands, stock) VALUES(:title, :description, :price, :created_at, :activate, :idcategorie, :idbrand, :stock)");
        $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
        $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
        $stmt->bindParam(":price", $this->price, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $date, PDO::PARAM_STR);
        $stmt->bindParam(":activate", $active, PDO::PARAM_INT);
        $stmt->bindParam(":idcategorie", $this->categorie, PDO::PARAM_INT);
        $stmt->bindParam(":idbrand", $this->brand, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->stock, PDO::PARAM_INT);

        if ($stmt->execute()) {
            if ($this->lastId()) {
                $this->createFile();
                $create = true;
            }
        }

        return $create;
    }


    public function lastId()
    {
        $lastId = false;
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY ID_product DESC LIMIT 1");
        if ($stmt->execute()) {
            $id = $stmt->fetch();
            $this->id = $id["ID_product"];
            $lastId = true;
        }
        return $lastId;
    }
    public function createFile()
    {
        $createFile = true;
        for ($i = 0; $i < sizeof($this->image); $i++) {
            $file = $this->image[$i]["type"];
            $type = explode("/", $file);
            $name = "image" . $this->id . $i . "." . $type[1] . "";
            $tmp_name = $this->image[$i]["tmp_name"];
            $newurl = "public/data/sneakers/" . $name . "";
            $nameFile = $this->image[$i]["name"];
            if (move_uploaded_file($tmp_name, $newurl)) {
                $stmt = $this->db->prepare("INSERT INTO images(name, path, ID_product) VALUES(:name, :path, :idsneaker)");
                $stmt->bindParam(":name", $nameFile, PDO::PARAM_STR);
                $stmt->bindParam(":path", $name, PDO::PARAM_STR);
                $stmt->bindParam(":idsneaker", $this->id, PDO::PARAM_INT);
                if (!$stmt->execute()) {
                    $createFile = false;
                }
            }
        }
        return $createFile;
    }
}
