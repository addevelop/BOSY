<?php
require_once("db.php");

class brands
{
    public $brand;
    public $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getBrands()
    {
        $getBrands = false;
        $stmt = $this->db->prepare("SELECT * FROM brands");
        if ($stmt->execute()) {
            $getBrands = $stmt->fetchAll();
        }
        return $getBrands;
    }

    public function isBrandExist()
    {
        $isBrandExist = false;
        $stmt = $this->db->prepare("SELECT * FROM brands WHERE ID_brands = :brands OR brands = :brands");
        $stmt->bindParam(":brands", $this->brand, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $isBrandExist = true;
            }
        }
        return $isBrandExist;
    }

    public function createBrand()
    {
        $createBrand = false;
        $stmt = $stmt = $this->db->prepare("INSERT INTO brands(brands) VALUES(:brand)");
        $stmt->bindParam(":brand", $this->brand, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $createBrand = true;
        }
        return $createBrand;
    }

    public function getBrandByBrand()
    {
        $getBrandByBrand = false;
        $stmt = $this->db->prepare("SELECT * FROM brands WHERE brands = :brand");
        $stmt->bindParam(":brand", $this->brand, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $getBrandByBrand = $stmt->fetch();
            }
        }
        return $getBrandByBrand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
}
